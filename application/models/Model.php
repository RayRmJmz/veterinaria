<?php

class Model extends CI_Model
{


	///////////////////////  M O D E L O S ** P A R A ** A D M I N I S T R A D O R E S ///////////////////////
	function getUser($usuario = ''){
		$query = $this->db->query("SELECT * FROM empleados WHERE usuario = '".$usuario."' AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			return $query->row();
		}else{
			return null;
		}

	}
}