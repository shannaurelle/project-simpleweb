<?php
    $con = mysqli_connect("localhost","root","","projectSimple");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s \n", mysqli_connect_error());
        exit();
    }
    session_start();
    $sql = "SELECT COUNT(*) AS cart_count FROM carts";  
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
    $total_carts = $result['cart_count'];
    $cart_name = "Cart ".$total_carts;

    $sql = "SELECT COUNT(*) AS customers_count FROM customers"; 
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
    $total_customers = $result['customers_count'];
    $customer_name = "Customer ".$total_customers;

    $stmt = mysqli_stmt_init($con);
    if(mysqli_stmt_prepare($stmt,"INSERT INTO carts (id, cart_name, cart_owner) VALUES (?,?,?)")){
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "iss", $total_carts, $cart_name,$cart_owner);
        mysqli_stmt_execute($stmt);
        header("Location: master.php?rs=1"); // send username not found message
    }
?>