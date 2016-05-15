<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['test'] = $_SERVER['REMOTE_ADDR']
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<title></title>
</head>

<body>
<h1><p>Регистрация нового пользователя</p></h1>
<form method="POST" action="php/script.php">
<div class="main">
<div class="field">
	<label>Имя</label>
		<input type="text" name="name" placeholder="Имя" pattern="[A-Яа-я]{2,20}" required/>
</div>
<div class="field">
	<label>Фамилия</label>
		<input type="text" name="surname" placeholder="Фамилия" pattern="[А-Яа-я]{4,20}" required/>
</div>
<div class="field">
	<label>E-mail</label>
		<input type="email" name="email" placeholder="E-mail" required/>
</div>
<div class="field">
	<label>Телефон</label>
		<input type="tel" name="phone" placeholder="Телефон" pattern="\8\-[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}" required/>
</div>
<li><input type="submit" value="Отправить"/></li>
<?php 
echo $_SESSION['message'];
$_SESSION['message'] = ''; 
?>
</div>
</form>
</body>
<footer>
    Лабораторная работа №2. Выполнила Тимофеева Марина
</footer>
</html>