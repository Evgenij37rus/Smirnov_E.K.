<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пример обработки форм</title>
    <!-- Подключение Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Подключение стилей-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <?php
            if ($_COOKIE['user'] == ' '):
        ?>
        <div class="row">
           <div class="col">
                <h1>Форма регистрации</h1>
                    <form action ="registration.php" method ="post"> 
                        <label for="login">Введите логин</label>
                        <input type = "text" name="login" id = "login" class="form-control" placeholder="Введите логин"><br>

                        <label for="name">Введите имя</label>
                        <input type = "text" name="name" id = "name" class="form-control" placeholder="Введите имя"><br>

                        <label for="password">Введите пароль</label>
                        <input type = "password" name="password" id = "password" class="form-control" placeholder="Введите пароль"><br>
                        
                        <button class="btn btn-success" type="submit">Зарегистрировать</button><br>
                        <!-- <input type = "submit" value = "Зарегистрироваться!"> -->
                    </form>
           </div> 
           <div class="col">
                <h1>Форма авторизации</h1>
                    <form action ="authorization.php" method ="post"> 
                        <label for="login">Введите логин</label>
                        <input type = "text" name="login" id = "login" class="form-control" placeholder="Введите логин"><br>
                        
                        <label for="password">Введите пароль</label>
                        <input type = "password" name="password" id = "password" class="form-control" placeholder="Введите пароль"><br>
                        
                        <button class="btn btn-success" type="submit">Авторизоваться</button><br>
                        <!-- <input type = "submit" value = "Зарегистрироваться!"> -->
                    </form>
           </div> 
          
        </div>
        <?php else: ?>   
                <p>Привет <?=$_COOKIE['user'] ?>. Чтобы выйти, нажмите <a href="exit.php">Здесь</a>.</p>
           <?php endif; ?>
    </div>
</body>
</html>