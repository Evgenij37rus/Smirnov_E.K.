<?php 
  
  session_start();

    $title = "Скрытая страница_async";
    $page_title = "Список задач (скрытая страница_async)";

     // Имя пользователя root
     $user = 'root';
     $password = '';
     
    // Имя базы данных 
     $database = 'SDO_2023';
     
     // Сервер является локальным
     $servername='localhost';
     $mysqli = new mysqli($servername, $user, $password, $database);
     
     // Проверка соединения
     if ($mysqli->connect_error) {
         die('Connect Error (' .
         $mysqli->connect_errno . ') '.
         $mysqli->connect_error);
     }


   
    
    // SQL-запрос для выбора данных из базы данных
    $sql = " SELECT * FROM tasks";
    $result = $mysqli->query($sql);
    $mysqli->close();

  include("../components/layout_async.php");
?>