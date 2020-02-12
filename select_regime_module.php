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

    echo "main select interface";
    print("<br><br>");
    var_dump($_SESSION);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<link rel="stylesheet" href="style.css">-->
        <script src="particles.min.js"></script>
        <title>Select mail regime</title>
    </head>
    <body class="msg_client_page">
        <br>
        <button onclick="window.location.href = 'creation_msg_module.php';">Отправить сообщение</button>
        <br>
        <button onclick="window.location.href = 'read_msg_module.php';">Просмотр входящих</button>
        <br>
        <button onclick="window.location.href = 'terminate_session.php';">Выйти</button>
        <br>
    </body>
</html>
