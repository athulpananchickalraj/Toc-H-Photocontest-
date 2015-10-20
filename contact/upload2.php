<?php
include_once 'dbconnect.php';
session_start();
$user=$_SESSION['user'];
$caption2=$_POST['caption2'];
$theme2=$_POST['theme2'];
$target_dir = "uploads/";
$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk = 1;
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
$message = "Not an Image";
$message1 = "Image too large";
$message2 = "File already exists";
$message3 = "Only CR2 & NEF files are allowed";
$message4 = "Sorry, Image not Uploaded";
$message5 = "Image Uploaded";
$message6 = "Error Uploading Image";

$filename  = basename($_FILES['fileToUpload2']['name']);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$new       = "$user".'2'.'.'.$extension;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file2)) {
    echo "<script type='text/javascript'>alert('$message2');</script>";
    $uploadOk = 0;
}


// Check file size
if ($_FILES["fileToUpload2"]["size"] > 500000000) {
    echo "<script type='text/javascript'>alert('$message1');</script>";
    $uploadOk = 0;
}


// Allow certain file formats
if( $imageFileType2 != "CR2" && $imageFileType2 != "NEF" && $imageFileType2 != "jpg" && $imageFileType2 != "jpeg" && $imageFileType2 != "JPEG" && $imageFileType2 != "JPG") {
    echo "<script type='text/javascript'>alert('$message3');</script>";
    ?><script type='text/javascript'>window.location="contactform2.php"</script>";<?
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script type='text/javascript'>alert('$message4');</script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"],"uploads/{$new}")) {
        mysql_query("UPDATE submission SET theme2='$theme2', caption2='$caption2',raw2='$new' WHERE user_id='$user'");
        echo "<script type='text/javascript'>alert('$message5');</script>";
    } else {
        echo "<script type='text/javascript'>alert('$message6');</script>";
    }
}

?>
<script type='text/javascript'>window.location="contactform3.php"</script>