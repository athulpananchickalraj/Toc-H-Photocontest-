<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "F7H8SF";

// Merchant Salt as provided by Payu
$SALT = "u0gi9o8y";


// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()" style="background-color: #999;">
   <br> <center><h1>Payment Details</h1></center>
    <?php if($formError) { ?>
      
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      
      <div class="row">
        <div class="col-md-4 col-md-offset-4 b3">
          <div class="row text-center"><br>
            <p><b>Please verify your Payment Details</b></p><br>
            
            <div class="row">
            <div class="col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1 ">
              <b>First Name</b>
            </div>

            <div class="col-md-1 col-xs-1 col-sm-1">:</div>

            <div class="col-md-5 col-xs-5 col-sm-5 form-group text-left">
              <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
            </div>

          </div><br>

          <div class="row">
            <div class="col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1 ">
              <b>Email_ID</b>
            </div>

            <div class="col-md-1 col-xs-1 col-sm-1">:</div>

            <div class="col-md-5 col-xs-5 col-sm-5 form-group text-left">
              <input type="email" class="form-control" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
            </div> 

          </div><br> 

          <div class="row">
            <div class="col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1 ">
              <b>Phone_Number</b>
            </div>

            <div class="col-md-1 col-xs-1 col-sm-1">:</div>

            <div class="col-md-5 col-xs-5 col-sm-5 form-group text-left">              
              <input type="text" class="form-control" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
            </div> 

          </div><br> 

          <div class="row">
            <div class="col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1 ">
              <b>Credited to</b></div>

            <div class="col-md-1 col-xs-1 col-sm-1">:</div>

            <div class="col-md-5 col-xs-5 col-sm-5 text-left">
              <b><input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" /><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></b>
            </div> 

          </div><br> 

          <div class="row">
            <div class="col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1 ">
              <b>Amount</b></div>

            <div class="col-md-1 col-xs-1 col-sm-1">:</div>

            <div class="col-md-5 col-xs-5 col-sm-5 text-left">
              <b><input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /><?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?></b>
            </div> 
              <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" />
              <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" />
              <input type= "hidden" name="service_provider" value="<?php echo (empty($posted['service_provider'])) ? '' : $posted['service_provider'] ?>" size="64" />
          </div><br> 

          <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
              <?php if(!$hash) { ?>
              <button type="submit" class="btn btn-primary">Confirm</button>
              <?php } ?>              
            </div> 
                     
          </div><br> 

        </div><br>

      </div>

    </div>

</form>
  </body>
</html>
