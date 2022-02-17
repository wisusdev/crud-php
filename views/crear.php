<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. "/views/partials/header.php");
	require_once ($_SERVER['DOCUMENT_ROOT']. "/clasess/Empleado.php");
?>

<?php
	if (isset($_POST['submit'])) {
		$model = new Empleado();

		$empleado = array(
			"apellido" => $_POST['apellido'],
			"nombre" => $_POST['nombre'],
			"telefono" => $_POST['telefono'],
			"email" => $_POST['email'],
			"contratacion" => $_POST['contratacion'],
		);

		$response = $model->store($empleado);
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
							<input type="text" name="apellido" id="apellido" class="form-control" required>
						</div>

						<div class="form-group mb-3">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>

						<div class="form-group mb-3">
							<label for="telefono">Telefono</label>
							<input type="tel" name="telefono" id="telefono" placeholder="(XXX) XXX-XXXX" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}"  class="form-control" required>
						</div>

						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control" required>
						</div>

						<div class="form-group mb-3">
							<label for="contratacion">Contratacion</label>
							<input type="date" name="contratacion" id="contratacion" class="form-control" required>
						</div>

						<div class="form-group mb-3">
							<input type="submit" name="submit" class="btn btn-primary" value="Guardar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. "/views/partials/footer.php");
?>

