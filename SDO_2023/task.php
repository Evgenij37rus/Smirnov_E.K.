<?php 
  $title = "Скрытая страница";
  $page_title = "Список задач (скрытая страница)";
  $content = "Текст ниже доступен только полсе авторизации";
  if (isset($_SESSION['username'])){
    
    $content = "
    <form action = 'add.php'>
    <textarea cols = 10 row =10 name = 'task'></textarea>
    <input types='submit' value='отправить'>
    </form>";
    }
    else{
    $content = "Необходимо авторизоваться!";
    }
    include("components/layout.php");
?>