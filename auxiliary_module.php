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