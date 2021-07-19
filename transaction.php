<?php
 include 'config.php';

 session_start();

 $name1=$_SESSION['username'];
 $sql="SELECT current_balance FROM customers WHERE username='$name1' ";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $var=$row['current_balance'];
 $from=$_SESSION['username'];
 $to=$_POST['receiver'];
 $q1="SELECT current_balance FROM customers WHERE username='$to' ";
 $result1=mysqli_query($conn,$q1);
 $row=mysqli_fetch_assoc($result1);
 $var1=$row['current_balance'];
 
 session_destroy();

 if( $var >= $_POST["amount"]) {
    $debit=$var-$_POST['amount'];
    $sql="UPDATE customers SET current_balance='$debit' WHERE username='$from'";
    $result=mysqli_query($conn,$sql);
    $credit=$var1+$_POST['amount']; 
    $sql="UPDATE customers SET current_balance='$credit' WHERE username='$to' ";
    $result=mysqli_query($conn,$sql);
    $popupsend=$_POST['amount'];
    $sql="INSERT INTO transaction_history(sender, receiver, amount) VALUES('$from', '$to', $popupsend)";
    $result=mysqli_query($conn,$sql);

    include 'welcome.php';
    
    echo "<script>alert('Transaction Successful!')</script>";
    
   } else {
      
   echo "<script>alert('Insufficient Balance.')</script>";
   
   }
?>

