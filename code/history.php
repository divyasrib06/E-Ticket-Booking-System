<?php
    session_start();
    if($_SESSION['status']==0){
        header('location: login.php');
    }
    $dbcon=mysqli_connect("localhost","root","");  
    mysqli_select_db($dbcon,"users");
    $email=$_SESSION['email'];
    $sql="SELECT * FROM booking where email='$email'";
    $result = mysqli_query($dbcon,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        .flex{
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            font-size: large;
        }
        .dis{
            display: flex;
            flex-direction: row;
            justify-content:space-around;
            align-content:center;
            align-items:center;
            border: solid;
        }
        .dis div{
            align-content:center;
        }
    </style>
</head>
<body>
<a href="index.php"><h1>Home</h1></a><br><br>
    <div class="flex">
    <?php
        while($data = mysqli_fetch_assoc($result))
            { ?>
            <div class="dis">
                <div>
                        <ul type="none">
                            <li>Booking Id:<?php echo $data['booking_id']?></li>
                            <li>Name of place: <?php echo $data['place_name']?></li>
                            <li>Booking Date: <?php echo $data['ticket_date'] ?></li>
                            <li>Total Tickets: <?php echo $data['tickets']?></li>
                            <li>Number of ticket for Adults: <?php echo $data['adults']?></li>
                            <li>Number of ticket for Children: <?php echo $data['childs']?></li>
                            <li>Cost Of Tickets:  <?php echo $data['cost']?></li>
                            <li>Status:<?php echo $data['payment']?></li>
                        </ul>
                    </div>
                    <div >
                        <form action="cancel.php" method="post">
                            <input type="submit" value="Cancel" name="cancel" style="font-size:large">
                        </form>
                    </div>
                </div><br><br>
                <?php } ?>
    </div>
</body>
</html>