<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$name=  $_POST['staff_name'];
$gender=  $_POST['staff_gender'];
$dob=  $_POST['staff_dob'];
$status=  $_POST['staff_status'];
$dept=  $_POST['staff_dept'];
$doj=  $_POST['staff_doj'];
$address=  $_POST['staff_address'];
$mobile=  $_POST['staff_mobile'];
$email= $_POST['staff_email'];
$password=  $_POST['staff_pwd'];

$sql="insert into staff values('','$name','$dob','$status','$dept','$doj','$address','$mobile',
    '$email','$password','$gender','')";
mysqli_query($connect,$sql) or die("the email-id is already registered");
header('location:admin_hompage.php');
?>