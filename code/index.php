<?php
session_start();
?>
<!doctype html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
   <title>E-Ticket Booking</title>
   <link rel="stylesheet" href="style.css">
   <link rel = "icon" href = "images/lg.jpg"type = "image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>
            <ul class="nav-area">
                <li><a href="#" name="top">Home</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="ourServices.html">Services</a></li>
                <li><a href="ticket_avail.php">Ticket Availability</a></li>
                <li><a href="login.php" <?php echo ($_SESSION['status'] == 1) ? 'style="display:none;"' : '' ?> >Login</a></li>
                <li><a href="register.html" <?php echo ($_SESSION['status'] == 1) ? 'style="display:none;"' : '' ?>>Register</a></li>
                <li><a href="logout.php" <?php echo ($_SESSION['status'] == 0) ? 'style="display:none;"' : '' ?>>Logout</a></li>
            </ul>
        </div>
        <div class="welcome-text">
            <h1>BOOK THE TICKET TO MAKE YOUR TRIP EASY!!!</h1>
            <a href="ticket_avail.php">Book Ticket</a><br>
            <a href="feedback.html">Feedback</a>
        </div>
      </header>
      <footer>
        <h3>For any Queries Contact us -</h3><br>
        <p><i class="icon fas fa-phone"></i> Contact Number:+91 9010755681 &emsp; &emsp;<i class="icon fas fa-envelope"></i> Email Id: eticketservice@gmail.com 
        &emsp; &emsp; <i class="icon fab fa-facebook-square"></i> EticketBook</p><br>
        <p><a href="">Terms&Conditions</a> &emsp; &emsp; <a href="">Privacy Policy</a></p>
        <p style="text-align:center;"><a href="#top">Go to Top of The Page</a></p>
      </footer>
</body>
</body>
</html>
