<?php

require_once ($_SERVER['DOCUMENT_ROOT']. "/config/config.php");

function runDB(){
	try {
		$config = dbConf();
		$sql = file_get_contents("data/migracion.sql");

		$connectionDB = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);
		$connectionDB->exec($sql);

		echo "La base de datos y la tabla se han creado con éxito.";
	} catch(PDOException $error) {
		echo $error->getMessage();
	}
}

runDB();