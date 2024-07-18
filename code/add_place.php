<?php
session_start();
if(isset($_POST['add']) and (isset($_FILES['image'])))
{
    $dbcon=mysqli_connect("localhost","root","");  
    mysqli_select_db($dbcon,"users");
    $image=array();
    $pname=$_POST['placename'];
    $plocation=$_POST['placelocation'];
    $adate=$_POST['availdate'];
    $otime=$_POST['opentime'];
    $ctime=$_POST['closetime'];
    $ccost=$_POST['childcost'];
    $acost=$_POST['adultcost'];
    $availticket=$_POST['availticket'];
    $image=$_FILES['image'];
    $file_array= reArrayFiles($_FILES['image']);
    //pre_r($file_array);
    for($i=0; $i<count($file_array); $i++){
    $extensions = array('jpg','png','jpeg');
    $file_ext = explode('.',$file_array[$i]['name']);
    $fname = $file_ext[0];

    $file_ext = end($file_ext);
    if(!in_array($file_ext,$extensions)){
        echo "select only image <a href='admin.html'>Click Here</a> to redirect to home page";
    }
    else{
        $img_dir="web/".$file_array[$i]['name'];
        move_uploaded_file($file_array[$i]['tmp_name'],$img_dir);
        $sql = "INSERT INTO place (place_name,place_location,img_name,img_dir,open_time,close_time) VALUES ('$pname','$plocation','$fname','$img_dir','$otime','$ctime')";
        $run=mysqli_query($dbcon,$sql);
        $sql2="INSERT INTO tickets_avail (place_name,Avail_ticket,Avail_date,Open_time,Close_time,Adult_cost,Child_cost) VALUES('$pname','$availticket','$adate','$otime','$ctime','$acost','$ccost')";
        $run2=mysqli_query($dbcon,$sql2);
        echo "success<br>";
    }
    }
}
else{
    echo "Choose file";
}

function pre_r($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function reArrayFiles($file_post){
    $file_ary= array();
    $file_count= count($file_post['name']);
    $file_keys = array_keys($file_post);

    for($i=0; $i<$file_count; $i++){
        foreach($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
?>
<form action="admin.php">
    <input type="submit" value="Ok">
</form>