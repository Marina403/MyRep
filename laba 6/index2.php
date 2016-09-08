<?php 
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['test'] = md5($_SERVER['REMOTE_ADDR']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
      <title>Кафе "Старая мельница"</title>
	  <link rel="stylesheet" href="style2.css" media="all">
</head>

<body>
<header>
  <section class="header">
    <a href="#" title="Кафе 'Старая мельница'">
      <img src="image/header.jpg" alt="Кафе 'Старая мельница'">
	</a>
    <p>Кафе "Старая мельница"</p>
  </section>
  <aside>
    <p>ул. Пермская, 98</p>
	<p>тел.: (342) 216-64-16</p>
  </aside>
</header>

<section class="menu">
  <ul>
    <li><a href="#1" title="О кафе 'Старая мельница'">Информация о кафе</a></li>
	<li><a href="#2" title="Меню кафе 'Старая мельница'">Меню</a></li>
	<li><a href="#3" title="Расположение">Расположение</a></li>
	<li><a href="#4" title="Бронирование столов и залов">Бронирование</a></li>
	<li><a href="#5" title="Часы работы">Часы работы</a></li>
	<li><a href="#6" title="Контактные данные">Контакты</a></li>
  </ul>
</section>

<section class="inform">
	<figure>
	  <?php
		require 'php/reserv.php';
		echo Reserv::get_form('php/add.php','php/allshow.php','php/lastdelete.php');
		?>
	</figure>
	<?php
		echo $_SESSION['message'];
		$_SESSION['message'] = '';
		?>
</section>
</body>
</html>