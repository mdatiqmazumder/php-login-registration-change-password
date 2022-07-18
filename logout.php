<?php
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    unset($_SESSION['is_true_sess']);
    header("location: login.php?success_lg_out");
    die();
?>