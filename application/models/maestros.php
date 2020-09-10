<?php 
require_once "maestrosdao.php";

class Maestros extends MaestrosDao
{
	
	const DB_TABLA = "maestros";
 	const DB_TABLA_INDICE = "id";

 	public $id;
 	public $nombre;
 	public $apellido;
 	public $fecha;
 	//public $fotografia;


 	public function poblarPropiedades(array $datos)
 	{
 		$id=0;
 		
		$this->$id = isset($datos['id']) ? trim($datos['id']) : 0;

 		$this->nombre = isset($datos['nombre']) ? trim($datos['nombre']) : null;

 		$this->apellido = isset($datos['apellido']) ? trim($datos['apellido']) : null;

 		$this->fecha = isset($datos['fecha']) ? trim($datos['fecha']) : null;

 		//recien
 		//$this->fotografia=isset($datos['fotografia'])? trim($datos['fotografia']):null;
 		
 	}
}
 ?>