<?php
    session_start();
    session_destroy();
    header("Location: index.php?rs=4") // send logout message 
?>