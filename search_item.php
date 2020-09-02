<?php
require_once('config.php');


$text = filter_var($_POST['search_query'],FILTER_SANITIZE_STRING);

$stmt = mysqli_stmt_init($con);

$sql = "SELECT * FROM `item` WHERE MATCH(`product_name`) 
AGAINST('" . $text . "' IN NATURAL LANGUAGE MODE) ORDER BY product_name DESC";


if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt,'s',$text);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    echo $result;
}
else{
    echo '';
}
?>