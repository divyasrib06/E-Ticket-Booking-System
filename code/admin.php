<?php
    session_start();
    if($_SESSION['status']==0){
        header('location: login.php');
    }
    $dbcon=mysqli_connect("localhost","root","");  
    mysqli_select_db($dbcon,"users");
    $sql="SELECT * from place";
    $sql1="SELECT * from place";
    $result = mysqli_query($dbcon,$sql);
    $result1 = mysqli_query($dbcon,$sql1);
    
?>

<!doctype html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
   <title>E-Ticket Booking</title>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="images/logo.png"alt="">
            </div>
            <ul class="nav-area">
                <li><a href="#section2">Add place</a></li>
                <li><a href="#section3">Update Tickets</a></li>
                <li><a href="#section4">Remove place</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div id="section2">
            <h1>ADD PLACE</h1>
            <div class="contact-form">
                <form action="add_place.php" method="post" enctype="multipart/form-data">
                <label for="State">Name of the Place: </label>
                <input type="text" size="30" maxlength="40" name="placename">
                <br>
                <br>
                Location <input type="text" size =30 maxlength=40 name="placelocation">
                <br>
                Available from <input type="date" name="availdate" id=""><br>
                <br>
                Available time From<input type="time" name="opentime">Am to 
                <input type="time" id="" name="closetime">Pm
                <br>
                <br>
                Ticket Cost of child <input type= "number" min=100 maxlength=5000 name="childcost">
                <br>
                <br>
                Ticket Cost of adult <input type="number" min=100 maxlength=5000 name="adultcost">
                <br>
                <br>
                Availabe tickets <input type="number" min=10 maxlength=500 name="availticket"><br><br>
                Image <input type="file" id="avatar" name="image[]" accept="image/*" multiple>
                <input type="Submit" value="Add" name="add">
                </form>
            </div>
        </div>
        <div id="section3">
            <h1>UPDATE TICKETS</h1>
            <div class="contact-form">
                <form action="update_place.php" method="post">
                    <h2> Select a place to Update:</h2>
                    <select name="place">
                <?php while($data = mysqli_fetch_assoc($result1))
                    { ?>
                        <option value="<?php echo $data['place_name']?>"><?php echo $data['place_name']?></option>
                 <?php } ?>
                </select>
                Available Date <input type="date" name="date"><br><br>
                Available time From<input type="time">Am to <input type="time" name="" id="">Pm
                <br>
                <br>
                Ticket Cost of child <input type= "number" min=100 maxlength=5000 name="child">
                <br>
                <br>
                Ticket Cost of adult <input type="number" min=100 maxlength=5000 name="adult">
                <br>
                <br>
                Availabe tickets <input type="number" min=10 maxlength=500 name="ticket">
                <input type="Submit" value="Update" name="update">
            </form>   
            </div>
        </div> 
        <div id="section4">
            <h1>REMOVE PLACE</h1>
            <div class="contact-form">
                <form action="remove.php" method="post">
                    <center>
                        <h2> Select a place to remove:</h2>
                        <select name="place">
                <?php while($data = mysqli_fetch_assoc($result))
                    { ?>
                        <option value="<?php echo $data['place_name']?>"><?php echo $data['place_name']?></option>
                 <?php } ?>
                </select>
                    </center>
                <input type="Submit" value="Remove" name="remove">
            </form>   
            </div>
        </div> 
        
    </header>
</body>
</html>
