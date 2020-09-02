<?php

require('config.php');

if(isset($_FILES['img_file'])) { $tmpFilePath = $_FILES['img_file']['tmp-name']; }

if(is_uploaded_file($_FILES['img_file']['tmp-name'])) {

    $img_filename = basename($_FILES['img_file']['name']);
    
    $img_newname = "./assets/img/" .$img_filename;

if (!file_exists($tmpFilePath)) {
    
    move_uploaded_file($tmpFilePath,$img_newname);
    }
    else {  
        echo "<script type='text/javascript'>
        alert('File already exists!');
        document.location.href = 'index.html';
        </script>";
        }
}

$

$item_name = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$location = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$description =  filter_var($_POST['access'],FILTER_SANITIZE_STRING);
$price = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$qty_available = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$unit_measurement =  filter_var($_POST['access'],FILTER_SANITIZE_STRING);
$unit_packaging = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$qty_per_packaging = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$item_img_path = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$date_created =  filter_var($_POST['access'],FILTER_SANITIZE_STRING);
$isUpdate = ($_SESSION['edit']==1) ? TRUE : FALSE;

if($isUpdate){ mysqli_query($con,"DELETE FROM items WHERE item_name = $item_name"); }

$stmt = mysqli_stmt_init($con);
$sql = 'INSERT INTO `items`
        (`item_name`, `location`, `description`, 
        `price`, `qty_available`, `unit_measurement`, 
        `unit_packaging`, `qty_per_packaging`, `item_img_path`, `date_created`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)';

if(mysqli_stmt_prepare($stmt,$sql)){
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $username, $password,$access);
    mysqli_stmt_execute($stmt);
    header("Location: index.php?rs=5"); // send user account created message
}

mysqli_close($con);
exit();

?>