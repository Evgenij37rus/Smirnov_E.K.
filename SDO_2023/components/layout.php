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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Подключение стилей-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="header">
    <h1><?= $page_title ?></h1>
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
<div>
    <?= $content ?>
</div>
</body>
</html>
