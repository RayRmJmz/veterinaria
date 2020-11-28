
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
			<div class="table-responsive style="display: block;">
			<table id="tabla-empleados" class="table table-hover tabla">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Usuario</th>
                  <th class="titles-thead" scope="col">Nombre</th>
                  <th class="titles-thead" scope="col">Apellidos</th>
                  <th class="titles-thead" scope="col">Teléfono</th>
                  <th class="titles-thead" scope="col">Puesto</th>
                  <th class="titles-thead" scope="col">Rol</th>
                  <th class="titles-thead" scope="col">Fecha Ingreso</th>
                  <th class="titles-thead" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody">';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_empleado."||".
            				$row->usuario."||".
            				$row->nombre."||".
                            $row->apellido1."||".
                            $row->apellido2."||".
                            $row->celular."||".
                            $row->fecha_alta."||".
                            $row->id_puesto."||".
                            $row->id_rol."'";
            	$tabla.=' <tr class="first-column">
            	<td>'.$row->usuario.'</td>
            	<td>'.$row->nombre.'</td>
            	<td>'.$row->apellido1.' '.$row->apellido2.'</td>
            	<td>'.$row->celular.'</td>
            	<td>'.$row->puesto.'</td>
            	<td>'.$row->rol.'</td>
            	<td>'.$row->fecha_alta.'</td>
              <td class="action-buttons">

              <a href="#" data-toggle="modal" data-target="#cambiarPass" onclick="updatePassword('.$datos.')" title="Cambiar contraseña">
                <svg class="icon-action" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" height="32px"><g id="Change_password"><path d="M464.4326,147.54a9.8985,9.8985,0,0,0-17.56,9.1406,214.2638,214.2638,0,0,1-38.7686,251.42c-83.8564,83.8476-220.3154,83.874-304.207-.0088a9.8957,9.8957,0,0,0-16.8926,7.0049v56.9a9.8965,9.8965,0,0,0,19.793,0v-34.55A234.9509,234.9509,0,0,0,464.4326,147.54Z"/><path d="M103.8965,103.9022c83.8828-83.874,220.3418-83.8652,304.207-.0088a9.8906,9.8906,0,0,0,16.8926-6.9961v-56.9a9.8965,9.8965,0,0,0-19.793,0v34.55C313.0234-1.3556,176.0547,3.7509,89.9043,89.9012A233.9561,233.9561,0,0,0,47.5674,364.454a9.8985,9.8985,0,0,0,17.56-9.1406A214.2485,214.2485,0,0,1,103.8965,103.9022Z"/><path d="M126.4009,254.5555v109.44a27.08,27.08,0,0,0,27,27H358.5991a27.077,27.077,0,0,0,27-27v-109.44a27.0777,27.0777,0,0,0-27-27H153.4009A27.0805,27.0805,0,0,0,126.4009,254.5555ZM328,288.13a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,328,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,256,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,184,288.13Z"/><path d="M343.6533,207.756V171.7538a87.6533,87.6533,0,0,0-175.3066,0V207.756H188.14V171.7538a67.86,67.86,0,0,1,135.7208,0V207.756Z"/></g></svg>
              </a>

              &nbsp;&nbsp;

                <a href="#" data-toggle="modal" data-target="#editarEmpleado" onclick="empleados('.$datos.')" title="Editar empleado">
                  <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
                  <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/></svg>
                </a>

            		&nbsp;&nbsp;

                <a href="#" data-toggle="modal" data-target="#bajaEmpleado" onclick="removeEmpleados('.$datos.')" title="Dar de baja empleado">
                  <svg height="35" class="icon-action" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/><path d="M0 0h48v48H0z" fill="none"/></svg>
                </a>

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

		$query = $this->db->query("SELECT * FROM empleados WHERE usuario = '".$datos['usuario']."' AND activo = 1 LIMIT 1");
		if($query->num_rows()>0){
			echo "<script type=\"text/javascript\">alert(\"Usuario ya exsite, No se puede dar de alta\");</script>";
			return FALSE;
		}else{
			date_default_timezone_set('America/Mexico_City');
			setlocale(LC_TIME, 'es_MX.UTF-8');
			$fecha_actual=strftime("%Y-%m-%d");
			$query = $this->db->query("INSERT INTO empleados ( usuario , contrasena, nombre, apellido1, apellido2, celular, fecha_alta, id_puesto, id_rol)
				VALUES (
					'".$datos['usuario']."',
					'".$datos['password']."',
					'".$datos['name']."',
					'".$datos['apellido1']."',
					'".$datos['apellido2']."',
					'".$datos['celular']."',
					'".$fecha_actual."',
					'".$datos['puesto']."',
					'".$datos['rol']."'
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
	/****************************************************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/
	function getServicios($buscar){
		$tabla ="";

		$query = $this->db->query("SELECT  * FROM servicios WHERE cancelada = 0
				AND (servicios.servicio LIKE '%{$buscar}%')
				ORDER BY servicio ASC");

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive">
			<table class="table table-hover ">
              <thead>
                <tr style="text-transform:uppercase;">
                  <th scope="col">Servicio</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Duracion</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody style="text-transform:uppercase;">';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_servicio."||".
            				$row->servicio."||".
            				$row->precio."||".
            				$row->duracion."||".
                            $row->descripcion."'";
            	$tabla.=' <tr>
            	<td>'.$row->servicio.'</td>
            	<td>'.$row->precio.'</td>
            	<td>'.$row->duracion.'</td>
            	<td>'.$row->descripcion.'</td>
            	<td>
            		<a href="#" class="fas fa-2x fa-edit"  data-toggle="modal" data-target="#editarServicio" onclick="servicios('.$datos.')" title="EDITAR"></a>

            		&nbsp;&nbsp;&nbsp;&nbsp;

            		<a href="#" class="fas fa-2x fa-minus-circle" style="color: red;"  data-toggle="modal" data-target="#bajaServicio" onclick="removeServicios('.$datos.')" title="DAR DE BAJA"></a>

            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';


		}else{
			$tabla=' <p style="text-transform:uppercase;">NO SE HA ENCONTRADO RESULTADO EN LA BUSQUEDA ' .$buscar. '</p>' ;
		}


		return $tabla;
	}
}
