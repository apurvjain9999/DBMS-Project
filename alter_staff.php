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
$status=  $_POST['edit_status'];
$dept=  $_POST['edit_dept'];
$doj=  $_POST['edit_doj'];
$address=  $_POST['edit_address'];
$mobile=  $_POST['edit_mobile'];

$sql="UPDATE staff SET  name='$name', dob='$dob', relationship='$status', 
    department='$dept', doj='$doj', address='$address', 
        mobile='$mobile', gender='$gender' WHERE id='$id'";
mysqli_query($connect,$sql) or die(mysqli_error($connect));
header('location:admin_hompage.php');
?>