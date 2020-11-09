<?php
    session_start();
    session_unset();
    header("location:worker_login.php");
?>