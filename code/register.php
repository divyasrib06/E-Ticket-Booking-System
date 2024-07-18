<?php
session_start();
$servername = "localhost";
$username = "root";
$password ="";
$dbname="users";
$connection = mysqli_connect($servername, $username, $password, $dbname);
if( !$connection)
die("connection not established".mysqli_connect_error());
else
echo "connected succsusfully";
if(isset($_POST['Signup']))
{
   $email=$_POST['email'];
   $pass1 = $_POST['password1'];
   $pass2 = $_POST['password2'];
   $fname=$_POST['FullName'];
   $uname=$_POST['UserName'];

    if($pass1==$pass2){
    $sql = "INSERT INTO users (full_name,user_name,user_email,user_pass)
     VALUES ('$fname','$uname','$email','$pass1')";
     if (mysqli_query($connection, $sql)) {
        echo "New record has been added successfully !";
        $_SESSION['email']=$email;
        $_SESSION['status']=1;
        header('location: login.php');
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($connection);
    }
    else{
        echo "<script>alert('Both Password and Confirm password should be same')</script>";
    }

}
else
echo "all fields  required";

?>