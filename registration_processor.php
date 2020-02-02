<?php
    error_reporting(E_ALL);
    session_start();

    require_once "db_module.php";
    require_once "auxiliary_module.php";

    if ($_GET['Time_to_destroy'] == "2h"){
        $user_time_to_destroy = 2;
    } elseif ($_GET['Time_to_destroy'] == "12h"){
        $user_time_to_destroy = 12;
    } elseif ($_GET['Time_to_destroy'] == "48h"){
        $user_time_to_destroy = 48;
    } else {
        exit();
    }

    $user_login = generate_str(8);
    $user_password = generate_str(16);

    print($user_login);
    print("<br>");
    print($user_password);

    $user_login_hash = hash('sha512', hash('sha512', $user_login));
    $user_password_hash = hash('sha512', hash('sha512', $user_password));

    $db_connection = connect_to_db();
    $db_query = "INSERT INTO user_list (login, password, user_time_to_destroy) VALUES ('$user_login_hash' , '$user_password_hash' , '$user_time_to_destroy' )";
    $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));
