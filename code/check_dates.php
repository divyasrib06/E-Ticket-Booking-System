<?php 
session_start();
if($_SESSION['status']==0){
    header('location: login.php');
}
if(isset($_POST['Submit']))
{
    $pname=$_POST['type'];
    $dbcon=mysqli_connect("localhost","root","");  
    mysqli_select_db($dbcon,"users");
$sql="SELECT * FROM tickets_avail where place_name='$pname'";
$result = mysqli_query($dbcon,$sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place details</title>
    <style>
        *{
            background:black;
            color:white;
        }
        td{
            background:skyblue;
            color:white;
            font-size:20px;
            align:center;
            width:40%;
            border:1px solid black;
            padding:30px;
        }
        th{
            background:grey;
            border:1px solid black;
            height: 60px;
            padding:30px;
        }
        input{
            font-size:20px;
            background:gold;
            color:black;
        }
        h2{
            text-align:center;
        }
    </style>
</head>
<body>
    <a href="ticket_avail.php">Back</a>
    <h2><?php echo $pname?></h2>
    <div class="flex">
        <table>
            <tr>
                <th>Date</th>
                <th>Available Tickets</th>
                <th>Opening Time</th>
                <th>Closing Time</th>
                <th>Adult Ticket Cost</th>
                <th>Child Ticket Cost</th>
                <th>Book Ticket</th>
            </tr>
    <?php
        while($data = mysqli_fetch_assoc($result))
            { ?>
                <tr>
                    <td><?php echo $data['Avail_date'] ?></td>
                    <td><?php echo $data['Avail_ticket']?></td>
                    <td><?php echo $data['Open_time']?></td>
                    <td><?php echo $data['Close_time']?></td>
                    <td><?php echo $data['Adult_cost']?></td>
                    <td><?php echo $data['Child_cost']?></td>
                    <td>
                        <form action="booking.php" method="post">
                            <input type="text" value="<?php echo $data['place_name']?>" name="p1" hidden>
                            <input type="text" value="<?php echo $data['Avail_date']?>" name="p2" hidden>
                            <input type="submit" value="Book Ticket">
                        </form>
                    </td>

                </tr>
            <?php } ?>
            </table>
    </div>  
</body>
</html>