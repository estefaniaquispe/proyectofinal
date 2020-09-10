<!doctype html>
<html>
	<head>
	<title><?php echo $titulo; ?></title>
	<meta charset="utf-8">
	<link  href="/extras/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link  href="/extras/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

	<link href="/extras/css/jquery.dataTables.css"  rel="stylesheet">
	<link  href="/estras/css/dataTables.bootstrap.min.css"  rel="stylesheet">

	<script src="/extras/js/jquery-1.11.3.js"></script>
	<script src="/extras/bootstrap/js/bootstrap.min.js"></script>
	<script src="/extras/js/jquery.dataTables.min.js"></script>
	<script src="/extras/js/jquery.form-validator.min.js"></script>

	<script>
		/*
		 * Example initialisation
		 */
		$(document).ready( function () {
		    $('#alumnos').dataTable( {
		       
		    } );
		} );
	</script>

	</head>
	<body style="background: lightblue">
		<div class="container">
			<div class="row">
		
		<h1><?php echo $titulo;?></h1>
			</div>
			<br>
				<a class="btn btn-success" href="<?php echo base_url("asignaalumnos/agregar") ?>">Crear Alumno</a>
			<br><br>	
				<table id="alumnos" class="display" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Codigo</th>
							<th>Numero de Alumnos</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Codigo</th>
							<th>Numero de Alumnos</th>
							<th>Acciones</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($busqueda->result() as $renglon): ?>
						<tr>      
							<td><?php echo $renglon->id; ?></td>	
							<td><?php echo $renglon->nombre; ?></td>
							<td><?php echo $renglon->clave; ?></td>
							<td>0</td>
							<td>
							<a class="btn btn-default" href="<?php echo base_url('asignaalumnos/agregar/'.$renglon->id ); ?>">Agregar Alumnos</a>
							</td>
							<?php  ?>
						</tr>
						<?php endforeach ?>
					</tbody>

	
				</table>
			
			
		</div>		
	
	</body>
</html>