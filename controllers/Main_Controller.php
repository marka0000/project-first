<?php

class Main_Controller {

	public $model;
	public $view;


	public function __construct() {
		$this->model = new Main_Model();
		$this->view = new View();
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem('./templates');
		$this->twig = new Twig_Environment($loader);
	}


	public function index() {
		$pageData = $this->model->outCityDB();
		echo $this->twig->render('main.html', ['Data' => $pageData]);
		exit;
	}


	/**
	 * Аякс метод добавления нового пользователя
	 *
	 * @author Кирилл Маркин
	 * @version 1.0, 15.05.2019 
	 *
	 */
	public function ajaxForm() {
		$name = (string) $_POST['name'];
		$age = (int) $_POST['age'];
		$city = (int) $_POST['city'];
		if (!empty($name) && !empty($age)) {
			$this->model->addUsersDB($name, $age, $city);
			$res = true;
			$result = json_encode($res);
			echo $result;
			exit;
		} else {
			echo json_encode(['result' => false]);
			exit;
		}
	}


	/**
	 * Аякс метод получения таблицы с данными
	 *
	 * @author Кирилл Маркин
	 * @version 1.0, 16.05.2019 
	 *
	 */
	public function ajaxOutTable() {
		$this->model->outTableDB();
	}

}