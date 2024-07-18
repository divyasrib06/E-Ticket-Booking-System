<?php
    $conn=mysqli_connect('localhost','root','','users');
    if($conn->connect_error)
    {
          die('Could not Connect MySql Server:' .$conn->connect_error);
     }
    else{
        if(isset($_POST['update']))
        {
            $NameofthePlace=$_POST['place'];
            if($_POST['date'])
            {
                $date=$_POST['date'];
            if($_POST['child'])
            {
                $CostofticketforChild=$_POST['child'];
                $stmt1="UPDATE tickets_avail set Child_cost='$CostofticketforChild' where place_name='$NameofthePlace' and Avail_date='$date'";
                if(mysqli_query($conn,$stmt1)){
                    echo "child ticket cost updated successfully";
                }
                else{
                    echo "child cost not updated";
                }
            }
            if($_POST['adult']){
                $CostofticketforAdult=$_POST['adult'];
                $stmt2="UPDATE place set adult_cost='$CostofticketforAdult' where place_name='$NameofthePlace' and Avail_date='$date'";
                if(mysqli_query($conn,$stmt2)){
                    echo "Adult ticket cost updated successfully";
                }
                else{
                    echo "adult ticket cost not updated";
                }
            }
            if($_POST["ticket"]){
                $avail_tickets=$_POST["ticket"];
                $stmt3="UPDATE place set avail_ticket='$avail_tickets' where place_name='$NameofthePlace' and Avail_date='$date'";
                if(mysqli_query($conn,$stmt3)){
                    echo "Number of tickets updated successfully";
                }
                else{
                    echo "Number of tickets are not updated";
                }
            }
        }
        else{
            echo "Please Select the date to be updated";
        }
        }
    }
    $conn->close();
?>
<form action="admin.php">
    <input type="submit" value="OK">
</form>