<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_POST['submit_id']))
{
    include '_inc/dbconn.php';
    $id=$_POST['customer_id'];
    
    $sql="SELECT * FROM cheque_book WHERE id='$id'";
    $result=  mysqli_query($connect,$sql) or die(mysqli_error($connect));
    $rws=  mysqli_fetch_array($result);
                
    if($rws[3]=="PENDING")
    $sql="UPDATE cheque_book SET cheque_book_status='ISSUED' WHERE id='$id'";
    
    mysqli_query($connect,$sql) or die(mysqli_error($connect));
    
    echo '<script>alert("Cheque Book Issued");';
    echo 'window.location= "staff_cheque_approve.php";</script>';
}