<?php
$conn=mysqli_connect('localhost','root','','users');
if($conn->connect_error)
{
      die('Could not Connect MySql Server:' .$conn->connect_error);
 }
 else{
     if(isset($_POST['remove'])){
        $pname=$_POST['place'];
        $sql="DELETE FROM place where place_name='$pname'";
        $run=mysqli_query($conn,$sql);
        if($run)
        {
            echo $pname;
            echo " deleted successfully";
        }
        else{
            echo $pname;
            echo " is not deleted";
        }
     }
 }
?>
<form action="admin.php">
    <input type="submit">
</form>