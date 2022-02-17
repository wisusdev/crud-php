<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. "/views/partials/header.php");
	require_once ($_SERVER['DOCUMENT_ROOT']. "/clasess/Empleado.php");
?>

<?php
	$model = new Empleado();

	if (isset($_POST['searchBTN'])) {
		$empleados = $model->index($_POST['search']);
	} else {
		$empleados = $model->index();
	}

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$response = $model->delete($id);
	}
?>

<div class="container py-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<form method="post" class="d-flex justify-content-between m-0">
						<input type="text" id="search" name="search" placeholder="Buscar empleado" class="form-control mx-2">
						<button type="submit" name="searchBTN" class="btn btn-primary">Buscar</button>
					</form>
					<a href="views/crear.php" class="btn btn-primary">Nuevo Empleado</a>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
						<tr>
							<th>#</th>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Telefono</th>
							<th>Contratacion</th>
							<th>Email</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($empleados as $fila) { ?>
							<tr>
								<td><?php echo $fila["id"]; ?></td>
								<td><?php echo $fila["apellido"]; ?></td>
								<td><?php echo $fila["nombre"]; ?></td>
								<td><?php echo $fila["telefono"]; ?></td>
								<td><?php echo date("m/d/Y",strtotime($fila["contratacion"])); ?></td>
								<td><?php echo $fila["email"]; ?></td>
								<td>
									<form method="post" class="mb-0">
										<input type="hidden" name="id" value="<?= $fila["id"] ?>">
										<input type="submit" name="submit"  value="Eliminar" class="btn btn-danger">

										<a href="<?= 'views/editar.php?id=' . $fila["id"] ?>" class="btn btn-primary">Editar</a>
									</form>
								</td>
							</tr>
						<?php }
						?>
						<tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. "/views/partials/footer.php");
?>
