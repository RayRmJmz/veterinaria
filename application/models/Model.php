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

		$query = $this->db->query("SELECT empleados.id_empleado, empleados.nombre, empleados.apellido1, empleados.apellido2, empleados.celular, empleados.fecha_alta, empleados.id_puesto, puestos.puesto AS puesto, empleados.id_rol, roles.rol as rol, empleados.activo
			FROM empleados INNER JOIN puestos on empleados.id_puesto = puestos.id_puesto INNER JOIN roles ON empleados.id_rol = roles.id_rol 
			WHERE empleados.activo = '1'
			ORDER BY nombre ASC");
		
		if(isset($buscar)){
			$query = $this->db->query("SELECT empleados.id_empleado, empleados.nombre, empleados.apellido1, empleados.apellido2, empleados.celular, empleados.fecha_alta, empleados.id_puesto, puestos.puesto AS puesto, empleados.id_rol, roles.rol as rol, empleados.activo
				FROM empleados INNER JOIN puestos on empleados.id_puesto = puestos.id_puesto INNER JOIN roles ON empleados.id_rol = roles.id_rol 
				WHERE empleados.nombre LIKE '%{$buscar}%' OR empleados.apellido1 LIKE '%{$buscar}%' OR empleados.apellido2 LIKE '%{$buscar}%' OR puestos.puesto LIKE '%{$buscar}%' AND empleados.activo = 1
				ORDER BY nombre ASC");
		}

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
            	<td>'.$row->puesto.'</td>
            	<td>'.$row->rol.'</td>
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

	function addEmpleado($datos){

		$query = $this->db->query("SELECT * FROM empleados WHERE usuario = '".$datos['newEmpleado']."' AND activo = 1 LIMIT 1");
		if($query->num_rows()>0){
			echo "<script type=\"text/javascript\">alert(\"Usuario ya exsite, No se puede dar de alta\");</script>";
			return FALSE;
		}else{
			$query = $this->db->query("INSERT INTO empleados ( usuario , contrasena, nombre, apellido1, apellido2, celular, fecha_alta, id_puesto, id_rol)
				VALUES (
					'".$datos['newEmpleado']."',
					'".$datos['newPass']."',
					'".$datos['newName']."',
					'".$datos['newApellido1']."',
					'".$datos['newApellido2']."',
					'".$datos['newCell']."',
					'".$datos['newDate']."',
					'".$datos['newPuesto']."',
					'".$datos['newRol']."'
				)"
			);

			echo "<script type=\"text/javascript\">alert(\"Empleado dado de alta satisfactoriamente\");</script>";
			return TRUE;
		}

		


	}

	function verificaUsuario($verifica){

		$query = $this->db->query("SELECT * FROM empleados WHERE usuario = '".$verifica."' AND activo = 1 LIMIT 1");
		if($query->num_rows()>0){
			echo "Usuario no disponible";
		}else{
			echo "Usuario disponible";
		}
	}


	
}