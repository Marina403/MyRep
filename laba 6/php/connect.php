<?php
require 'config.php';
require 'medoo.php';
class Connect
{
	static function database()
	{
		return new medoo(array(
		'database_type' => 'mysql',
		'database_name' => DB_DATABASE,
		'server' => DB_HOST,
		'username' => DB_USER,
		'password' => DB_PASSWORD
		));
	}
}
?>