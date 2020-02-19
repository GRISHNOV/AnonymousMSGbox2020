<?php

    include "php_lib/phpqrcode/qrlib.php";
    require_once "db_module.php";

    function generate_str($len) {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < $len; $i++) {
            $n = random_int(0, strlen($alphabet)-1);
            $pass[$i] = $alphabet[$n];
        }
        $result = "";
        foreach ($pass as $iterator){
            $result = $result . $iterator;
        }
        return $result;
    }

    function user_alias_collision($db_input,$user_alias){
        $user_alias_collision = False;
        foreach ($db_input as $db_row) {
            if ($db_row[5] == $user_alias){
                $user_alias_collision = True;
            }
        }
        return $user_alias_collision;
    }

    function create_RSA_key_pair($user_password){
        $request_to_local_cryptico_server = "http://127.0.0.1:3000/?user_password=" . $user_password;
        $response_from_local_cryptico_server = file_get_contents($request_to_local_cryptico_server) or die("problem: cryptico local server not respond");
        return $response_from_local_cryptico_server;
    }

    function create_registration_qr_code($user_login,$user_password,$user_alias,$user_time_to_destroy){
        $tempDir = "./temp_qr_code_store/";
        $codeContents = 'Login: '. $user_login . PHP_EOL . 'Pass: '. $user_password . PHP_EOL . 'Alias: '. $user_alias . PHP_EOL . 'Live time: ' . $user_time_to_destroy . ' hours';
        $fileName = md5($codeContents) . ".png";
        $pngAbsoluteFilePath = $tempDir.$fileName;
        $urlRelativeFilePath = "/TEMP/".$fileName;
        QRcode::png($codeContents, $pngAbsoluteFilePath,'H',2,2);
        return $fileName;
    }

    function check_alias_existence($alias){
        $db_connection = connect_to_db();
        $db_alias_query = "SELECT alias FROM user_list";
        $db_alias_query_result = mysqli_query($db_connection, $db_alias_query) or die(mysqli_error($db_connection));
        $db_all_alias = mysqli_fetch_all($db_alias_query_result);
        //print_r($db_all_alias);
        foreach ($db_all_alias as $alias_from_db){
            //print($alias_from_db);
            if ($alias_from_db[0] == $alias){
                return true;
            }
        }
        return false;
    }

    function select_receiver_open_RSA_key($alias){
        $db_connection = connect_to_db();
        $db_open_key_query = "SELECT open_RSA_key FROM user_list WHERE alias = " . $alias;
        $db_open_key_query_result = mysqli_query($db_connection, $db_open_key_query) or die(mysqli_error($db_connection));
        $rsa_open_key = mysqli_fetch_all($db_open_key_query_result);
        return $rsa_open_key[0][0];
    }