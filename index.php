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
                    <script src="particles.min.js"></script>
                    <script src="crypto_frontend.js"></script>
                    <script src="index_page.js"></script>
                    <title>MSG box login</title>
                </head>
                <body class="login_page">
                    <div id="particles-js"></div>
                    <script>
                        particlesJS.load('particles-js', 'assets/particles.json', function() {
                            console.log('callback - particles.js config loaded');
                        });
                    </script>
                    <div class="login_box">
                        <form action="auth_processor.php" name="auth_form" method="GET" onsubmit="return preprocessing_auth_form();">
                            <span style="color:Aqua"><h3 align="center">Anonymous self-destructing<br>email service</h3></span>
                            <hr>
                            <input type="text" name="user_login" placeholder="Login" maxlength="8" id="login_input"><br><br>
                            <div id="processing_indicator" align="center">
                                <input type="hidden" id="processing_input" value="PROCESSING">
                            </div>
                            <input type="password" name="user_password" placeholder="Password" maxlength="16" id="password_input"><br><br>
                            <input type="submit" value="Войти"><? if(isset($_SESSION['auth_error'])) {echo "<span style=\"color:#FFD700\"> Ошибка</span>";} ?>
                        </form>
                        <hr>
                        <br>
                        <button onclick="window.location.href = 'registration_intefrace.php';">Создать почтовый ящик</button>
                        <br>
                        <button onclick="window.location.href = 'help.php';">Справка</button>
                            <?php

                            ?>
                    </div>
                </body>
            </html>
        <?php
    }else{
        header('Location: main_msg_module.php');
        exit();
    }
    #print("<br><br>");
    #var_dump($_SESSION);    
    #session_destroy();
    #$_SESSION['auth'] = True;
?>