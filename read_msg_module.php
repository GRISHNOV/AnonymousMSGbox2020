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

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="cryptico_js/cryptico.min.js"></script>
        <script src="received_message_decryption.js"></script>
        <title>read msg</title>
    </head>
    <body>
    <?php
        print("<h3>MAIN READ CLIENT INTERFACE</h3><br>");

        $db_connection = connect_to_db();
        $db_query = "SELECT * FROM msg_box";
        $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));
        $db_input = mysqli_fetch_all($db_query_result);

        $msg_id_counter = 0;
        foreach ($db_input as $db_row) {
            if ($_SESSION['user_id'] == $db_row[2]){
                $db_alias_query = "SELECT alias FROM user_list WHERE user_id = " . $db_row[1];
                $db_alias_query_result = mysqli_query($db_connection, $db_alias_query) or die(mysqli_error($db_connection));
                $db_alias_input = mysqli_fetch_all($db_alias_query_result);
                print("\n");
                print("<p>FROM USER WITH ALIAS: " . $db_alias_input[0][0] . "</p>\n" );
                print("<p>MSG CONTENT:</p>\n");
                print('<p id="encrypted_msg_' . $msg_id_counter .'">' . $db_row[3] . "</p>");
                print("\n");
                print("<hr>");
                $msg_id_counter++;
            }
        }
    ?>
    <script>
        console.log("__start decryption__");
        decrypting_messages();
        console.log("__complete decryption__");
    </script>
    </body>
</html>
