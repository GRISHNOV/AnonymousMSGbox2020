<?php

    error_reporting(E_ALL);
    session_start();
    
    echo "main msg interface";
    print("<br><br>");
    var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>MSG box client</title>
    </head>
    <body class="msg_client_page">
    </body>
</html>
