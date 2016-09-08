<?php
require_once ('reserv.php');
header("Content-Type: text/html; charset=utf-8"); 
session_start();
if ($_SESSION['test'] == md5($_SERVER['REMOTE_ADDR']))  
{
	try
	{
		$reserv = new Reserv($_POST['surname'],$_POST['name'],$_POST['phone'],$_POST['time'],$_POST['count']);
		$reserv->save();
		$_SESSION['message'] = 'Добавление выполнено успешно';
	}
	catch (Exception $e)
	{
		$_SESSION['message'] = $e->getMessage();
	}
}
else {$_SESSION['message'] = 'Извините, нет доступа';}
$back = $_SERVER['HTTP_REFERER']; 
echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
  </head>
</html>";
?>