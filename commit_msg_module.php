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

    print("COMMIT MSG TO SERVER -- RESULT PAGE<br><br>");

    $sender_id = (int)$_SESSION['user_id'];
    $receiver_alias = $_POST['destination_alias'];
    $receiver_id = false;
    $message = $_POST['msg'];

    $db_connection = connect_to_db();
    $db_query = "SELECT * FROM user_list";
    $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));
    $db_input = mysqli_fetch_all($db_query_result);
    foreach ($db_input as $db_row) {
        if ($receiver_alias == $db_row[5]){
            $receiver_id = (int)$db_row[0];
            break;
        }
    }
    if ($receiver_id == false){
        print("<br>ALIAS NOT FOUND<br>");
        exit();
    }
    $db_query = "INSERT INTO msg_box (sender_id, receiver_id, msg) VALUES ('$sender_id' , '$receiver_id' , '$message')";
    $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));

    print("COMMIT COMPLETE");