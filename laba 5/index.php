<?php
include ('connect.php');
header("Content-Type: text/html; charset=utf-8"); 
session_start();
$_SESSION['test'] = $_SERVER['REMOTE_ADDR']; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<header>
		<h2 class="center text">Регистрация нового пользователя</h2>
		<p class="center">Введите данные в текстовые поля</p>
	</header>
<form action="script.php" method="post" action="index.php">
<div class="center brd">
	<div>
		<label class="center">Имя 
			<ul class="center"><input name="name" type="text" class="pole" id="name" value="<?php echo $_SESSION['nameR']; $_SESSION['nameR'] = '';?>" placeholder="name" pattern="[А-Яа-я]{2,20}" required/></ul>
		</label>
	</div>
	<div>
		<label class="center">Фамилия
			<ul class="center"><input name="surname" type="text" class="pole" id="surname" value="<?php echo $_SESSION['surnameR']; $_SESSION['surnameR'] = '';?>" placeholder="surname" pattern="[А-Яа-я]{2,50}" required/></ul>
		</label>
	<div>
		<label class="center">E-mail
			<ul class="center"><input name="email" type="text" class="pole" id="email" value="<?php echo $_SESSION['emailR']; $_SESSION['emailR'] = '';?>" placeholder="Email" pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})" required/></ul>
		</label>
	</div>

	<div>
		<label class="center">Телефон
			<ul class="center"><input name="phone" type="tel" class="pole" id="phone" value="<?php echo $_SESSION['phoneR']; $_SESSION['phoneR'] = '';?>" placeholder="phone" pattern="\8\-[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}" required/></ul>
		</label>
	</div>
<p><input type='submit' class="button center" value='Отправить'></p>
</div>
<br>
      <?php 
      echo $_SESSION['error'];
      $_SESSION['error'] = ''; 
      ?>
</form>
</body>
<footer>
    Лабораторная работа №3. Выполнила Тимофеева Марина
</footer>
</html>