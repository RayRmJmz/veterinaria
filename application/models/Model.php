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

		$query = $this->db->query("SELECT  empleados.usuario,  empleados.id_empleado, empleados.nombre, empleados.apellido1, empleados.apellido2, empleados.celular, empleados.fecha_alta, empleados.id_puesto, puestos.puesto AS puesto, empleados.id_rol, roles.rol as rol, empleados.activo
				FROM empleados INNER JOIN puestos on empleados.id_puesto = puestos.id_puesto INNER JOIN roles ON empleados.id_rol = roles.id_rol 
				WHERE empleados.activo = 1
				AND (empleados.nombre LIKE '%{$buscar}%' OR empleados.apellido1 LIKE '%{$buscar}%' OR empleados.apellido2 LIKE '%{$buscar}%' OR puestos.puesto LIKE '%{$buscar}%')
				ORDER BY nombre ASC");

		foreach ($query->result() as $row){
		}

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive">
			<table class="table table-hover ">
              <thead>
                <tr style="text-transform:uppercase;">
                  <th scope="col">Usuario</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Rol</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Fecha ingreso</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody style="text-transform:uppercase;">';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_empleado."||".
            				$row->usuario."||".
            				$row->nombre."||".
                            $row->apellido1."||".
                            $row->apellido2."||".
                            $row->celular."||".
                            $row->fecha_alta."||".
                            $row->id_puesto."||".
                            $row->id_rol."'";;
            	$tabla.=' <tr>
            	<td>'.$row->usuario.'</td>
            	<td>'.$row->nombre.'</td>
            	<td>'.$row->apellido1.' '.$row->apellido2.'</td>
            	<td>'.$row->celular.'</td>
            	<td>'.$row->puesto.'</td>
            	<td>'.$row->rol.'</td>
            	<td>'.$row->fecha_alta.'</td>
            	<td> 
            		<a href="#" class="fas fa-2x fa-user-edit"  data-toggle="modal" data-target="#editarEmpleado" onclick="empleados('.$datos.')" title="EDITAR"></a>
            		
            		<a href="#" class="fas fa-2x fa-user-shield"  data-toggle="modal" data-target="#cambiarPass" onclick="updatePassword('.$datos.')" title="CAMBIAR CONTRASEÑA"></a>

            		<a href="#" class="fas fa-2x fa-user-times" style="color: red;"  data-toggle="modal" data-target="#bajaEmpleado" onclick="removeEmpleados('.$datos.')" title="DAR DE BAJA"></a>

            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';


		}else{
			$tabla="No se han encontrado resultados en la busqueda";			
		}


		return $tabla;
	}

	function insertEmpleado($datos){

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

	function updateEmpleado($datos){
		$query = $this->db->query(" UPDATE empleados 
									SET nombre = '".$datos['nombre']."',
										apellido1 = '".$datos['apellido1']."',
									    apellido2 = '".$datos['apellido2']."',
									    celular = '".$datos['celular']."',
									    id_puesto = '".$datos['puesto']."',
									    id_rol = '".$datos['rol']."'
									WHERE id_empleado = '".$datos['id_empleado']."'");

		return "OK";
	}

	function removeEmpleado($datos){

		$query = $this->db->query(" UPDATE empleados SET activo = 0 WHERE id_empleado = '".$datos['id_empleado']."'");

		return "OK";

	}

	function updatePassEmpleado($datos){

		$query = $this->db->query(" UPDATE empleados SET contrasena = '".$datos['password']."' WHERE id_empleado = '".$datos['id_empleado']."'");

		return "OK";

	}

	function verificaUsuario($verifica){

		$query = $this->db->query("SELECT * FROM empleados WHERE usuario = '".$verifica."' AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			echo "Usuario no disponible";
		}else{
			echo "Usuario disponible";
		}
	}

	function probar($datos){
		
	
		
	}


	
}