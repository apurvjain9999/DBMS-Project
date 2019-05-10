<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_POST['submit_id']))
{
    $id=$_POST['customer_id'];
    
    include '_inc/dbconn.php';
    $sql="UPDATE beneficiary1 SET status='ACTIVE' WHERE id='$id'";
    mysqli_query($connect,$sql) or die(mysqli_error($connect));
    
   echo '<script>alert("Beneficiary status ACTIVE ");';
   echo 'window.location= "staff_beneficiary.php";</script>';
}