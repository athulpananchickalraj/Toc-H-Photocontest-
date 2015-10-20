<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$resv=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$rfv=mysql_fetch_array($resv);
$edc=$rfv['entry'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TocH India-ONLINE PHOTOGRAPHY CONTEST</title>
	<meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
	<meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.ico">
<script type="text/javascript" src="style/overlay_script.js"></script>
<script type="text/javascript" src="style/tinybox.js"></script>
<link rel="stylesheet" type="text/css" href="style/stylex.css">
<link rel="stylesheet" href="css/style.css" type="text/css" />

<div id="socialfb"><iframe src="http://www.facebook.com/plugins/like.php?href=https://www.facebook.com/tochindia&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;font=tahoma&amp;colorscheme=light&amp;action=like&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="false"></iframe></div>				 
<div class="sn1">
    <ul class="sn" >
      <li><a href="logout.php?logout"><img src="images/logout.png"></a></li>
   </ul>
    </div>

</head>
<body onload="set_pies()">
	<div id="header">
 <div id="left">
    <label>TocH Photo Contest</label>
    </div>
    <div id="right">
     <div id="content">
         hi' <?php echo $userRow['username']; ?>&nbsp;
        </div>
    </div>
</div>
<script type="text/javascript">
 window.onload = function()
   {
      //TINY.box.show({iframe:'https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fdyuthigec&amp;width=500&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=411718605604683" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:290px;" allowTransparency="true"',width:500,height:290,boxid:'frameless'});
  
   window.onload = set_pies();
   }
</script>
<?php
$deg=45;
?>
<div id="shutterbug_logo">
	<img class="shutter_logo" src="images/shutter.png" onclick="close_overlay()">
</div>
<div id="container">
	
	<div id="circle_box">
		
		<div id="pie1" onclick="onclick_pie1()">
			<div id="pie1_content" >
				<h1>THEMES</h1>				
			</div>
			
		</div>
		
		<div id="pie2" onclick="onclick_pie2()">
			<div id="pie2_content">
				<h1>RULES</h1>
			</div>
		</div>
		<a href="contact/payu.php">
		<div id="pie3">
			<div id="pie3_content">
				<?if($edc=='1'){?>
				<h1>CHANGE</h1>
				<?}
				else{?>
				<h1>UPLOAD</h1>
               <?}?>
			</div>
		</div></a>
		
		<div id="pie4" onclick="onclick_pie4()">
			<div id="pie4_content">
				<h1>CRITERION</h1>
			</div>
		</div>	
		
		
		<div id="white_circle">
		</div>
		
		<div id="logo">
			<a href ="http://tochindia.in/" target="_blank"><img src="images/logo.png" alt="TocH Logo" ></a>
		</div>
	</div>
	
	<div id="background_fade">
	</div>
	<div id="overlay_rr" class="overlay">
		<div id="rules_and_reg" class="overlay_content">
			<img src="images/rule.jpg" onclick="close_overlay()" height="auto" width="auto" border="none" align="centre" scrolling="no" class="rounded_border">
		</div>
	</div>
	
	<div id="overlay_upload" class="overlay">
		<div id="pie_close_overlay">
			<img class="close_button" src="images/closebutton.png" onclick="close_overlay()">
		</div>
		<div id="upload_form" class="overlay_content">
		 <div align="center"> 
			<iframe class="rounded_border" src="contact/payu.php" style=" width:800px; align:middle; height:400px; border:none;" scrolling="auto"></iframe>
			<img src="images/poster.png">
		</div>
		</div>
	</div>
	<div id="overlay_jc" class="overlay">
		
		<div id="judging_criteria" class="overlay_content">
			<img src="images/judge.png" onclick="close_overlay()" height="auto" width="auto" border="none" align="centre" scrolling="no" class="rounded_border">
		</div>
	</div>
	<div id="overlay_about" class="overlay">
		
		
			<img src="images/theme.jpg" onclick="close_overlay()" height="auto" width="auto" border="none" align="centre" scrolling="no" class="rounded_border">
	</div>
	
	
</div>	
  
  
</body>
</html>
