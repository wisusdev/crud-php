<?php

function dbConf(){
	return [
		'db' => [
			'host' => 'localhost',
			'user' => 'root',
			'pass' => '',
			'name' => 'pTecnica',
			'options' => [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			],
		],
	];
}
