<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Statement - Bank of Jaipur</title>
        
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
    

            <br/>
    
    <h3 style="text-align:center;color:#2E4372;"><u>Account summary by Date</u></h3>
  
    
            
    <table align="center">
                        
                        <th>Id</th>
                        <th>Transaction Date</th>
                        <th>Narration</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Balance Amount</th>
                        
                        <?php if(isset($_POST['summary_date'])) {
                         $date1=$_POST['date1'];
                         $date2=$_POST['date2'];
                         
                         include '_inc/dbconn.php';
                         $sender_id=$_SESSION["login_id"];
                         $sql="SELECT * FROM passbook".$sender_id." WHERE transactiondate BETWEEN '$date1' AND '$date2'";
                         $result=  mysqli_query($connect,$sql) or die(mysqli_error($connect));
                        while($rws=  mysqli_fetch_array($result)){
                            
                            echo "<tr>";
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[8]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            echo "<td>".$rws[7]."</td>";
                           
                            echo "</tr>";
                        }
                        } ?>
</table>
    </div>
        <?php include 'footer.php'?>