<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Homepage - Bank of Jaipur</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
        <?php include 'header.php' ?>
        <div class='content'>
            
           <?php include 'admin_navbar.php'?>
            <div class='admin_staff' style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); ">
               
                <ul>
                    <li><b><u>Staff</u></b></li>
       <li> <a href="addstaff.php">Add staff member</a></li>
        <li><a href="display_staff.php">Edit staff member</a></li>
        <li> <a href="delete_staff.php">Delete staff</a></li>
        </ul>
        </div>
            <div class='admin_customer'  style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); ">
                <ul>
                   <li><b><u> Customer</u></b></li>
        <li><a href="addcustomer.php">Add Customer</a></li>
       <li> <a href="display_customer.php">Edit customer</a></li>
       <li> <a href="delete_customer.php">Delete customer</a></li>
        </div>
        </div>
        <?php include 'footer.php';?>
    </body>
</html>