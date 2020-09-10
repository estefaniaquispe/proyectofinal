<?php 
require_once "gruposdao.php";

class Grupos extends GruposDao
{
	const DB_TABLA="grupos";
	const DB_TABLA_INDECE="id";

	public $id;
	public $nombre;
	public $clave;
	public $foto;
	public $max;
	public $min;
	
	public function poblarPropiedades(array $datos)
	{
		$this->id = isset($datos['id']) ? trim($datos['id']):0;
 		$this->nombre = isset($datos['nombre']) ? trim($datos['nombre']) : null;
 		$this->clave = isset($datos['clave']) ? trim($datos['clave']) : null;
 		$this->foto = isset($datos['foto']) ? trim($datos['foto']) : null;
 		$this->max = isset($datos['max']) ? trim($datos['max']) : null;
 		$this->min = isset($datos['min']) ? trim($datos['min']) : null;

 	}
 	
 	public function getArregloPropiedades(){
		$arregloTemporal = array();
						foreach ($this as $indice => $valor) {
							$arregloTemporal[$indice] = $valor;
						}
		return $arregloTemporal;
	}
}