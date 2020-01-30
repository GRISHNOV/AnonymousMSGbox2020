<?php
    error_reporting(E_ALL);
    session_start();

    if(!isset($_SESSION['auth_exist'])){
        ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <link rel="stylesheet" href="style.css">
                    <title>MSG box login</title>
                </head>
                <body class="login_page">
                    <div class="login_box">
                        <form action="auth_processor.php" method="GET">
                            <p align="center">Добро пожаловать!</p>
                            <input type="text" name="user_login" placeholder="Login"><br><br>
                            <input type="password" name="user_password" placeholder="Password"><br><br>
                            <input type="submit" value="Войти"><? if(isset($_SESSION['auth_error'])) {echo " Ошибка";} ?>
                        </form>
                        <button onclick="window.location.href = 'registration_intefrace.php';">Регистрация</button>
                            <?php

                            ?>
                    </div>
                </body>
            </html>
        <?php
    }else{
        header('Location: main_msg_module.php');
    }
    #print("<br><br>");
    #var_dump($_SESSION);    
    #session_destroy();
    #$_SESSION['auth'] = True;
?>