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
    
    echo "main msg interface";
    print("<br><br>");
    var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <script src="particles.min.js"></script>
        <title>MSG box client</title>
    </head>
    <body class="msg_client_page">
        <div id="particles-js"></div>
        <script>
            particlesJS.load('particles-js', 'assets/particles.json', function() {
                console.log('callback - particles.js config loaded');
            });
        </script>
        <div class="login_box">
            <form action="commit_msg_module.php" name="auth_form" method="POST">
                <span style="color:Aqua"><h3 align="center">Форма отправки<br>сообщения</h3></span>
                <hr>
                <input type="text" name="destination_alias" placeholder=" Alias" maxlength="6" id="alias_input" autocomplete="off"><br><br>
                <textarea name="msg" cols="40" rows="10" placeholder=" Message"></textarea><br><br>
                <input type="submit" value="Отправить сообщение">
            </form>
            <hr>
            <div align="right">
                <button onclick="window.location.href = 'select_regime_module.php';">Выбор режима</button>
                <br>
                <button onclick="window.location.href = 'terminate_session.php';">Выйти</button>
            </div>
        </div>
    </body>
</html>