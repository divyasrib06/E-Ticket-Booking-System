<?php
session_start();
$dbcon=mysqli_connect("localhost","root","");  
mysqli_select_db($dbcon,"users");
if(isset($_POST['pay'])){
    $email=$_SESSION["email"];
    $pname=$_SESSION["pname"];
    $tickets=$_SESSION["tickets"];
    $adults=$_SESSION["adults"];
    $childs=$_SESSION["childs"];
    $cost=$_SESSION["cost"];
    $payment="success";
    $cnum=$_POST['cnum'];
    $cname=$_POST["cname"];
    $month=$_POST["month"];
    $year=$_POST["year"];
    $bookingid=rand(0000000000,9999999999);
    $ticketdate=$_SESSION['date'];
$sql = "INSERT INTO booking(booking_id,email,place_name,ticket_date,tickets,adults,childs,cost,payment) VALUES ('$bookingid','$email','$pname','$ticketdate','$tickets','$adults','$childs','$cost','$payment')";
$sql1 = "INSERT INTO payment VALUES ('$email','$cnum','$cname','$month','$year')";
$r1=mysqli_query($dbcon,$sql);
$r2=mysqli_query($dbcon,$sql1);
$sql2 = "SELECT avail_ticket FROM tickets_avail where place_name='$pname'";
$r3 = mysqli_query($dbcon,$sql2);
$data = mysqli_fetch_assoc($r3);
$d=$data['avail_ticket']-$tickets;
$sql4 = "UPDATE tickets_avail SET avail_ticket = '$d' WHERE place_name='$pname'";
$r2=mysqli_query($dbcon,$sql4);
echo "Payment Success";
}
?>
<form action="index.php">
    <input type="submit" value="OK">
</form>