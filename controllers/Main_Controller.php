<?php

class Main_Controller {

	public $model;
	public $view;


	public function __construct() {
		$this->model = new Main_Model();
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem('./templates');
		$this->twig = new Twig_Environment($loader);
	}


	public function index() {
		$cityData = $this->model->outCityDB();
		$tableData = $this->model->outTableDB();
		echo $this->twig->render('main.html', ['City' => $cityData, 'Table' => $tableData]);
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
		if (!empty($name) && !empty($age) && !empty($city)) {
			$this->model->addUsersDB($name, $age, $city);
			$res = true;
			echo json_encode($res);
			exit;
		} else {
			echo json_encode(['result' => false]);
			exit;
		}
	}
}