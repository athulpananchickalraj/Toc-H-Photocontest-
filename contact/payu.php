<?php

//def's by apr
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
if($userRow['payed']=='1')
{
  header("Location: contactform.php");?>
  <script>window.open("http://tochindia.in/photocontest/contact/contactform.php")</script> <?php
}
$firstname=$userRow['username'];
$phone=$userRow['phone'];
$email=$userRow['email'];
$amount="100";
$surl="http://tochindia.in/photocontest/success.php";
$furl="http://tochindia.in/photocontest/contact/failure.php";
$productinfo="TocH PhotoContest";
$service_provider="payu_paisa";
?>
<html>
<head>      
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

  <link rel="STYLESHEET" type="text/css" href="contact.css" />

</head>
<body>

  <form method="post" action="PayUMoney_form.php">

    <div class="row" style="margin-top: 180px;">
      <div class="col-md-4 col-md-offset-4 b3">
        <div class="row text-center"><br>
          <h2>Contest fee Rs:100/-</h2><br>
          <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
              <input type="hidden" name="firstname" value="<?php echo$firstname ?>">
              <input type="hidden" name="phone" value="<?php echo$phone ?>">
              <input type="hidden" name="email" value="<?php echo$email ?>">
              <input type="hidden" name="amount" value="<?php echo$amount ?>">
              <input type="hidden" name="surl" value="<?php echo$surl ?>">
              <input type="hidden" name="furl" value="<?php echo$furl ?>">
              <input type="hidden" name="productinfo" value="<?php echo$productinfo ?>">
              <input type="hidden" name="service_provider" value="<?php echo$service_provider ?>">
              <button type="submit" class="btn btn-primary">Proceed to Pay</button>
            </div> 
          </div><br>
        </div><br>
      </div>
    </div>

  </form>


<body>  
</html>

