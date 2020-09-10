<?php 
/**
  * 
  */
 class FotografiaAlumno
 {
 	private $instanciaCI;
 	private $errores;

 	private $almacenarInfo;
 	public function __construct()
 	{

 	$this->instanciaCI = &get_instance();
 	$this->instanciaCI->load->model('alumno');
 	$this->errores=array();
 	}

 	public function setAlumnoId($id){
 		$this->almacenarInfo['alumnoId'] = $id;


 	}
 	public function setConfiguracion(array $conf){
 		$this->almacenarInfo['configuracion'] = $conf;
 	}

 	public function setNombreArchivo($nombre){
 		$this->almacenarInfo['nombreArchivo']=$nombre;
 	}

 	/**
 	 * validacion
 	 */
 	private function checarDatos(){
 		$this->instanciaCI->load->library('upload', $this->almacenarInfo['configuracion']);
 		
 		if(!$this->$instanciaCI->upload->do_upload($this->almacenarInfo['nombreArchivo'])){
 			$this->errores=array('error'=>$this->instanciaCI->upload->display_error());
 			return FALSE;
 		}else{
 			$this->almacenarInfo['datosArchivoRecibido']=$this->instanciaCI->upload->data();
 		}
 	}
 	public function checkUpload(){
 		$this->checarDatos();
 	}
 	public function getErrores(){
 		$this->errores;
 	}
 	public function getFotografia(){
 		return $this->almacenarInfo['datosArchivoRecibido']['file_name'];  
 	}
 	
 } 