<?php 
session_start();

include '_inc/dbconn.php';
$date=$_SESSION['staff_date'];
$id=$_SESSION['id'];
$sql="UPDATE staff SET lastlogin='$date' WHERE id='$id'";
mysqli_query($connect,$sql) or die(mysqli_error($connect));

session_destroy();
header('location:staff_login.php');
?>