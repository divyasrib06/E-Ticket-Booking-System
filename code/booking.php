<?php
    session_start();
    if($_SESSION['status']==0){
        header('location: login.php');
    }

    $dbcon=mysqli_connect("localhost","root","");  
    mysqli_select_db($dbcon,"users");
    $sql="SELECT * from place";
    $result = mysqli_query($dbcon,$sql);
    $_SESSION['place']=$_POST['p1'];
    $_SESSION['date']=$_POST['p2'];
?>
<!doctype html>
<html>
<head>
   <title>Booking form</title>
   <link rel = "icon" href = "images/lg.jpg"type = "image/x-icon">
   <style>
       *{
    margin:0;
    padding:0;
    font-family:sans-seriff;
}
.wrapper{
    width: 1170px;
    margin:auto;
}
.bg-modal{
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.2);
    opacity:0.7;
    position:absolute;
    display: flex;
    top:0;
    justify-content:center;
    align-items:center;
}
.booking-page{
    width:400px;
    height: 500px;
    background-color: white;
    border-radius:4px;
    text-align:center;
    padding:20px;
    position:relative;
}
.booking-page h1{
    font-size:40px;
    text-align:center;
    margin:17px 15px;
    color:#C04000;
}
.booking-page p{
    font-size:20px;
    color:#513B1C;
    margin:15px 15px;
    font-family:'Arial Narrow Bold';
}
.booking-page input{
    font-size:20px;
    width: 50%;
    display:block;
    margin:15px auto;
}
.close{
    position:absolute;
    top:0;
    right:14px;
    font-size:42px;
    transform:rotate(45deg);
    cursor:pointer;
}
   </style>
   <script>
       function disp()
       {
           var a = Number(document.getElementById("t").value);
           var b = Number(document.getElementById("c").value);
           var c = Number(document.getElementById("a").value);
           d = document.getElementById("res");
           if (a!="" && b!="" && c!="")
           {
                if(a==b+c)
                {
                    d.innerHTML=a+" "+b+" "+c;
                }
                else{
                    d.innerHTML="Check the Input values";
                }
           }
           else
           {
               d.innerHTML="Enter all the fields";
           }
       }
   </script>
</head>
<body >
    <div class="bg-modal">
    <div class="booking-page">
        <div class="close"><a href="ticket_avail.php">+</a></div>
    <h1>BOOKING FORM</h1><br>
    <p id="res"></p>
    <form action="book.php" method="post">
        <p>Place:</p>
        <input type="text" value="<?php echo $_POST['p1']?>" name="place" readonly>
        <p>Date Of Tickets:</p>
        <input type="text" value="<?php echo $_POST['p2'] ?>" name="date" readonly>
        <p>NO.OF.TICKETS:</p>
        <input type = "number" name = "t" placeholder="" id="t">
        <p>NO.OF.ADULTS:</p>
        <input type = "number" name = "a" placeholder="" id="c">
        <p>NO.OF.CHILDREN:</p>
        <input type = "number" name = "c" placeholder="" id="a"><br>
        <input type="submit" value="Book" name="book">
    </form>
    </div>
</div>
</body>
</html>