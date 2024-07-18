<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login WEBSITE</title>
    <link rel = "icon" href = "images/lg.jpg"type = "image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body{
            background:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)), url(https://wallpaperaccess.com/full/2314950.jpg);
            background-repeat:no-repeat;
            background-size: cover;
        }
        .flex{
            display:flex;
            align-content: center;
            justify-content: space-around;
        }
        #div{
            background-color: grey;
            align-content: center;
            justify-content: space-around;
            border-radius: 5%;
            border-style: groove;
            padding: 40px;
            text-align: center;
            font-size: 20px;
        }
        .l1{
            padding: 2% 8%;
            background-color: rgb(80, 135, 172);
            border-radius: 12px;
            font-size: 25px;
            font-family: sans-serif;    
        }
        .form div input{
            font-size:15px;
            padding: 20px 18px;
            border: 2px;
            outline:none;
            border-radius: 5px;
        }
        ::placeholder{
            color:#ccc;
        }
        .eye{
            position: absolute;
        }
        #eye1{
            display: none;
        }
        h3{
            display: none;
        }
        </style>

<script>
    function myfunc(){
        var x = document.getElementById("mypass");
        var y = document.getElementById("eye1");
        var z = document.getElementById("eye2");

        if(x.type == 'password')
        {
            x.type="text";
            y.style.display="block";
            z.style.display="none";
        }
        else{
            x.type="password";
            y.style.display="none";
            z.style.display="block";
        }
    }


</script>
</head>
<body>
    <p style="text-align: right;"><a href="index.php" style="color: red; font-size: large;">Home</a></p>
    <div class="flex">
        <div id="div">
            <p id="res1" style="font-size: 16px;"></p>
            <h2>Login Here</h2>
            <form action="login.php" class="form" method="post">
                <p id="error"></p>
            <div>
                <label for="user">USERNAME:</label>
                <i class="icon fas fa-user"></i>
                <input type="email" name="email" id="text1" placeholder="Enter Email/Username" required>
                <br><br>
            </div>
            <div>
                <label for="pass">PASSWORD:</label>
                <i class="icon fas fa-lock"></i>
                <input type="text" name="pass" id="mypass" placeholder="Enter Password" required>
                <span class="eye" onclick="myfunc()">
                    <i id="eye1" class="icon fas fa-eye"></i>
                    <i id="eye2" class="icon fas fa-eye-slash"></i>
                </span><br><br>
            </div>
                <input type="submit" value="Login" class="l1" name="login"><br><br>
            </form>
            <a href="f1.html" style="color: red;">Forgot Password?</a>
            <br><br>
            <hr>
            <p style="color: blue;">Dont't have an account ?</p>
            <a href="register.html"><input type="button" value="Click here to Register" class="l1"></a>
            <br><br>
        </div>
    </div>
</body>
</html>

<?php
session_start();
$dbcon=mysqli_connect("localhost","root","");  
mysqli_select_db($dbcon,"users");
$user_email="";
$user_pass="";
$admin="admin@gmail.com";
$errors=array();  
  
if(isset($_POST['login']))
{  
    $user_email=$_POST['email'];  
    $user_pass=$_POST['pass'];
  
    $check_user="select * from users WHERE user_email='$user_email'AND user_pass='$user_pass'";  
  
    $run=mysqli_query($dbcon,$check_user);  
  
    if(mysqli_num_rows($run)){  
        $_SESSION['email']=$user_email;
        $_SESSION['status']=1;//here session is used and value of $user_email store in $_SESSION.
        if($user_email == $admin){
            header('location: admin.php');
        }
        else{
        header('location: index.php');
        }
  
    }  
    else  
    {  
        $_SESSION['message']="Incorrect Username or Password."; 
        header("location:login.php");
        echo '<h3>Invalid username or password</h3>';
    }
}  
?>