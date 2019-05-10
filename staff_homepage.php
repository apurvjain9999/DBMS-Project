<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
 <?php
                $staff_id=$_SESSION['staff_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM staff WHERE email='$staff_id'";
                $result=  mysqli_query($connect,$sql) or die(mysqli_error($connect));
                $rws=  mysqli_fetch_array($result);
                
                $id=$rws[0];
                $name=$rws[1];
                $dob=$rws[2];
                $department=$rws[4];
                $doj=$rws[5];
                $mobile=$rws[7];
                $email=$rws[8];
                $gender=$rws[10];
                $last_login=$rws[11];
                
                $_SESSION['login_id']=$email;
                $_SESSION['name1']=$name;
                $_SESSION['id']=$id;
                ?>
            
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Staff Home - Bank of Jaipur</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
        <?php include 'header.php' ?>
        <div class="displaystaff_content">
            
           <?php include 'staff_navbar.php'?>
            <div class="customer_top_nav" style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); ">
             <div class="text" style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); color:#ff0066;">Welcome <?php echo $_SESSION['name1']?></div>
            </div>
           
            <div class="customer_body">
             <div class="content1" style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); ">
                <p><span class="heading">Name: </span><?php echo $name;?></p>
            <p><span class="heading">Department: </span><?php echo $department;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            </div>
             <div class="content2" style="background: linear-gradient(to bottom, rgba(255,204,255,1) 0%,rgba(255,153,255,1) 98%,rgba(255,153,255,1) 100%); ">
            <p><span class="heading">DOJ: </span><?php echo $doj;?></p>
            <p><span class="heading">Last Login: </span><?php echo $last_login;?></p>
            </div>
            </div>
        </div>
    <?php include 'footer.php';?>
<?php
$date1=date('Y-m-d H:i:s');
$_SESSION['staff_date']=$date1;
?>
            
                