<?php
session_start();
$dbcon=mysqli_connect("localhost","root","");  
mysqli_select_db($dbcon,"users");
if(isset($_POST['book']) && $_POST['t'])
{
    $pname=$_SESSION['place'];
    $sql="SELECT child_cost,adult_cost,avail_ticket from tickets_avail where place_name='$pname'";
    $result = mysqli_query($dbcon,$sql);
    $data = mysqli_fetch_assoc($result);
    $tickets=$_POST['t'];
   $adults=$_POST['a'];
   $child=$_POST['c'];

   if($data['avail_ticket']>=$tickets)
   {
        if($tickets==($adults+$child)){
            $cost=(($data['child_cost']*$child)+($data['adult_cost']*$adults));
            $_SESSION['cost']=$cost;
            $_SESSION['pname']=$pname;
            $_SESSION['tickets']=$tickets;
            $_SESSION['adults']=$adults;
            $_SESSION['childs']=$child;
            header('location:payment.php');
        }
        else{
            echo "Total Number of Tickets should be equal to sum of adults tickets and children tickets";
        }
   }
   else{
       echo $tickets;
       echo " tickets are not available";
   }

}
?>