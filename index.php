
<?php
	
	require_once 'config/db.php';		// подключение соединения к БД
	require_once 'config/route.php';	// подключаем маршрутизатор

	require_once 'controllers/Main_Controller.php';
	require_once 'models/Main_Model.php';
	require_once 'views/View.php';

	require_once 'Twig/Autoloader.php';

	Route::startRoute();

?>
