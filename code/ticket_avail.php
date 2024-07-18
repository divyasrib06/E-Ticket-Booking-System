<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Availability</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel = "icon" href = "images/lg.jpg"type = "image/x-icon">
    <style>
        li{
            color: blue;
        }
        .flex{
            display: flex;
        }
        .box1{
            display: flex;
            flex-direction: column;
        }
        .box1 div{
            padding: 20px;
        }

        #form1{
            font-size: large;
            font-family: sans-serif;
        }
        .box2{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .dis{
            display: flex;
            flex-direction: row;
            border: solid;
        }
        .search-container input{
            font-size:15px;
            padding: 20px 18px;
            width: 30%;
            border-radius: 5px;
        }
        #a{
            font-size: xx-large;
        }
        button{
            height: 50px;
        }
        .bt{
            font-size:25px;
            border:none;
            background:skyblue;
            color:brown;
        }
        #t1{
            display:none;
        }
    </style>
</head>
<body>
    <div class="flex">
    <div class="box1">
        <div>
            <img src="images/logo.png" alt="">
        </div>
        <!--<div>
            <form action="" id="form1">
                <div>
                    <label for="place">Select Place</label>
                    <input type="radio" name="place" id="u1">Temples
                    <input type="radio" name="place" id="u2">Museums
                </div>
                <div>
                    <label for="cal">Select Date</label>
                    <input type="date" name="cal">
                </div>
                <div>
                    <input type="submit" value="Select">
                </div>
            </form>
        </div>-->
    </div>
    <div class="box1">
        <div class="search-container">
            <!--
        <form action="">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="index.php" id="a">Home</a>
        </form>-->
        <a href="index.php" id="a">Home</a>
        </div>
            <?php
                $dbcon=mysqli_connect("localhost","root","");  
                mysqli_select_db($dbcon,"users");
                $sql="SELECT * from place";
                $result = mysqli_query($dbcon,$sql);
            ?>
            <?php
                while($data = mysqli_fetch_assoc($result))
                { ?>
                <div class="dis">
                    <div>
                        <a href="#"><h2>Name of the place:<?php echo $data['place_name']?></h2></a>
                        <ul>
                            <li>Location:<?php echo $data['place_location']?></li>
                            <li>Available Timmings:morning<?php echo $data['open_time']?>AM to <?php echo $data['close_time']?>PM everyday</li>
                        </ul>
                        <form action="check_dates.php" method="post">
                            <h3>Click here to
                                <input type="text" value="<?php echo $data['place_name']?>" name="type" id="t1">
                            <input type="submit" value="Book Ticket" class="bt" name="Submit"></h3>
                        </form>
                    </div>
                    <div>
                        <img src="<?php echo $data['img_dir']?>" alt="" height="175" width="350">
                    </div>
                </div><br><br>
                <?php } ?>
        </div>
    </div>
    </div>
</body>
</html>