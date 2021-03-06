<?php

    error_reporting(E_ALL);
    session_start();

    require_once "db_module.php";

    if(!isset($_SESSION['auth_exist'])) {

        if (isset($_GET["user_login"]) and isset($_GET["user_password"])) {
            $db_connection = connect_to_db();
            $db_query = "SELECT * FROM user_list";
            $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));
            $db_input = mysqli_fetch_all($db_query_result);
            foreach ($db_input as $db_row) {
                if ($_GET["user_login"] == hash("sha512", $db_row[1]) and $_GET["user_password"] == hash("sha512", $db_row[2])) {
                    $_SESSION['auth_exist'] = True;
                    $_SESSION['auth_error'] = False;
                    $_SESSION['user_alias'] = $db_row[5];
                    $_SESSION['user_id'] = $db_row[0];
                    sleep(1);
                    header('Location: select_regime_module.php');
                    exit();
                }
            }
            $_SESSION['auth_error'] = True;
            sleep(1);
            header('Location: index.php');
            exit();
        }
    }else{
        header('Location: select_regime_module.php');
        exit();
    }