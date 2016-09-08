<?php
	Class Person { // объявляю класс Person
		
		// объявляем локальные переменные
		var $Name;
		var $Surname;
		var $Email;
		var $Phone;
		var $Con;
		
		// SELECT все записи из таблицы
		public function GetAll() { 
			$querry = $this->Con->query("SELECT * FROM tabl1"); // делает обычный запрос
			return $querry;
		}
		
		// SELECT записи из выбранной колонки
		public function GetColumnByName($my_column) { 
			$querry = $this->Con->prepare("SELECT ? FROM tabl1");
			$querry->bind_param("s", $my_column);
			$querry->execute(); // выполнить запрос, сюда можно добавить проверку result 
			$data = mysqli_fetch_row(mysqli_use_result($querry));
			$querry->close();
			return $data;
		}
		
		// SELECT записи из таблицы по указанному e-mail
		public function GetDataByEmail($my_email) { 
			$this->Email = $my_email;
			$querry = $this->Con->prepare("SELECT Name, Surname, Email, Phone FROM tabl1 WHERE Email=?");
			$querry->bind_param("s", $this->Email);
			$querry->execute(); // выполнить запрос 
			$querry->close();
			return $querry;
		}
		
		// UPDATE запись а таблице по указанному e-mail
		public function SetDataByEmail($my_email, $my_name, $my_surname, $my_phone) { 
			$this->Name = $my_name;
			$this->Email = $my_email;
			$this->Surname = $my_surname;
			$this->Phone = $my_phone;
			$querry = $this->Con->prepare("UPDATE tabl1 SET Name=?, Surname=?, Phone=? WHERE Email=?");
			$querry->bind_param("ssss", $this->Name, $this->Surname, $this->Phone, $this->Email);
			$querry->execute(); // выполнить запрос
			$querry->close();
		}
		
		// INSERT запись в таблицу
		public function Save($my_name, $my_email, $my_surname, $my_phone) { 
			echo "1234";
			
			$this->Name = $my_name;
			$this->Surname = $my_surname;
			$this->Email = $my_email;
			$this->Phone = $my_phone;
			$querry = $this->Con->prepare("INSERT INTO tabl1 (Name, Surname, Email, Phone) VALUES (?, ?, ?, ?)");
			$querry->bind_param("ssss", $my_name, $my_surname, $my_email, $my_phone); // "sssd" - это типы данных для каждого параметра по порядку4
			echo $querry->affected_rows;
			$querry->execute(); // выполнить запрос
			$querry->close();
		}
		
		// DELETE запись из таблицы по e-mail
		public function DeleteByEmail($my_email) { 
			$this->Email = $my_email;
			$querry = $this->Con->prepare("DELETE FROM tabl1 WHERE Email=?");
			$querry->bind_param("s", $this->Email);
			$querry->execute(); // выполнить запрос
			$querry->close();
		}
		
		// DELETE все записи из таблицы
		public function DeleteAll() { 
			$querry = $this->Con->query("DELETE FROM tabl1"); // выполняет обычный запрос
		}
		
		// создаем соединение с базой данных, с случае удачи возвращается пустая строка, 
		// в случае неудачи возвращается текст ошибки
		public function ConnectToDB() {
			$this->Con = new mysqli("localhost", "antonbez", "130996", "lab4");
			if (mysqli_connect_errno()) {
				$conErr = "Ошибка соединения с БД: " . mysqli_connect_error();
			}
			else {
				$conErr = "";
			}
			return $conErr;
		}
		
		// закрываем соединение с базой данных
		public function CutConnection() {
			$this->Con->close();
		}
		
		// преобразовать элементы класса в строку
		public function ToStringAll($rowsArray) { // принимает массив
			//$str = $this->Name . " " . $this->Email . " " . $this->Sex . " " . $this->Age . "\n";
			foreach($rowsArray as $row)
			{
				echo $row['Name'] , " " , $row['Surname'] , " " , $row['Email'] , " " , $row['Phone'];
			}
		}
		
		public function ToArray($quer) // принимает результат sql-запроса
		{
			//$result = $querry->fetch_array(MYSQLI_ASSOC); // выбирает одну строку из результата запроса и преобразует ее в массив 
			//(простой MYSQLI_NUM или ассоциативный MYSQLI_ASSOC в зависимости от выставленного параметра)
			//при задании MYSQLI_BOTH функция создаст один массив, включающий атрибуты обоих вариантов. 
			while($row = mysqli_fetch_array($quer, MYSQLI_BOTH))
			{
				$result[] = $row;
			}
			return $result; // возвращает массив
		}
		
		// возвращает код формы для работы с данным классом
		// формат JSON строки: {"Имя_объекта": его значение в виде массива[значения массива записываем через ,]}
		// значения в массиве могут быть: числовые(целые, дробные с точкой), "строковые",
		// логические (true, false), [другие массивы], {другие объекты}, нулевое значение (null)
			}
// $this является ссылкой на вызываемый объект, если ее не указывать то появится синтаксическая ошибка, так как 
// не понятно на какой именно объякт ссылаться
// декоратор
// поле - и его данные . Структура:
// {"name": [Имя ,text" , pattern="[А-Яа-я]{2,15}" placeholder="Введите ваше имя" ]} json
//  и походим по этому циклами собирая форму, проверяя валидацию, и т.д.
// execute - Возвращает TRUE в случае успешного завершения или FALSE в случае возникновения ошибки.
?>