<?php include('../server/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Форма авторизации</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Форма авторизации</h2>
  </div>
	 
  <form method="post" action="../login/login.php">
  <?php include('../errors/errors.php'); ?>
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
  		Еще не зарегистрирован? <a href="../register/register.php">Зарегистрироваться</a>
  	</p>
  </form>
</body>
</html> 