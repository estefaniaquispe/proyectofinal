<!doctype html>
<html>
<head>
	<title><?php echo $titulo; ?></title>
	<meta charset="utf-8">
	<link  href="/extras/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link  href="/extras/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link  href="/extras/css/jquery.dataTables.min.css">

	<script type="text/javascript" src="/extras/DataTables/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/extras/js/jquery.dataTables.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">

				<?php echo form_open('maestroscontroller/crear',array('class'=>'form_horizontal','data-toggle' => 'validator')); ?>

				<?php echo form_hidden('id',$id); ?>
				
				<fieldset>
					<div id="legend">
						<legend class=""><?php echo $subtitulo; ?></legend>
					</div>
					<br>
					<?php echo form_error('nombre'); ?>
					<?php echo form_error('apellido'); ?>
					<br>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<div class="controls">
							<?php 
									echo form_input($nombre);
							 ?>
						</div>
						 <div class="help-block with-errors"></div>

					</div>
					<div class="form-group">
						<label for="apellido">Apellidos:</label>
						<div class="controls">
							<?php 
									
									echo form_input($apellido);
							 ?>
						</div>
						<div class="help-block with-errors"></div>

					</div>

					

					<div class="form-group">
						<label for="fecha">Fecha de Nacimiento:</label>
						<div class="controls">
							<?php 
			
									echo form_input($fecha);
							 ?>
						</div>
					</div>
						<div class="form-group">
							<button class="btn btn-success">Registrar</button>
						</div>

				</fieldset>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	
</body>
</html>