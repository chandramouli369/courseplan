<?php
session_start();
$un = $_SESSION['username'];
$sid = $_SESSION['sid'];
$page = $_POST['page'];

// Search if file already exists with same name
// if exists, delete the file 
$file = glob ("./uploads/$page/$sid.*");
if (count($file)) unlink($file[0]);

// File upload path
$targetDir = "uploads/$page/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
// echo $fileName;

$uploadto = $targetDir.$sid.".".$fileType;
// echo $uploadto;

// $files1 = scandir($targetDir);
// print_r ($files1);


if(isset($_POST["new_file"]) && !empty($_FILES["file"]["name"]))
{
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes))
    {
        // Upload file to server
        move_uploaded_file($_FILES["file"]["tmp_name"], $uploadto);
    }
    else
    {
        // $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
header("Location:index.php?page=$page");
?>