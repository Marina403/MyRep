<?php
function get($add, $show, $delete)
{
return ("<form action=\"".$add."\" method=\"post\">
	  Бронирование столиков
	  <p>Ваша фамилия*:<br>
	    <input type=\"text\" size=20 name=\"surname\" placeholder=\"Иванов\" pattern=\"[A-ZА-Я][a-zа-я]{1,30}\" required>
	  </p>
	  <p>Ваше имя:<br>
	    <input type=\"text\" name=\"name\" placeholder=\"Иван\" pattern=\"[A-ZА-Я][a-zа-я]{1,30}\">
	  </p>
	  <p>Ваш телефон*:<br>
	    <input type=\"tel\" name=\"phone\" placeholder=\"89191234567\" pattern=\"89[0-9]{9}\" required>
	  </p>
	  <p>Время брони*:<br>
	    <input type=\"number\" name=\"time\" placeholder=\"10-19\" min=\"10\" max=\"19\" pattern=\"1[0-9]\" required>
	  </p>
	  <p>Количество человек:<br>
		 <input type=\"number\" name=\"count\" placeholder=\"2-9\" min=\"2\" max=\"9\" pattern=\"[2-9]\">
	  </p>
	  <p>
	    <input type=\"submit\" name=\"submit\" value=\"Забронировать\">
	  </p>
	  </form>
	<form method=\"post\">
	<p>
	  <button formaction=\"".$show."\">Просмотреть все записи</button>
	</p>
	</form>
	<form method=\"post\">
	<p>
	  <button formaction=\"".$delete."\">Удалить последнюю запись</button>
	</p>
	</form>");
}
?>