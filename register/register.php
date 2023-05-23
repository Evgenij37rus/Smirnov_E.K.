<?php include('../server/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Форма регистрации</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Форма регистрации</h2>
  </div>
	
  <form method="post" action="../register/register.php">
  	<?php include('../errors/errors.php'); ?>
  	<div class="input-group">
  	  <label>Логин</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	
  	<div class="input-group">
  	  <label>Пароль</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Зарегистрироваться</button>
  	</div>
  	<p>
  		Уже зарегистрирован? <a href="../login/login.php">Авторизоваться</a>
  	</p>
  </form>
</body>
</html>