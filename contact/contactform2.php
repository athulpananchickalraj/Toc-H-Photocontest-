<?PHP
session_start();
if(!isset($_SESSION['user']))
{
 header("Location: http://tochindia.in/photocontest/index.php");
}
$user=$_SESSION['user'];
include_once 'dbconnect.php';
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
if($userRow['payed']=='0')
{ header("Location: http://tochindia.in/photocontest/index.php");
}
$var=mysql_query("SELECT * FROM submission WHERE user_id=".$_SESSION['user']);
$dyn=mysql_fetch_array($var);
$image1=$dyn['raw2'];
$t1=$dyn['theme1'];
$t2=$dyn['theme2'];
$t3=$dyn['theme3'];
//$formproc->AddFileUploadField('photo','jpg,jpeg',20240);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submission</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
    <div id="header">
 <div id="left">
    <label>TocH Photo Contest</label>
    </div>
     
   
</div>
<center>
    <div id="logo">
            <h1 id="mar">Photograph-2</h1>
        </div>
<div id="login-form"><br><br>
 <br><br>  

 <form action="upload2.php" method="post" enctype="multipart/form-data">
  <table align="center" width="50%" border="0"><? if($image1!=NULL){?>
  <tr> 
    <img src="http://tochindia.in/photocontest/contact/uploads/<?php echo"$image1"?>" height=auto width=500px ><br><br><h2><?echo"$meme"?></h2><br><br>
</tr><?}?>
    <tr>
<td><input type="text" name="caption2" placeholder="Caption" required /></td>
</tr>
<tr>
<td><select name="theme2">

<?php if($t1!="Follow_Me"&&$t3!="Follow_Me")
{ ?><option value="Follow_Me">Follow Me</option><? } ?>

<?php if($t1!="Float"&&$t3!="Float")
{ ?><option value="Float">Float</option><? } ?>

<?php if($t1!="Bugs_Life"&&$t3!="Bugs_Life")
{ ?><option value="Bugs_Life">Bugs Life</option><? } ?>

<?php if($t1!="Torque"&&$t3!="Torque")
{ ?><option value="Torque">Torque</option><? } ?>

<?php if($t1!="Colors_and_Festivities"&&$t3!="Colors_and_Festivities")
{ ?><option value="Colors_and_Festivities">Colors and Festivities</option><? } ?>


</select></td>
</tr>
<tr><td>   
    Upload Photograph 2:
    <input type="file" name="fileToUpload2" id="fileToUpload2" required></tr></td>
    <tr><td>
    <button type="submit" value="Upload" name="submit">Proceed</button><br>
</td></tr></form><? if($image1!=NULL){?>
<tr><td ><form action="contactform3.php" method="post"><center><button type="submit" value="Skip" id="skip">Skip</button></center></form></td></tr><tr>
<?}?>
<td ><form action="thank-you.php" method="post"><center><button type="submit" value="Skip & Submit" id="skip">Skip & Submit</button></center></form></td></tr>

</table>
</div>

</center>
</body>
</html>
