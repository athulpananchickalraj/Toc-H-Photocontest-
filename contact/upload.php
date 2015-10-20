<?php
include_once 'dbconnect.php';
session_start();
$user=$_SESSION['user'];
$caption1=$_POST['caption1'];
$theme1=$_POST['theme1'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$message = "Not an Image";
$message1 = "Image too large";
$message2 = "File already exists";
$message3 = "Only JPG,JPEG,CR2 & NEF files are allowed";
$message4 = "Sorry, Image not Uploaded";
$message5 = "Image Uploaded";
$message6 = "Error Uploading Image";
$messag ="You already submitted";
$var=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$dyn=mysql_fetch_array($var);
$image1=$dyn['entry'];
$filename  = basename($_FILES['fileToUpload']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = "$user".'1'.'.'.$extension;


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "<script type='text/javascript'>alert('$message2');</script>";
    $uploadOk = 0;
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "<script type='text/javascript'>alert('$message1');</script>";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "JPEG" && $imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "CR2" && $imageFileType != "NEF") {
    echo "<script type='text/javascript'>alert('$message3');</script>";
    ?><script type='text/javascript'>window.location="contactform.php"</script>";<?php
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script type='text/javascript'>alert('$message4');</script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"uploads/{$new}")) {
        if($image1!=1)
        {
            mysql_query("INSERT INTO submission(user_id) VALUES('$user')");
        }
        mysql_query("UPDATE submission SET theme1='$theme1', caption1='$caption1',photo1='$new' WHERE user_id='$user'");
        mysql_query("UPDATE users SET entry=1 WHERE user_id='$user'");
        echo "<script type='text/javascript'>alert('$message5');</script>";
    } else {
        echo "<script type='text/javascript'>alert('$message6');</script>";
    }
}

?>
<script type='text/javascript'>window.location="contactform2.php"</script>