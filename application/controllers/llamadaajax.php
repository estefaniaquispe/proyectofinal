<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');


require_once "AbstractController.php";

class llamadaajax extends AbstractController{

public function __construct(){
	parent::__construct();
	
	$this->load->model('alumno');
	//dps
	$this->load->model('gruposalumnos');
	}

	public function subirFotoAlumno($id = False){
		//FotografiaAlumno
		$this->load->library('FotografiaAlumno');
		//$this->load->model('alumno');
		$idTemporal =(int)$id;
		$objFotografia = new FotografiaAlumno();
		$objFotografia->setAlumnoId($idTemporal);
		$objFotografia->setConfiguracion($this->configuraRecibir());
		$objFotografia->setNombreArchivo('image');
		$objFotografia->checkUpLoad();

		$nombreFotografia=$objFotografia->getFotografia();
		$this->alumno->cargar($idTemporal);
		$this->alumno->fotografia=$nombreFotografia;
		$this->alumno->grabar();
		$localizacion=base_url('/extras/imagenes/'.$nombreFotografia);
		echo json_encode(array('localizacion'=> $localizacion));
		exit;
	}

	public funtion registarAlumnoAGrupo(){
		if($this->is_post()){
			if(isset($this->arregloPost['selected']))
			{
				$this->gruposalumnos->poblarPropiedades(array('grupos_id'=>$this->arregloPost['grupos_id'],
					'alumnos_id'=>$this->arregloPost['selected']));
				$this->gruposalumnos->grabar();
			}
			if (isset($this->arregloPost['deselected'])) {
				//getAlumnoGrupo
				$busqueda=$this->gruposalumnos->getAlumnoGrupo($this->arregloPost['grupos_id'],$this->arregloPost['deselected']);
				//bsda temporal resultado
				$busquedaTemp=$busqueda->result_array();
				$objGrupoAlumno= $busquedaTemp[0];
				$this->gruposalumnos->cargar($objGrupoAlumno['id']);
				$this->gruposalumnos->borrar();
			}
			//  //hupo post           print_r($this->arregloPost);
		}
	}

	public function configuraRecibir(){
		$config['upload_path']='./extras/imagenes';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$config['max_width']='1024';
		$config['max_height']='768';

		return $config;
	}
}