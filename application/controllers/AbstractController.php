<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class AbstractController extends CI_Controller{
	
	protected $arregloPost;
	
	public function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
	}

	protected function is_post(){
		$temArray =$this->input->post();

		if(empty($temArray)){
			$this->arregloPost = array();
			return FALSE;
		}

		$this->arregloPost = $temArray;
		return TRUE;

	}
	
	protected function formularioAlumnos(array $datosPost){
				
		$arregloCamposFormulario = array(
			
			'nombre'=> array(
				'name'=>'nombre',
				'id'=>'nombre',
				'class' =>'form-control input-lg',
				'data-error' => 'Dato requerido',
				'value' => isset($datosPost['nombre']) ? $datosPost['nombre'] : null,
			
			),

			'apellido'=>array('name'=>'apellido',
				'id'=>'apellido',
				'class'=>'form-control input-lg',
				'data-error' => 'Dato requerido',
				'value'=> isset($datosPost['apellido']) ? $datosPost['apellido'] : null,
			),

			/**'fotografia'=>array('name'=>'fotografia',
				'id'=>'fotografia',
				'value'=>isset($datosPost['fotografia']) ? $datosPost['fotografia']:null,
			),**/

			'opcionesPais' => array('0' => 'Selecciona tu Pais',
						'Peru'=>"Peru",
						'Mexico'=>"Mexico",
						'Guatemala'=>"Guatemala",
						'Colombia'=>"Colombia",
						'Ecuador' =>"Ecuador",
						),

			'pais'=> isset($datosPost['pais']) ? $datosPost['pais'] : null,

			'id' => isset($datosPost['id']) ? $datosPost['id'] : 0,
			
			'fecha' => array('name' => 'fecha',
 			'id' => 'fecha',
 			'class' => 'form-control input-lg',
 			'value' => isset($datosPost['fecha']) ? $datosPost['fecha'] : null)
		
		);
		return $arregloCamposFormulario;
	}

}