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