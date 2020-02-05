<?php

    function generate_str($len) {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < $len; $i++) {
            $n = random_int(0, strlen($alphabet)-1);
            $pass[$i] = $alphabet[$n];
        }
        $result = "";
        foreach ($pass as $iterator){
            $result = $result .$iterator;
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