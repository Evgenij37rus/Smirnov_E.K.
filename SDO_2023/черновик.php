---------------------------- server  ---------------------------------



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
  
  // если пользователь существует
  if ($user) { 
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





---------------------------- idex ---------------------------------



<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Вы должны сначала войти в систему";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Подключение Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Подключение стилей-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="header">
    <h1>Главная страница</h1>
</div>
<div class="content">
  	<!-- уведомление -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- информация о вошедшем в систему пользователе -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Добро пожаловать! <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Выйти</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>


---------------------------- login  ---------------------------------
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Форма авторизации</h2>
  </div>
	 
  <form method="post" action="login.php">
  <?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Логин</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Пароль</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Авторизоваться</button>
  	</div>
  	<p>
  		Еще не зарегистрирован? <a href="register.php">Зарегистрироваться</a>
  	</p>
  </form>
</body>
</html> 

---------------------------- register ---------------------------------
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Форма регистрации</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Форма регистрации</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Логин</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Пароль</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Подтвердите пароль</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Зарегистрироваться</button>
  	</div>
  	<p>
  		Уже зарегистрирован? <a href="login.php">Авторизоваться</a>
  	</p>
  </form>
</body>
</html>


---------------------------- task ---------------------------------
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


---------------------------- idex ---------------------------------


