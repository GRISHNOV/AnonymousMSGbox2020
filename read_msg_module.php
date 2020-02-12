<?php

    error_reporting(E_ALL);
    session_start();

    require_once "db_module.php";

    if(!isset($_SESSION['auth_exist']) or !isset($_SESSION['auth_error'])){
        header('Location: index.php');
        exit();
    } elseif ($_SESSION['auth_exist'] == False or $_SESSION['auth_error'] == True){
        header('Location: index.php');
        exit();
    }

    print("MAIN READ CLIENT INTERFACE<br><br>");

    $db_connection = connect_to_db();
    $db_query = "SELECT * FROM msg_box";
    $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));
    $db_input = mysqli_fetch_all($db_query_result);

    foreach ($db_input as $db_row) {
        if ($_SESSION['user_id'] == $db_row[2]){

            $db_alias_query = "SELECT alias FROM user_list WHERE user_id = " . $db_row[1];
            $db_alias_query_result = mysqli_query($db_connection, $db_alias_query) or die(mysqli_error($db_connection));
            $db_alias_input = mysqli_fetch_all($db_alias_query_result);

            //var_dump($db_input);

            print("<br>FROM USER WITH ALIAS: " . $db_alias_input[0][0] . "<br><br>" );
            print("MSG CONTENT: " . "<br><br>");
            print($db_row[3]);
            print("<br><hr><br>");
        }
    }
