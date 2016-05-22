<?php
require_once '../../../connect.php';

	$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	if (!$link) {
    	die('<p style="color:red">'.mysqli_connect_errno().' - '.mysqli_connect_error().'</p>');
	}
		mysqli_query($link, "SET NAMES utf8");
		
	echo "<p>Успешное подключение!</p>";
header("Content-Type: text/html; charset=utf-8");
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $surname = $email = $phone = '';
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email =  $_POST["email"];
    $phone = $_POST["phone"];
	$_SESSION['nameR'] = $_POST["name"];
	$_SESSION['surnameR'] = $_POST["surname"];
	$_SESSION['emailR'] = $_POST["email"];
	$_SESSION['phoneR'] = $_POST["phone"];
	$_SESSION['error'] = '';
	$flag = true;
	if (!empty($_POST["name"]) || preg_match("[A-Za-zА-Яа-я]{2,20}", $_POST["name"]))
		{
			$name = substr($_POST["name"],2,20);
			$name = trim($_POST["name"]);
			$name = htmlspecialchars(stripslashes($name));
		}
	else
		{
			$flag = false;
			$_SESSION['error'] = 'Ошибка! Недопустимое значение в поле Имя';
		}
		if (!empty($_POST["surname"]) || preg_match("[A-Za-zА-Яа-я]{2,20}", $_POST["surname"]))
		{
			$surname = substr($_POST["surname"],2,20);
			$surname = trim($_POST["surname"]);
			$surname = htmlspecialchars(stripslashes($surname));
    	}
	else
		{
			$flag = false;
			$_SESSION['error'] = "Ошибка! Недопустимое значение в поле Фамилия";
		}
	if (!empty($_POST["email"]) || preg_match("[A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8}", $_POST["email"]))  
	 {
        $email = substr($_POST["email"],0,32);
		$email = htmlspecialchars(stripslashes($email)); 
     }
	else 
		{
			$flag = false;
			$_SESSION['error'] = 'Ошибка! Недопустимое значение в поле E-mail';
		}
		if(!empty($_POST["phone"]) || preg_match("\8\-[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}", $_POST["phone"]))
		{
			$phone = substr($_POST["phone"],2,30);
		}
		else
		{
			$flag = false; 
			$_SESSION['error'] = "Ошибка! Недопустимое значение в поле Телефон";
		}
	if($flag == true)
		{
			$stmt = $link->prepare("INSERT INTO tabl1 (name, surname, email, phone) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $name, $surname, $email, $phone);
			$stmt->execute();
		}
}
else {$_SESSION['error'] = 'Ошибка доступа';}
$back = $_SERVER['HTTP_REFERER'];
		echo "
		<html>
  		<head>
  		<meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
  		</head>
		</html>";
?>