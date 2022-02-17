<?php

function dbConf(){
	return [
		'db' => [
			'host' => 'localhost',
			'user' => 'admin',
			'pass' => '0mEg4a9012_',
			'name' => 'pTecnica',
			'options' => [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			],
		],
	];
}
