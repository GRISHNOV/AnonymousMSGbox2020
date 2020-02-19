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

    print("SELECT RECEIVER ALIAS:\n\n");

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
        <form action="select_receiver_alias_module.php" name="auth_form" method="GET">
            <input type="text" name="receiver_alias" placeholder=" Receiver alias" maxlength="6" autocomplete="off"><br><br>
            <input type="submit" value="Выбрать получателя">
            <?php
                print("\n\n");
                print(check_alias_existence($_GET["receiver_alias"])); # temporary
            ?>
        </form>
    </body>
</html>
