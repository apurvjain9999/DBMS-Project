<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>

<?php
include '_inc/dbconn.php';
$name=  $_POST['edit_name'];
$gender=  $_POST['edit_gender'];
$dob=  $_POST['edit_dob'];
$id=  $_POST['current_id'];
$type=  $_POST['edit_account'];
$nominee=  $_POST['edit_nominee'];
$address=  $_POST['edit_address'];
$mobile=  $_POST['edit_mobile'];

$sql="UPDATE customer SET  name='$name', dob='$dob', nominee='$nominee', account='$type', 
     address='$address', 
        mobile='$mobile', gender='$gender' WHERE id='$id'";
mysqli_query($connect,$sql) or die(mysqli_error($connect));
header('location:admin_hompage.php');
?>