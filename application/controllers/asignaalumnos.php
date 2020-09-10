<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

require_once "AbstractController.php";

class asignaalumnos extends AbstractController{

public function __construct(){
	parent::__construct();
	$this->load->model('gruposalumnos');
	
	$this->load->model('grupos');
	$this->load->model('alumno');
	}


public function index(){
	
	$busqueda=$this->grupos->obtenerTodosRegistros();

	$datos = array('titulo' =>'Asignacion de Alumnos','busqueda'=>$busqueda,);

	$this->load->view('asignaalumnos/index',$datos);
}

public function agregar($grupo_id=false){
	$buscarAlumnos=$this->alumno->obtenerTodosRegistros();
	$this->grupos->cargar($grupo_id);

	// * $buscarga =$this->gruposalumnos->obtenerTodosRegistros();
	
	//$datos = $this->formularioAlumnos($this->arregloPost);

	$datos['titulo']="Asignar Alumnos";
	$datos['objAlumnos']=$buscarAlumnos;
	$datos['objGrupo']=$this->grupos;
 
	$this->load->view('asignaalumnos/agregar',$datos);
}

}