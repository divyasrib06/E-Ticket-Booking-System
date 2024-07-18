<?php
session_start();
$dbcon=mysqli_connect("localhost","root","");  
mysqli_select_db($dbcon,"users");

if(isset($_POST['forgot']))
{
    $p1=$_POST['p1'];
    $p2=$_POST['p2'];
    if($p1==$p2)
    {
        $sql="UPDATE users SET user_pass=$p1 where user_email=$_SESSION['cmail']";
        $run=mysqli_query($dbcon,$sql);
        if(mysqli_num_rows($run))
        {
            echo "Password changed successfully";
        }
        else{
            echo "Please try again";
            echo "<a href='forgot.html'>Click Here</a>";
        }
    }
    else{
        echo "Confirm Password should be same as new password";
        header('location: forgot.html');
    }
}
?>