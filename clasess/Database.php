<?php

require_once ($_SERVER['DOCUMENT_ROOT']. "/config/config.php");

class Database {
	public function ConnectDB()
	{
		try {
			$config = dbConf();
			$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
			return new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
		} catch(PDOException $error) {
			die($error->getMessage());
		}
    }
}