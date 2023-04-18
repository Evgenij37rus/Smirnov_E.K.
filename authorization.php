<?php
   
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    
    $password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);
    //Подключение к БД. (Используется класс mysali - улычшенный класс mysql, который принимает 4 параметра: 1 -хост, 2 - имя пользователя, 3 - пароль, 4 - имя БД)
    $mysql = new mysqli ('localhost', 'root', '', 'SDO_2023');

    //Подключаем наш хеш, который был создан при регистрации и в дальнейшем будем сверять наши пароли.
    //$password = md5($password."12343asdikjn21");
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND
     `password` = '$password'");
     //Выбираем все данные, но как массив
     $user = $result->fetch_assoc();
     if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
     }
     //Функция print_r - служит чисто для разработки, которая позволяет вывести какой то массив, объект или что угодно на экран

     // print_r($user);
     //exit();

     /* Авторизация будет происходить при помощи установки Cookie. В значение Cookie я буду устанавливать логин пользователя. 
     Соответственно я буду брать элемент массива по ключу login.
     */
    setcookie('user', $user['login'], time() + 3600, "/");
    
    $mysql-> close();
   
    header('location: index.php');

?>
