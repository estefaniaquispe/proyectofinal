<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');
require_once "AbstractController.php";

class alumnocontroller extends AbstractController{

public function __construct(){
	parent::__construct();
	
	$this->load->model('alumno');
	}
/**
 * Lista de Alumnos
 * @return [type] [description]
 */

public function index()
{
	
	$busqueda=$this->alumno->obtenerTodosRegistros();

	$datos = array('titulo' =>'Listado de Usuarios','busquedaAlumno'=>$busqueda,);
	//$busqueda->this->alumno('index');
	$this->load->view('alumnos/index',$datos);
  	//$this->load->view('alumnos/crear');
}

/**
 * Registro de usuario
 */
public function crear(){
	
	if ($this->is_post()) {
		
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		$this->form_validation->set_rules('nombre','Nombre','trim|callback_name_check');
		$this->form_validation->set_rules('apellido','Apellidos','trim|callback_apellido_check');
		$this->form_validation->set_rules('fecha','Fecha Nacimiento','trim|callback_fecha_check');

	/**
	 * cuando las validaciones se cumplan
	 */
		if ($this->form_validation->run() == TRUE) {
			
			
			$this->alumno->poblarPropiedades($this->arregloPost);

			$this->alumno->grabar();
			redirect('alumnocontroller/index');
		}
	}
/**llena*/
	$datos = $this->formularioAlumnos($this->arregloPost);

	$datos['titulo']="Crear Alumno";
	$datos['subtitulo']="Registrar Alumno";
 
	$this->load->view('alumnos/crear',$datos);
}
/**
 * editar alumno
 */
public function editar($id=null){
	
	$this->alumno->cargar($id);
	
	$datos = $this->formularioAlumnos($this->alumno->getArregloPropiedades());
	
	$datos['titulo'] = "Editar Alumno";
	$datos['subtitulo']="Editar Alumno";

	$this->load->view('alumnos/crear', $datos);

}

public function mostrar($id=null){
	$this->alumno->cargar($id);

	$datos['objAlumno'] = $this ->alumno;
	$this->load->view('alumnos/mostrar',$datos);
}
/**
 * eliminar alumno
 */
public function eliminar($id=null){
	$this->alumno->cargar($id);

	if($this->is_post()){
		$this->alumno->cargar($this->arregloPost['id']);
		$this->alumno->borrar();
		redirect('alumnocontroller/index');
	}

	$datos['objAlumno'] = $this->alumno;

	$this->load->view('alumnos/eliminar', $datos);
}

public function name_check($datosPost){
	if(empty($datosPost)){
		$this->form_validation->set_message("name_check","El nombre es requerido",'nombre');
		return FALSE;
	}
	return TRUE;
}

public function apellido_check($datosPost){
	if(empty($datosPost)){
		$this->form_validation->set_message("apellido_check","Los apellidos son requeridos",'apellido');
		return FALSE;
	}
	return TRUE;
}
}