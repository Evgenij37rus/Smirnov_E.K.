<?php
    //Инициализируем сессию
    session_start();
    function get_mysqli()
    {
        static $mysqli;
        if(!$mysqli){
            $config = include ('db_config.php');
            $mysqli = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
        }
        return $mysqli;
    }

?>