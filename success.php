<?php
session_start();
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="u0gi9o8y";
include_once 'dbconnect.php';
          	   
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          mysql_query("UPDATE users SET payed=1 WHERE user_id=".$_SESSION['user']);
          $txt = "Upload Images ?";
          echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('$txt')
              window.location.href='http://www.tochindia.in/photocontest/home.php';
              </SCRIPT>");
          
                
?>	
<html>
<body>
  <form method="post">
  </form>
  <body>
</html>