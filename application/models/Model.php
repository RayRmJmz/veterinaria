<?php

class Model extends CI_Model
{


	///////////////////////  OBTENER  USUARIOS Y VAlIDAR USUARIOS ///////////////////////
	function getUser($usuario = ''){
		$query = $this->db->query("SELECT * FROM empleados WHERE usuario = '".$usuario."' AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			return $query->row();
		}else{
			return null;
		}

	}

	function getRoles($usuario = ''){
		$query = $this->db->query("SELECT * FROM roles");

		if($query->num_rows()>0){
			return $query;
		}else{
			return null;
		}

	}

	function getPuestos($usuario = ''){
		$query = $this->db->query("SELECT * FROM puestos");

		if($query->num_rows()>0){
			return $query;
		}else{
			return null;
		}

	}


	///////////// EMPLEADOS //////////////////////////////////////////////////////////////

	function getEmpleados($buscar){
		$tabla ="";

		$query = $this->db->query("SELECT * FROM empleados");


		if($query->num_rows()>0){
			$tabla.='<table class="table table-hover ">
                          <thead>
                            <tr style="text-transform:uppercase;">
                              <td>Nombre</td>
                              <td>Apellidos</td>
                              <td>Telefono</td>
                              <td>Rol</td>
                              <td>Puesto</td>
                              <td>Fecha ingreso</td>
                              <td>Editar</td>
                            </tr>
                          </thead>
                          <tbody style="text-transform:uppercase;">';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_empleado."||".
            				$row->nombre."||".
                            $row->apellido1."||".
                            $row->apellido2."||".
                            $row->celular."||".
                            $row->fecha_alta."||".
                            $row->id_puesto."||".
                            $row->id_rol."'";;
            	$tabla.=' <tr>
            	<td>'.$row->nombre.'</td>
            	<td>'.$row->apellido1.' '.$row->apellido2.'</td>
            	<td>'.$row->celular.'</td>
            	<td>'.$row->id_rol.'</td>
            	<td>'.$row->id_puesto.'</td>
            	<td>'.$row->fecha_alta.'</td>
            	<td> 
            		<a href="#" class="fas fa-2x fa-user-edit"  data-toggle="modal" data-target="#editarEmpleado" onclick="empleados('.$datos.')" title="Editar"></a>
            		<a href="#" class="fas fa-2x fa-user-times" style="color: red;"  data-toggle="modal" data-target="#editarEmpleado" onclick="empleados('.$datos.')" title="Editar"></a>

            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>';
		}else{
			$tabla="No se han encontrado resultados en la busqueda";			
		}


		return $tabla;
	}


	
}