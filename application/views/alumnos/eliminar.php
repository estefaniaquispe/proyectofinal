<!doctype html>
<html>
<head>
	<title>Eliminar Alumnos</title>
	<meta charset="utf-8">
	<link href="/extras/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/extras/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="/extras/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="span10 ofset1">
			<div class="row">
				<h3>Eliminar Usuario</h3>
			</div>
			<form class="form-horizontal" action="" method="post">
				
				<input type="hidden" name="id" value="<?php echo $objAlumno->id; ?>">
				
				<p class="aler alert-error"> Estas seguro de eliminar a <?php echo $objAlumno->nombre ,' ', $objAlumno->apellido;?></p>

				<div class="form-action">
					<button type="submit" class="btn btn-danger">Sí</button>

					<a class="btn btn-succes" href="<?php echo base_url('alumnocontroller/index'); ?>">No</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>