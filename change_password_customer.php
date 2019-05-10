<?php 
session_start();
include '_inc/dbconn.php';
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password - Bank of Jaipur</title>
        
        <link rel="stylesheet" href="newcss.css">
        <style>
        .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}
</style>
    </head>
        <?php include 'header.php' ?>
        <div class='content_customer'>
           <?php include 'customer_navbar.php'?>
            <div class="customer_top_nav" style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); ">
             <div class="text" style="color:#ff0066;">Welcome <?php echo $_SESSION['name']?></div>
            </div>
    <br><br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Change Password</u></h3>
            <form action="" method="POST">
                <table align="center">
                    <tr>
                        <td>Enter old password:</td>
                        <td><input type="password" name="old_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter new password:</td>
                        <td><input type="password" name="new_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Enter password again:</td>
                        <td><input type="password" name="again_password" required=""/></td>
                    </tr>
                    </table>
                    
                       <table align="center"><tr>
                        <td><input type="submit" name="change_password" value="Change Password" class="addstaff_button"/></td>
                    </tr>
                </table>
            </form>
            <?php
            $change=$_SESSION['login_id'];
            if(isset($_POST['change_password'])){
            $sql="SELECT * FROM customer WHERE id='$change'";
            $result=mysqli_query($connect,$sql);
            $rws=  mysqli_fetch_array($result);
            
            $salt="@g26jQsG&nh*&#8v";
            $old=  sha1($_POST['old_password'].$salt);
            $new=  sha1($_POST['new_password'].$salt);
            $again=sha1($_POST['again_password'].$salt);
            
            if($rws[9]==$old && $new==$again){
                $sql1="UPDATE customer SET password='$new' WHERE id='$change'";
                mysqli_query($connect,$sql1) or die(mysqli_error($connect));
                header('location:customer_account_summary.php');
            }
            else{
                
                header('location:change_account_summary.php');
            }
            }
            ?>
            
        </div>
        <?php include 'footer.php';?>