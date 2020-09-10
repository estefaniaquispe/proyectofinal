<!doctype html>
<html>
<head>
	<title><?php echo $titulo; ?></title>
	<meta charset="utf-8">
	<link  href="/extras/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link  href="/extras/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link  href="/extras/chosen/docsupport/style.css" rel="stylesheet">
	<link  href="/extras/chosen/docsupport/prism.css" rel="stylesheet">
	
	<style>
		.chosen-rtl .chosen-drop(left:-9000px;)
		.chosen-container{
			width: 500px !important;
		}
	</style>

</head>

<body>

	<?php echo form_open('',array('class'=>'form-horizontal','id'=>'asignaalumno','nombre'=>'asignaalumno')); ?>
	<div class="container">
		<div class="container">
			<header>
				<h1>Asigna Alumnos<strong><?php echo $objGrupo->nombre; ?></strong></h1>
			</header>

			<input type="hidden" name="grupo_id" id="grupo_id" value="<?php echo $objGrupo->id; ?>">

			<p>Selecciona de la lista los Alumnos Requeridos</p>
			
			<h2><a name="multiple-select" class="anchor" href="#multiple-select">Nombre de Alumno</a></h2>
			<select id="alumnos" class="chosen-select my_select_box" tabindex="-1" style="width:350px" multiple="" data-placeholder="Seleccione un alumno">
				
				<?php 
				foreach ($objAlumnos->result() as $row);
				 ?>
				 <option 
				 value="<?php echo $row->id; ?>" >
				 <?php echo $row->nombre." ".$row->apellido; ?> 		
				 </option>
				 
				<?php endforeach; ?>
			</select>
		</div>


			<br><hr><br>
			<a href="<?php echo base_url('asignaalumnos/index'); ?>">Regresar</a>
			
			<?php echo form_close();?>
	</div>
	<script src="/extras/js/jquery-1.11.3.min.js"></script>
	<script src="/extras/chosen/chosen.jquery.js"></script>
	<script src="/extras/chosen/docsupport/prism.js"></script>
	<script src="/extras/js/jquery.form.min.js"></script>
	<script type="text/javascript">
		var config = {
		'.chosen-select'            :{},
		'.chosen-deselect'			:{allow_single_deselect:true},
		'.chosen-select-no-single'	:{disable_search_threshold:10},
		'.chosen-select-no-result'	:{no_result_text:'No encontramos nada'},
		'.chosen-select-width'		:{width:'95%'},
		}
		for(var selector in config){
			$(selector).chosen(config[selector]);
		}
	</script>
	
	<script>
		//ajax
		$('.chosen-select').change(function(e,info){
			
			var grupo_id = $('#grupo_id').val();
			var select = $('#alumnos').val();
			$('#asignaalumno').ajaxSubmit({
				url:'/llamadaajax/registarAlumnoAGrupo',
				data: info,
				type: 'post',
				dataType='json',
				success: function(respuesta){
					console.log('cambio en chosen');
				}
			});

		});
	</script>
</body>
</html>