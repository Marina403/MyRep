<?php
require_once ('reserv.php');
session_start();
$datas = Reserv::lastshow();
foreach ($datas as $data)
{
	echo "Фамилия, Имя: ".$data["surname"].", ".$data["name"]."<br>Номер телефона: ".$data["phone"]."<br>Время записи: ".$data["time"].".00 часов<br>Количество человек: ".$data["count"]."<br><br>";
}
?>