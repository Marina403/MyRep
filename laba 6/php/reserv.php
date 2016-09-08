<?php
include ('connect.php');
class Reserv
{
	private $Surname = '';
	private $Name = '';
	private $Phone = '';
	private $Clock = '';
	private $Number = '';
	
	function __construct($surname, $name, $phone, $time, $count)
	{
		if ($this->check_surname($surname) || $this->check_name($name) || $this->check_phone($phone) || $this->check_time($time) || $this->check_count($count))
			throw new Exception('Ошибка!!! Поля заполнены неверно');
		else
		{
			$this->Surname = $surname;
			$this->Name = $name;
			$this->Phone = $phone;
			$this->Clock = $time;
			$this->Number = $count;
		}
	}
	
	function save()
	{
		Connect::database()->insert("clients",
		array(
		"surname" => $this->Surname,
		"name" => $this->Name,
		"phone" => $this->Phone,
		"time" => $this->Clock,
		"count" => $this->Number,
		));
	}
	
	function check_surname($data)
	{
		return (!preg_match('/[A-ZА-Я][a-zа-я]{1,30}/',$data));
	}
	
	function check_name($data)
	{
		return (!preg_match('/[A-ZА-Я][a-zа-я]{1,30}/',$data) && strlen($data) > 0);
	}
	
	function check_phone($data)
	{
		return (!preg_match('/89[0-9]{9}/',$data));
	}
	
	function check_time($data)
	{
		return (!preg_match('/1[0-9]/',$data));
	}
	
	function check_count($data)
	{
		return (!preg_match('/[2-9]/',$data) && strlen($data) > 0);
	}
	
	static function allshow()
	{
		$datas = Connect::database()->select("clients",
		array(
		"surname",
		"name",
		"phone",
		"time",
		"count"
		));
		return $datas;
	}
	
	static function lastshow()
	{
		$data = Connect::database()->query("select max(Id) from clients")->fetchAll();
		$Id = $data[0]["max(Id)"];
		
		$datas = Connect::database()->select("clients",
		array(
		"surname",
		"name",
		"phone",
		"time",
		"count"
		),
		array(
		"Id"=>$Id
		));
		return $datas;
	}
	
	static function lastdelete()
	{
		$data = Connect::database()->query("select max(Id) from clients")->fetchAll();
		$Id = $data[0]["max(Id)"];
		
		$datas = Connect::database()->delete("clients",array("Id"=>$Id));
	}
	
public static function get_form($add, $allshow, $lastdelete)
    {
		require_once ('form.php');
		$form = get($add, $allshow, $lastdelete);
		return $form;
    }
}
?>