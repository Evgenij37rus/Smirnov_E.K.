<?php 
  
  session_start();

    $title = "Скрытая страница";
    $page_title = "Список задач (скрытая страница)";
    $content = $content."
    <form action= 'add_task.php' method='post'>
    <textarea cols = 10 rows = 10 name = 'task'></textarea><br>
    <input type='submit' value = 'отправить'>
    </form>"

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
    
    $content = $content."<table border = '1' class='table'>";
    $count =0;
    while ($row = $result->featch_row())
    {
        $html_row ="";
        $html_row = $html_row . '<tr>';
        $html_row = $html_row . '<td>' .$row[1] = '</td><td>' . $row[2] . '</td>';
        $html_row = $html_row . '</tr>';
        $content = $content.$html_row;
    }
    $content = $content."</table>";
    echo $content;
    
?>
