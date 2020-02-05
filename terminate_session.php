<?php

    error_reporting(E_ALL);
    session_start();

    unset($_SESSION['auth_exist']);
    unset($_SESSION['auth_error']);

    session_destroy();

    header('Location: index.php');
    exit();