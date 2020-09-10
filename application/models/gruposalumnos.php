<?php 	
require_once "gruposalumnosdao.php";
/**
 * 	
 */
class GruposAlumnos extends GruposAlumnosDao
{
	const DB_TABLA="grupos_alumnos";
	const DB_TABLA_INDECE="id";

	public $id;
	public $grupos_id;
	public $alumnos_id;
	public $creado_en;

	public function poblarPropiedades(array $datos)
	{
		$this->id = isset($datos['id']) ? trim($datos['id']):0;
 		$this->grupos_id = isset($datos['grupos_id']) ? trim($datos['grupos_id']) : null;
 		$this->alumnos_id = isset($datos['alumnos_id']) ? trim($datos['alumnos_id']) : null;

 		$this->creado_en = isset($datos['creado_en']) ? trim($datos['creado_en']) : date('Y-m-d G:l:s');
 	}
 	
 	public function getArregloPropiedades(){
		$arregloTemporal = array();
						foreach ($this as $indice => $valor) {
							$arregloTemporal[$indice] = $valor;
						}
		return $arregloTemporal;
	}
}
 