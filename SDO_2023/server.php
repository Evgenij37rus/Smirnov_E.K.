<?php
session_start();

// инициализация переменных
$username = "";
$email    = "";
$errors = array(); 

// подключаемся к базе
$db = mysqli_connect('localhost', 'root', '', 'SDO_2023');


// РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЯ
if (isset($_POST['reg_user'])) {
  // получаем все входные данные из формы
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // проверка формы: убедиться, что форма заполнена правильно...
  // путем добавления (array_push()) соответствующей ошибки в массив $errors
  if (empty($username)) { array_push($errors, "Введите логин"); }
  if (empty($email)) { array_push($errors, "Электронная почта обязательна"); }
  if (empty($password_1)) { array_push($errors, "Введите пароль"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Два пароля не совпадают");
  }

// сначала проверяем базу данных, чтобы убедиться
  // пользователь с таким именем и/или адресом электронной почты еще не существует
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // если пользователь существует
    if ($user['username'] === $username) {
      array_push($errors, "Имя пользователя уже занято");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email уже существует");
    }
  }

  // Наконец, регистрируем пользователя, если в форме нет ошибок
  if (count($errors) == 0) {
  	$password = md5($password_1);//зашифровать пароль перед сохранением в базе данных

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Вы вошли в систему";
  	header('location: index.php');
  }
}

// ... 


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
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Вы вошли в систему";
          header('location: index.php');
        }else {
            array_push($errors, "Неверная комбинация имени пользователя и пароля");
        }
    }
  }
  
  ?>