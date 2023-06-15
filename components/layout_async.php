<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Вы должны сначала войти в систему";
  	header('location: login/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Подключение стилей-->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav >
  <ul class="nav">
        <li class = "nav-item">
            <a class="nav-link active" href ="http://localhost/SDO_2023/register/register.php">регистрация</a>
        </li>
        <li class = "nav-item">
            <a class="nav-link active" href ="http://localhost/SDO_2023/login/login.php">авторизация</a>
        </li>
    </ul>
</nav>
<div  style="width:600px; "class="header">
    <h1><?= $page_title ?></h1>
</div>
<div style="width:600px;" class="content">
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
    	<p style="text-align:center;">Добро пожаловать! <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p style="text-align:center;"> <a class="link-danger" href="../login/logout.php" style="color: red;">Выйти</a> </p>
        <p> 
    <table class="table table-success table-striped" >
      <thead>
          <tr>
          <th>N</th>
          <th>Список задач</th>
          </tr>
      </thead>
      <?php 
      // LOOP TILL END OF DATA
      while($rows=$result->fetch_assoc())
      { ?>
      <tbody  >
          <tr>
          <td><?php echo $rows['id'];?> </td>
          <td> <?php echo $rows['zadacha'];?></td>
          </tr>
      </tbody>
      <?php 
      }
      ?>
  </table>
    <?php endif ?> 
</p>
</div>
<div>
</div>
<div  style="width:600px; height: 190px; padding-top:5px; padding-left:10px; text-align:center;"  class="content">
    <form style="width:575px; height:125px;  " method="POST" action = '../task/add_task.php'>
            <div class="input-group">
                <label style="padding:0px; margin-top1:3px;" for="Title">Наименование задачи</label>
                <input type="text"  name="Zadacha" required> <br>
            </div>
    </form>
    <button style="margin-top:3px; text-align:center;"type="submit" class="btn" name="add_task" onclick="read"> Отправить в БД </button>
    <button style="margin-top:3px; text-align:center;"type="submit" class="btn" name="task" onclick="send"> Загрузить из БД </button>
</div>
<div class = "inner" id = "textFromServer"></div>
<!--<script> 
    async function read()
    {
        let response = await fetch("get_task.php");

        if (response.ok) { // если HTTP-статус в диапазоне 200-299
        // получаем тело ответа (см. про этот метод ниже)
        let answer = await response.json();
        console.log("Ответ" + answer);
        textFromServer.innerHTML = answer;
        } else {
        alert("Ошибка HTTP: " + response.status);
        }
    }
    async function send() 
    {
        let response = await fetch("task_async_content.php");

        if (response.ok) { // если HTTP-статус в диапазоне 200-299
        // получаем тело ответа (см. про этот метод ниже)
        let json = await response.json();
        } else {
        alert("Ошибка HTTP: " + response.status);
        }
    }         
</script>-->
<script src="../js/read.js"></script>
</body>
</html>
