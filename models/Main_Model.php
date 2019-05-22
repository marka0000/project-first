<?php

class Main_Model {

	public $dbConn;
	public $outCity;
	public $outTable;

	public function __construct() {
		$this->dbConn = new DB();
		$this->dbConn->connectDB();
	}


	/**
	 * Получение городов для выпадающего списка
	 *
	 * @author Кирилл Маркин
	 * @version 1.0, 15.05.2019 
	 *
	 * @param 
	 * @return array
	 */
	public function outCityDB() {
		$sql_out = mysqli_query($this->dbConn->connectDB(), "SELECT `id_city`,`city` FROM `cities`");
		$resultData = [];
		while ($result = mysqli_fetch_array($sql_out)) {
			$resultData[] = $result;
		}
		return $resultData;
	}


	/**
	 * Вывод таблицы с пользователями
	 *
	 * @author Кирилл Маркин
	 * @version 1.0, 15.05.2019 
	 *
	 * @param 
	 * @return array
	 */
	public function outTableDB() {
		$sql_table = mysqli_query($this->dbConn->connectDB(), "SELECT `name`,`age`,`city` FROM `users` INNER JOIN `cities` ON users.id_city = cities.id_city ORDER BY users.id");
		$resultData = [];
		while ($result = mysqli_fetch_array($sql_table)) {
			$resultData[] = $result;
		}
		return $resultData;
	}


	/**
	 * Добавление нового пользователя
	 *
	 * @author Кирилл Маркин
	 * @version 1.0, 15.05.2019 
	 *
	 * @param string $name - имя пользователя
	 * @param int $age - возраст
	 * @param int $city - идентификатор города
	 * @return void
	 */
	public function addUsersDB($name, $age, $city) {
		$sql_insert = mysqli_query($this->dbConn->connectDB(), "INSERT INTO `users` (`name`, `age`, `id_city`) VALUES ('{$name}', '{$age}', '{$city}')");	
		return $sql_insert;
	}
}