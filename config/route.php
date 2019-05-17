<?php

	class Route {

		public static function startRoute(){

			$controllerName = 'Main_Controller';	// controller по умолчанию
			$modelName = 'Main_Model';				// model по умолчанию
			$actionName = 'index';					// action по умолчанию

			$route = explode('/', $_SERVER['REQUEST_URI']);		// разбиваем адрес



			if (!empty($route[1])) {
				$controllerName = $route[1];	// определяем controller
				$controllerName = ucfirst($route[1] . '_Controller');	// переводим первую букву контррллера в верх.регистр

				$modelName = $route[1];			// определяем model
				$modelName = ucfirst($route[1] . '_Model'); 			// переводим первую букву модели в верх.регистр
			}

			

			$controllerFile = $controllerName . '.php';		// файл с контроллером (определенного класса)
			require_once 'controllers/' . $controllerFile;
			$modelFile = $modelName . '.php';				// файл с моделью (определенного класса)
			require_once 'models/' . $modelFile;


			if (!empty($route[2])) {
				$actionName = $route[2];	// определяем action
			}

			$controller = new $controllerName();	// создаем объект класса $controllerName
			$controller -> $actionName();			// вызываем метод $actionName()



		}


	}