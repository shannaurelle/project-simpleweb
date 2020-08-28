<?php
$con = mysqli_connect("localhost","root","","projectSimple");
if(mysqli_connect_errno()){
    printf("Connect failed: %s \n", mysqli_connect_error());
    exit();
}
session_start();
$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$passwd = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

$stmt = mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,"SELECT * FROM accounts WHERE username = ?")){
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    if(password_verify($passwd,$data['password'])){
        $_SESSION['active'] == "Yes";
        if($data['access']=="Master"){
            header("Location: master.php");
        }
        else if($data['access'] == "Normal"){
            header("Location: search.php");
        }
        else{
            header("Location: index.php?rs=3"); // send invalid user credentials
        }
    }
    else{
        header("Location: index.php?rs=2"); // send invalid password message
    }
}
else{
    header("Location: index.php?rs=1"); // send username not found message
}
exit();
?>