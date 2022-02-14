<?php

require_once 'Database.php';

class Empleado{
	private $pdo;

	/*
	* Realizamos la conecciòn a la base de datos instanciando la clase y llamando a la funciòn encargada
	*/
	public function __CONSTRUCT()
	{
		try {
			$db = new Database();
			$this->pdo = $db->ConnectDB();
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	// Funcion encargada de servidor los datos y realizar busqueda en el index
	public function index($data = null){
		try {
			if ($data != null){
				$consultaSQL = "SELECT * FROM empleados WHERE apellido LIKE '%".$data."%' OR email LIKE '%".$data."%'";
			} else {
				$consultaSQL = "SELECT * FROM empleados";
			}

			$sentencia = $this->pdo->prepare($consultaSQL);
			$sentencia->execute();

			return $sentencia->fetchAll();
		} catch(Exception $e) {
			 return $response = ['type' => 'danger', 'message' => $e->getMessage()];
		}
	}

	// Funcion encargada de insertar datos en la base de datos
	public function store($data){
		try {
			$sqlInsert = "INSERT INTO empleados (apellido, nombre, telefono, email, contratacion) values (:" . implode(", :", array_keys($data)) . ")";
			$this->pdo->prepare($sqlInsert)->execute($data);

			return $response = ['type' => 'success', 'message' => 'El registro fue creado con exito'];
		} catch (Exception $e) {
			return $response = ['type' => 'danger', 'message' => $e->getMessage()];
		}
	}

	// Funcion encargada de obtener un registro
	public function show($id){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM empleados WHERE id = " . $id);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			return $response = ['type' => 'danger', 'message' => $e->getMessage()];
		}
	}

	// Funcnion encargada de actualizar registro
	public function update($data){
		try {
			$sql = "UPDATE empleados SET apellido = :apellido, nombre = :nombre, telefono = :telefono, email = :email, contratacion = :contratacion, updated_at = NOW() WHERE id = :id";
			$this->pdo->prepare($sql)->execute($data);

			return $response = ['type' => 'success', 'message' => 'El registro se actualizò con exito'];
		} catch (Exception $e) {
			return $response = ['type' => 'danger', 'message' => $e->getMessage()];
		}
	}

	// Funcion encargada de eliminar un registro
	public function delete($id){
		try {
			$stm = $this->pdo->prepare("DELETE FROM empleados WHERE id = ?");
			$stm->execute(array($id));

			header('Location: /index.php?');
		} catch (Exception $e) {
			return $response = ['type' => 'danger', 'message' => $e->getMessage()];
		}
	}

}