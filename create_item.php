<?php

require('config.php');

$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$access =  filter_var($_POST['access'],FILTER_SANITIZE_STRING);
$stmt = mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,"INSERT INTO accounts (username, password) VALUES (?,?)")){
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $username, $password,$access);
    mysqli_stmt_execute($stmt);
    header("Location: index.php?rs=5"); // send user account created message
}

mysqli_close($con);
exit();

?>