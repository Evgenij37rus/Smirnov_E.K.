<?php
	setcookie('user', $user['login'], time() - 3600, "/");
	header('location: index.php');
?>
