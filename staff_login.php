<?php 
session_start();
        
if(isset($_SESSION['staff_login'])) 
    header('location:staff_homepage.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>  
        <meta charset="UTF-8">
        <title>Staff Login - Bank of Jaipur</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
<?php
include 'header.php'; ?>

<div class='content'>
<div class="user_login" style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); ">
    <form action='' method='POST'>
        <table align="center">
            <tr><td><span class="caption">Staff Login</span></td></tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr><td>Username:</td></tr>
            <tr><td><input type="text" name="uname"></td></tr>
            <tr><td>Password:</td></tr>
            <tr><td><input type="password" name="pwd"></td></tr>
            <tr><td class="button1"><input type="submit" name="submitBtn" value="Log In" class="button" style="color:white"></td></tr>
        </table>
    </form>
            </div>
        </div>
          
<?php include 'footer.php';
?>
<?php
if(isset($_POST['submitBtn'])){
    include '_inc/dbconn.php';
    $username=$_POST['uname'];
    $password=$_POST['pwd'];
  
    $sql="SELECT email,pwd FROM staff WHERE email='$username' AND pwd='$password'";
    $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
    $rws=  mysqli_fetch_array($result);
    
    
    
    if($rws[0]==$username && $rws[1]==$password){
        session_start();
        $_SESSION['staff_login']=1;
        $_SESSION['staff_id']=$username;
        
    header('location:staff_homepage.php'); 
    }
    else
        echo "fail";
        
}
?>