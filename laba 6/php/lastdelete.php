<?php
require_once ('reserv.php');
header("Content-Type: text/html; charset=utf-8"); 
session_start();
if ($_SESSION['test'] == md5($_SERVER['REMOTE_ADDR']))  
{
	Reserv::lastdelete();
	$_SESSION['message'] = 'Запись была успешно удалена';
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