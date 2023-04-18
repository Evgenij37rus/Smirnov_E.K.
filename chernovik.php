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