<?php 
session_start();
// Имя пользователя root
$user = 'root';
$password = '';

// Имя базы данных 
$database = 'SDO_2023';

// Сервер является локальным
$servername='localhost';
// подключаемся к базе
$db = mysqli_connect('localhost', 'root', '', 'SDO_2023');

// РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЯ
if (isset($_POST['add_task'])) {
  // получаем все входные данные из формы
  $Zadacha = mysqli_real_escape_string($db, $_POST['Zadacha']);
  //Вставляем данные, подставляя их в запрос
  $query = "INSERT INTO tasks (zadacha) VALUES ('$Zadacha')";
  	mysqli_query($db, $query);
    header('location: ../task/task.php');
  //Если вставка прошла успешно
  if ($query) {
    echo '<p>Данные успешно добавлены в таблицу.</p>';
  } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
  }
  header('location: ../task/task.php');
}

?>