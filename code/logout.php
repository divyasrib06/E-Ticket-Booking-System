<?php
session_destroy();
session_start();
$_SESSION['status']=0;
header('location: index.php');
?>