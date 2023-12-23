<?php
    include "config.php";
    session_start();
    session_destroy();
    unset($_SESSION['mobile_no']);
    header('location:login.php');
?>