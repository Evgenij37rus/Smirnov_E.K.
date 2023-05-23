<?php
session_start();

// инициализация переменных
$username = "";
$errors = array(); 


// подключаемся к базе
$db = mysqli_connect('localhost', 'root', '', 'SDO_2023');


// РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЯ
if (isset($_POST['reg_user'])) {
  // получаем все входные данные из формы
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

  // проверка формы: убедиться, что форма заполнена правильно...
  // путем добавления (array_push()) соответствующей ошибки в массив $errors
  if (empty($username)) { array_push($errors, "Введите логин"); }
  if (empty($password_1)) { array_push($errors, "Введите пароль"); }

// сначала проверяем базу данных, чтобы убедиться
  // пользователь с таким именем и/или адресом электронной почты еще не существует
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // если пользователь существует
    if ($user['username'] === $username) {
      array_push($errors, "Имя пользователя уже занято");
    }
  }

  // Наконец, регистрируем пользователя, если в форме нет ошибок
  if (count($errors) == 0) {
    //зашифровать пароль перед сохранением в базе данных
  	$password = $password_1;

  	$query = "INSERT INTO users (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Вы вошли в систему";
  	header('location: ../task/task.php');
  }
}
// ... 
// ВХОД ПОЛЬЗОВАТЕЛЯ
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Введите логин");
  }
  if (empty($password)) {
      array_push($errors, "Введите пароль");
  }

  if (count($errors) == 0) {
      $password = $password;
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Вы вошли в систему";
        header('location: ../task/task.php');
      }else {
          array_push($errors, "Неверная комбинация имени пользователя и пароля");
      }
  }
}

?>


