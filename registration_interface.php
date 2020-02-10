<?php

    error_reporting(E_ALL);
    session_start();

    require_once "php_lib\simple-php-captcha\simple-php-captcha.php";
    $_SESSION['captcha'] = simple_php_captcha();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <script src="particles.min.js"></script>
        <title>registration</title>
    </head>
    <body class="registration_client_page">
    <div id="particles-js"></div>
        <script>
            particlesJS.load('particles-js', 'assets/particles.json', function() {
                console.log('callback - particles.js config loaded');
            });
        </script>
        <div class="registration_box">
            <script>
                function hide_request_button_and_empty_check() {
                    if ( document.reg_form.user_captcha.value == "" ) {
                        alert ( "Заполните форму с символами" );
                        return false;
                    }else {

                        document.getElementById('new_user_request').style.display = 'none';
                        var x = document.getElementById("processing_input").value;
                        document.getElementById("processing_indicator").innerHTML = x;
                        return true;
                    }
                }
            </script>
            <form action="registration_processor.php" name="reg_form" method="GET" onsubmit="return hide_request_button_and_empty_check();">
                <p align="center">Выберите конфигурацию:</p>
                Время жизни:
                <select name = "Time_to_destroy">
                    <option value = "2h" selected>2 часа</option>
                    <option value = "12h">12 часов</option>
                    <option value = "48h">48 часов</option>
                </select>
                <hr>
                <?//print_r($_SESSION['captcha']);?>
                <?echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';?>
                <br>
                <input type="text" name="user_captcha" placeholder=" Write symbols" maxlength="5" autocomplete="off"><br>
                <hr>
                <div id="processing_indicator" align="center">
                    <input type="hidden" id="processing_input" value="PROCESSING">
                </div>
                <input type="submit" value="Создать" id="new_user_request">
            </form>
        </div>
    </body>
</html>
