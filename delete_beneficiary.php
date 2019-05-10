<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
if(isset($_POST['submit_id']))
{
include '_inc/dbconn.php';
$customer_id=$_POST["customer_id"];
$sql="DELETE FROM beneficiary1 WHERE id='$customer_id'";
$result=  mysqli_query($connect,$sql) or die(mysqli_error($connect));

echo '<script>alert("Beneficiary Deleted successfully. ");';
                     echo 'window.location= "display_beneficiary.php";</script>';
                    
}
?>