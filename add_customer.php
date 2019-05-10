<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
    <?php
include '_inc/dbconn.php';
$name=  $_POST['customer_name'];
$gender=  $_POST['customer_gender'];
$dob=  $_POST['customer_dob'];
$nominee=  $_POST['customer_nominee'];
$type=  $_POST['customer_account'];
$credit=  $_POST['initial'];
$address=  $_POST['customer_address'];
$mobile=  $_POST['customer_mobile'];
$email= $_POST['customer_email'];

//salting of password
$salt="@g26jQsG&nh*&#8v";
$password=  sha1($_POST['customer_pwd'].$salt);

$branch=  $_POST['branch'];
$date=date("Y-m-d");
switch($branch){
case 'KOLKATA': $ifsc="K421A";
    break;
case 'DELHI': $ifsc="D30AC";
    break;
case 'BANGALORE': $ifsc="B6A9E";
    break;
case 'JAIPUR': $ifsc="J3P2R";
break;
}

$sql3="SELECT MAX(id) from customer";
$result=mysqli_query($connect,$sql3) or die(mysqli_error($connect));
$rws=  mysqli_fetch_array($result);
$id=$rws[0]+1;
$sql1="CREATE TABLE passbook".$id." 
    (transactionid int(5) AUTO_INCREMENT, transactiondate date, name VARCHAR(255), branch VARCHAR(255), ifsc VARCHAR(255), credit int(10), debit int(10), 
    amount float(10,2), narration VARCHAR(255), PRIMARY KEY (transactionid))";

$sql="insert into customer values('','$name','$gender','$dob','$nominee','$type','$address','$mobile',
    '$email','$password','$branch','$ifsc','','ACTIVE')";
mysqli_query($connect,$sql) or die("Email already exists!");
mysqli_query($connect,$sql1) or die(mysqli_error($connect));
$sql4="insert into passbook".$id." values('','$date','$name','$branch','$ifsc','$credit','0','$credit','Account Open')";
mysqli_query($connect,$sql4) or die(mysqli_error($connect));
header('location:admin_hompage.php');
?>