<?php

    error_reporting(E_ALL);
    session_start();

    if(!isset($_SESSION['auth_exist']) or !isset($_SESSION['auth_error'])){
        header('Location: index.php');
        exit();
    } elseif ($_SESSION['auth_exist'] == False or $_SESSION['auth_error'] == True){
        header('Location: index.php');
        exit();
    }

    require_once "auxiliary_module.php";

    if (isset($_GET["receiver_alias"])){
        if (check_alias_existence($_GET["receiver_alias"]) == true){
            $_SESSION["receiver_alias"] = $_GET["receiver_alias"];
            $_SESSION["receiver_open_RSA_key"] = select_receiver_open_RSA_key($_SESSION["receiver_alias"]);
            header('Location: creation_msg_module.php');
            exit();
        }else{
            $_SESSION["receiver_alias"] = "not found";
            header('Location: select_receiver_alias_module.php');
            exit();
        }
    }