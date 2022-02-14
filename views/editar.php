<?php require_once "partials/header.php"; ?>
<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clasess/Empleado.php';
	$model = new Empleado();
	$id = $_GET['id'];

	$empleado = $model->show($id);
	if (isset($_POST['submit'])) {
		$empleado = ["id" => $id, "apellido" => $_POST['apellido'], "nombre" => $_POST['nombre'], "telefono" => $_POST['telefono'], "email" => $_POST['email'], "contratacion" => $_POST['contratacion']];
		$response = $model->update($empleado);
	}
?>

<div class="container py-5">
	<div class="row">
		<?php if (isset($response)) { ?>
			<div class="col-md-12">
				<div class="alert alert-<?= $response['type'] ?>" role="alert">
					<?= $response['message'] ?>
				</div>
			</div>
		<?php } ?>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h3>Empleados</h3>
					<a class="btn btn-primary" href="../index.php">Regresar al inicio</a>
				</div>
				<div class="card-body">
					<form method="post">
						<div class="form-group mb-3">
							<label for="apellido">Apellido</label>
							<input type="text" name="apellido" id="apellido" value="<?= $empleado['apellido'] ?>" class="form-control">
						</div>

						<div class="form-group mb-3">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" value="<?= $empleado['nombre'] ?>" class="form-control">
						</div>

						<div class="form-group mb-3">
							<label for="telefono">Telefono</label>
							<input type="tel" name="telefono" id="telefono" value="<?= $empleado['telefono'] ?>" class="form-control">
						</div>

						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" value="<?= $empleado['email'] ?>" class="form-control">
						</div>

						<div class="form-group mb-3">
							<label for="contratacion">Contratacion</label>
							<input type="date" name="contratacion" id="contratacion" value="<?= $empleado['contratacion'] ?>" class="form-control">
						</div>

						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require "partials/footer.php"; ?>