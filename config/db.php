<?php

	class DB {

		public function connectDB() {

			$localhost = 'localhost';
			$username = 'root';
			$password = '';
			$database = 'loc_project';

			$link = mysqli_connect($localhost, $username, $password, $database);
			return $link;
		}

	}