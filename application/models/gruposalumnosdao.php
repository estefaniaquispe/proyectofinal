<?php 	

require_once "modelobasicocrud.php";
class GruposAlumnosDao extends ModeloBasicoCRUD
{
	
	public function obtenerTodosRegistros(){
	$this->db->select('*');
	$this->db->from($this::DB_TABLA);
	$busqueda = $this->db->get();
	return $busqueda;
}
//7/8
public function getAlumnoGrupo($grupo_id,$alumno_id){
	$this->db->select('*');
	$this->db->from($this::DB_TABLA);
	$this->db->where('grupos_id',$grupo_id);
	$this->db->where('alumnos_id',$alumno_id);
	$query = $this->db->get();
	return $query;
}

}




