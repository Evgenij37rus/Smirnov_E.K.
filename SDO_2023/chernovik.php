<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пример обработки форм</title>
</head>
<body>
    <form action ="" method ="post">
        <div>
        <label for="login">Введите логин</label>
        <input type = "text" name="login" id = "login">
        </div>
        <div>
        <label for="password">Введите пароль</label>
        <input type = "password" name="password" id = "password">
        </div>
        <input type = "submit" value = "Зарегистрироваться!">
    </form>
    <?php
    session_start();
    //
        if (isset($_POST['login']) && isset($_POST['password']) )
        {
            
            $login = $_POST['login'];
            $password = $_POST['password'];
            if($login !="" && $password !="")
            {  
                $mysqli = new mysqli("localhost", "root", "", "SDO_2023");

                //Проверить, что нет такого логина в БД
                $result_login = $mysqli->query("SELECT * FROM users WHERE login = $login");
                $_SESSION['login'] = $login;
                if(!$result_login->fetch_assoc()){
                    $result_insert = $mysqli->query("INSERT INTO users(login, password) VALUES ('$login', '$password')");  
                }
               echo "Пользователь с таким логином уже существует!";
               
                
                //header("location:".$_SERVER['REQUEST_URI']);
                // $result = $mysqli->query("SELECT * from test");
                // while ($row = $result->fetch_assoc()){
                //     echo $row['test_text'];
                // }
            } 
            else {
                header("location:".$_SERVER['REQUEST_URI']);
            }
        }
        else {
            // $mysqli = new mysqli("localhost", "root", "", "SDO_2023");
            // $result = $mysqli->query("SELECT * from test");
            // while ($row = $result->fetch_assoc()){
            //     echo $row['test_text'];
            // }
        }
    ?>
</body>
</html>





<?php
    session_start();
    //
        if (isset($_POST['login']) && isset($_POST['password']) )
        {
            
            $login = $_POST['login'];
            $password = $_POST['password'];
            if($login !="" && $password !="")
            {  
                $mysqli = new mysqli("localhost", "root", "", "SDO_2023");

                //Проверить, что нет такого логина в БД
                $result_login = $mysqli->query("SELECT * FROM users WHERE login = $login");
                $_SESSION['login'] = $login;
                if(!$result_login->fetch_assoc()){
                    $result_insert = $mysqli->query("INSERT INTO users(login, password) VALUES ('$login', '$password')");  
                }
               echo "Пользователь с таким логином уже существует!";
               
                
                //header("location:".$_SERVER['REQUEST_URI']);
                // $result = $mysqli->query("SELECT * from test");
                // while ($row = $result->fetch_assoc()){
                //     echo $row['test_text'];
                // }
            } 
            else {
                header("location:".$_SERVER['REQUEST_URI']);
            }
        }
        else {
            // $mysqli = new mysqli("localhost", "root", "", "SDO_2023");
            // $result = $mysqli->query("SELECT * from test");
            // while ($row = $result->fetch_assoc()){
            //     echo $row['test_text'];
            // }
        }
?>





<?=
$title = "Главная страница";
$page_title = "Это главная страница!";
$content = 
"Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Quos nostrum facere sit vero, aspernatur veritatis temporibus, 
sapiente officiis tenetur, vitae rem eos dolorum ipsa quidem! 
Voluptatem minima sed amet fuga?";

include("components/layout.php")
?>
















__________________________________________________________________


<?php
$title = "PHP";
$page_title = "Это главная страница!";
$content = 
"Добро пожаловать на страницу регистрации и авторизации. Мы рады видеть вас среди наших пользователей.";

include("components/layout.php")
?>
<!DOCTYPE html>
<html lang="ru">
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
            if ($_COOKIE['user'] == ''):
        ?>
        <div class="row">
           <div class="col">
                <h1>Форма регистрации</h1>
                    <form action ="registration.php" method ="post"> 
                        <label for="login">Введите логин</label>
                        <input type = "text" name="login" id = "login" class="form-control" placeholder="Введите логин"><br>

                        <!-- <label for="name">Введите имя</label>
                        <input type = "text" name="name" id = "name" class="form-control" placeholder="Введите имя"><br> -->

                        <label for="password">Введите пароль</label>
                        <input type = "password" name="password" id = "password" class="form-control" placeholder="Введите пароль"><br>
                        
                        <button class="btn btn-success" type="submit">Зарегистрироваться</button><br>
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
           <?php else: ?>   
                <p>Привет <?=$_COOKIE['user'] ?>. Чтобы выйти, нажмите <a href="exit.php">Здесь</a>.</p>
           <?php endif; ?>
        </div>
        
    </div>
</body>
</html>


---------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------

<?php
$title = "PHP";
$page_title = "Это главная страница!";
$content =
"Добро пожаловать на страницу регистрации и авторизации.
Мы рады видеть вас среди наших пользователей.";

include("components/layout.php")
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Пример обработки форм</title>
<!--Подключение Bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<!-- Подключение стилей-->
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container mt-4">

<div class="row">
<div class="col">
<h1>Форма регистрации</h1>
<form action ="" method ="post">
<label for="">Введите логин</label>
<input type = "text" name="test" ><br>
<input type = "submit" value = "тестируем!"><br>

<!-- <button class="btn btn-success" type="submit">Зарегистрироваться</button><br> -->
<!-- <input type = "submit" value = "Зарегистрироваться!"> -->
</form>
<?php
session_start();
if (isset ($_POST ['test']))
{
$test = $_POST['test'];
echo $test;

$mysqli = new mysqli("localhost", "root", "", "SDO_2023");
$result = $mysqli->query["INSERT INTO `test` (`test_text`) VALUES ('$test')"];

}

?>
</div>
<!--<div class="col">
<h1>Форма авторизации</h1>
<form action ="authorization.php" method ="post">
<label for="login">Введите логин</label>
<input type = "text" name="login" id = "login" class="form-control" placeholder="Введите логин"><br>

<label for="password">Введите пароль</label>
<input type = "password" name="password" id = "password" class="form-control" placeholder="Введите пароль"><br>

<button class="btn btn-success" type="submit">Авторизоваться</button><br>
<input type = "submit" value = "Зарегистрироваться!">
</form>

</div> -->

</div>

</div>
</body>
</html>