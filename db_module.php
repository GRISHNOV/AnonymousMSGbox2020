<?php
    function connect_to_db(){
        $host = 'localhost';
		$user = 'root';
		$password = '';
        $db_name = 'my_test_db';
        
        $db_connection = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($db_connection));
        mysqli_query($db_connection,"SET NAMES 'utf8'");

        return $db_connection;
    }