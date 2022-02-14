<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clasess/Empleado.php';
	$model = new Empleado();
	$id = $_GET['id'];
	$empleados = $model->delete($id);
