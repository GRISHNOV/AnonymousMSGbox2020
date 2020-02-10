<?php

    error_reporting(E_ALL);
    session_start();

    #ini_set('display_errors', 0);
    #ini_set('display_startup_errors', 0);
    #error_reporting(0);

    require_once "db_module.php";
    require_once "auxiliary_module.php";
    require_once "php_lib\simple-php-captcha\simple-php-captcha.php";

    //print($_SESSION['captcha']['code']);
    //print($_GET[user_captcha]);

    if ($_SESSION['captcha']['code'] != $_GET['user_captcha']){
        $_SESSION['captcha_check_error'] = true;
        sleep(1);
        header('Location: registration_interface.php');
        exit();
    } else {
        if (isset($_SESSION['captcha_check_error'])){
            unset($_SESSION['captcha_check_error']);
        }
    }

    if ($_GET['Time_to_destroy'] == "2h"){
        $user_time_to_destroy = 2;
    } elseif ($_GET['Time_to_destroy'] == "12h"){
        $user_time_to_destroy = 12;
    } elseif ($_GET['Time_to_destroy'] == "48h"){
        $user_time_to_destroy = 48;
    } else {
        sleep(1);
        header('Location: index.php');
        exit();
    }

    $user_login = generate_str(8);
    $user_password = generate_str(16);
    $user_alias = random_int(100000,999999);

    $user_registration_qr_code = create_registration_qr_code($user_login,$user_password,(string)$user_alias,(string)$user_time_to_destroy);

    $user_login_hash = hash('sha512', $user_login);
    $user_password_hash = hash('sha512', $user_password);
    $new_open_RSA_user_key = create_RSA_key_pair($user_password);

    $db_connection = connect_to_db();

    $db_query = "SELECT * FROM user_list";
    $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));
    $db_input = mysqli_fetch_all($db_query_result);
    while(True){
        if (user_alias_collision($db_input,$user_alias) == True){
            $user_alias = random_int(100000,999999);
        }else{
            break;
        }
    }

    $db_query = "INSERT INTO user_list (login, password, user_time_to_destroy, alias, open_RSA_key) VALUES ('$user_login_hash' , '$user_password_hash' , '$user_time_to_destroy' , '$user_alias' , '$new_open_RSA_user_key')";
    $db_query_result = mysqli_query($db_connection, $db_query) or die(mysqli_error($db_connection));

    #print($user_login);
    #print("<br>");
    #print($user_password);
    #print("<br>");
    #print($user_alias);

    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <script src="particles.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="cryptico_js/cryptico.min.js"></script>
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
            <!--<div id="frontend_crypto_init">
                <input type="hidden" id="new_user_login" value="<?php //print($user_login); ?>">
                <input type="hidden" id="new_user_password" value="<?php //print($user_password); ?>">
                <input type="hidden" id="new_user_alias" value="<?php //print($user_alias); ?>">
            </div>-->
            <!--
            <script>
                new_login = document.getElementById("new_user_login").value;;
                new_password = document.getElementById("new_user_password").value;;
                new_alias = document.getElementById("new_user_alias").value;;
                alert(new_login);
                alert(new_password);
                alert(new_alias);
                var PassPhrase = new_password;
                var Bits = 2048;
                var UserRSAkey = cryptico.generateRSAKey(PassPhrase, Bits);
                var UserPublicKeyString = cryptico.publicKeyString(UserRSAkey);
                alert(UserPublicKeyString);
            </script>
            -->
            <?php
                /*print($user_login);
                print("<br>");
                print($user_password);
                print("<br>");
                print($user_alias);
                print("<br>");*/
                #print('<p align=\"justify\">' . $new_open_RSA_user_key . '</p>');
            ?>
            <div align="center">
                <p>Новый почтовый ящик создан</p>
                <hr>
                <p>Login: <?print($user_login);?></p>
                <p>Password: <?print($user_password);?></p>
                <p>Alias: <?print($user_alias);?></p>
                <p>Время жизни: <?print($user_time_to_destroy . " hours");?></p>
                <img src="temp_qr_code_store/<?print($user_registration_qr_code);?>" alt="Registration QR-code">
                <hr>
                <button onclick="window.location.href = 'index.php';">Завершить</button>
            </div>
        </div>
    </body>
</html>

<?php
    flush();
    sleep(1);
    unlink("temp_qr_code_store/" . $user_registration_qr_code);
