<?php
session_start();
if(isset($_POST['forgot'])){
$_SESSION['cmail']=$_POST['cmail'];
$to = $_POST['cmail'];
$subject = "Reset Password";
       
$message = "<b>To Change Password</b><br><h1><a href='forgot.html'>Click here</a></h1>";
    
$header = "From:sscd2212@yahoo.com \r\n";
$header .= "Content-type: text/html\r\n";
         
$retval = mail($to,$subject,$message,$header);
header('location: forgot.html');
         
if( $retval == true ) {
    echo "Message sent successfully...";
}else {
    echo "Message could not be sent...";
}
}
else{
    echo "enter mail id";
    echo "<a href='f1.html'>Click Here</a>";
}
?>