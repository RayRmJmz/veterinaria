
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


	/****************************************************************************************************/
	/****************************************************************************************************/
	/*************** E M P L E A D O S ******************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

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
	/*************** S E R V I C I O S  *****************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/
	function getServicios($buscar){
		$tabla ="";

		$query = $this->db->query("SELECT  * FROM servicios WHERE activo = 1
				AND (servicios.servicio LIKE '%{$buscar}%')
				ORDER BY servicio ASC");

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive style="display: block;">
			<table class="table table-hover tabla ">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Servicio</th>
                  <th class="titles-thead" scope="col">Descripcion</th>
                  <th class="titles-thead" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_servicio."||".
            				$row->servicio."||".
                            $row->descripcion."'";
            	$tabla.=' <tr class="first-column">
            	<td>'.$row->servicio.'</td>
            	<td>'.$row->descripcion.'</td>
            	<td class="action-buttons">
                <a href="#" data-toggle="modal" data-target="#editarServicio" onclick="servicios('.$datos.')" title="Editar">
                  <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
                  <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/>
                  </svg>
                </a>

            		&nbsp;&nbsp;

                <a href="#" data-toggle="modal" data-target="#bajaServicio" onclick="removeServicios('.$datos.')" title="Dar de baja">
                  <svg height="35" class="icon-action" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/><path d="M0 0h48v48H0z" fill="none"/></svg>
                </a>
            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';


		}else{
			$tabla=' <p>No se han encontrado resultados en su búsqueda  ' .$buscar. '</p>' ;
		}

		return $tabla;
	}

	function checkServicio($verifica){

		$query = $this->db->query("SELECT * FROM servicios WHERE servicio = '".$verifica."' AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			echo "Se ha encontrado un servicio parecido";
		}else{
			echo "Servicio disponible";
		}
	}

	function insertServicio($datos){
		$query = $this->db->query("INSERT INTO servicios (servicio, descripcion)
			VALUES (
				'".$datos['servicio']."',
				'".$datos['descripcion']."'
			)");

		echo "<script type=\"text/javascript\">alert(\"Servicio dado de alta satisfactoriamente\");</script>";
	}

	function updateServicio($datos){
		$query = $this->db->query(" UPDATE servicios SET
									servicio = '".$datos['servicio']."',
									descripcion = '".$datos['descripcion']."'
								 WHERE id_servicio = '".$datos['id_servicio']."'");

		return "OK";
	}

	function removeServicio($datos){
		$query = $this->db->query("UPDATE servicios SET activo = 0 WHERE id_servicio = '".$datos['id_servicio']."'");
		return "OK";
	}

	/****************************************************************************************************/
	/****************************************************************************************************/
	/*************** A R T I C U L O S  *****************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	function getArticulos($buscar){
		$tabla ="";

		$query = $this->db->query("SELECT  * FROM articulos WHERE activo = 1
				AND (articulos.articulo LIKE '%{$buscar}%' )
				ORDER BY articulo ASC");

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive style="display: block;">
			<table class="table table-hover tabla ">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Artículo</th>
                  <th class="titles-thead" scope="col">Marca</th>
                  <th class="titles-thead" scope="col">Precio</th>
                  <th class="titles-thead" scope="col">Existencia</th>
                  <th class="titles-thead" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_articulo."||".
            				$row->articulo."||".
            				$row->marca."||".
            				$row->precio."||".
                            $row->existencia."'";
            	$tabla.=' <tr class="first-column">
            	<td>'.$row->articulo.'</td>
            	<td>'.$row->marca.'</td>
            	<td>'.$row->precio.'</td>
            	<td>'.$row->existencia.'</td>
              <td class= "action-buttons">
                <a href="#" data-toggle="modal" data-target="#editarArticulo" onclick="articulos('.$datos.')" title="Editar">
                  <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
                  <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/>
                  </svg>
                </a>

            		&nbsp;&nbsp;

                <a href="#" data-toggle="modal" data-target="#bajaArticulo" onclick="removeArticulos('.$datos.')" title="Dar de baja">
                  <svg height="35" class="icon-action" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/><path d="M0 0h48v48H0z" fill="none"/></svg>
                </a>

            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';


		}else{
			$tabla=' <p">No se han encontrado resultados en la búsqueda' .$buscar. '</p>' ;
		}

		return $tabla;
	}

	function checkArticulo($verifica){

		$query = $this->db->query("SELECT * FROM articulos WHERE articulo = '".$verifica."' AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			echo "Se ha encontrado un artículo parecido";
		}else{
			echo "";
		}
	}

	function insertArticulo($datos){
		$query = $this->db->query("INSERT INTO articulos (articulo, marca, precio, existencia)
			VALUES (
				'".$datos['articulo']."',
				'".$datos['marca']."',
				'".$datos['precio']."',
				'".$datos['existencia']."'
			)");

		echo "<script type=\"text/javascript\">alert(\"Artículo dado de alta satisfactoriamente\");</script>";
	}

	function updateArticulo($datos){
		$query = $this->db->query(" UPDATE articulos SET
									articulo = '".$datos['articulo']."',
									marca = '".$datos['marca']."',
									precio = '".$datos['precio']."',
									existencia = '".$datos['existencia']."'
								 WHERE id_articulo = '".$datos['id_articulo']."'");

		return "OK";
	}

	function removeArticulo($datos){
		$query = $this->db->query("UPDATE articulos SET activo = 0 WHERE id_articulo = '".$datos['id_articulo']."'");
		return "OK";
	}

	/****************************************************************************************************/
	/****************************************************************************************************/
	/*************** C L I E N T E S ******************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	function getClientes($buscar){
		$tabla ="";

		$query = $this->db->query("SELECT  *
				FROM clientes WHERE clientes.activo = 1
				AND (clientes.nombre LIKE '%{$buscar}%' OR clientes.apellido1 LIKE '%{$buscar}%' OR clientes.apellido2 LIKE '%{$buscar}%')
				ORDER BY nombre ASC");

		foreach ($query->result() as $row){
		}

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive style="display: block;">
			<table class="table table-hover tabla">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">No. Cliente</th>
                  <th class="titles-thead" scope="col">Nombre</th>
                  <th class="titles-thead" scope="col">Apellidos</th>
                  <th class="titles-thead" scope="col">Celular</th>
                  <th class="titles-thead" scope="col">Teléfono</th>
                  <th class="titles-thead" scope="col">Mascotas</th>
                  <th class="titles-thead" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>';
            foreach ($query->result() as $row) {
            	$query = $this->db->query("SELECT COUNT(id_mascota) AS mascotas FROM mascotas WHERE id_cliente = ".$row->id_cliente."");

            	$datos = "'".$row->id_cliente."||".
            				$row->nombre."||".
                            $row->apellido1."||".
                            $row->apellido2."||".
                            $row->telefono."||".
                            $row->celular."||".
                            $row->calle."||".
                            $row->numero."||".
                            $row->colonia."||".
                            $row->municipio."||".
                            $row->cp."'";
                $id = $row->id_cliente;
            	$tabla.=' <tr class="first-column">
            	<td>'.$row->id_cliente.'</td>
            	<td>'.$row->nombre.'</td>
            	<td>'.$row->apellido1.' '.$row->apellido2.'</td>
            	<td>'.$row->celular.'</td>
            	<td>'.$row->telefono.'</td>
            	<td>'.$query->row('mascotas').'</td>
              <td class="action-buttons">
                <a href="#" data-toggle="modal" data-target="#editarCliente" onclick="clientes('.$datos.')" title="Editar">
                  <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
                  <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/></svg>
                </a>

            		&nbsp;&nbsp;


            		<a href="'.base_url().'welcome/mascotas/'.$id.'"   class="fas fa-2x fa-paw" style="color: #6c757d;" title="Mascotas"></a>

            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';


		}else{
			$tabla="No se han encontrado resultados en la búsqueda";
		}

		return $tabla;
	}


	function checkCliente($verifica){

		$query = $this->db->query("SELECT * FROM clientes WHERE
									 nombre = '".$verifica['nombre']."'
									 AND apellido1 = '".$verifica['apellido1']."'
									 AND apellido2 = '".$verifica['apellido2']."'
									 AND celular = '".$verifica['celular']."'
									 AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			echo "Se ha encontrado un clientes con los datos parecidos";
		}else{
			echo "";
		}
	}

	function insertCliente($datos){
		$query = $this->db->query("INSERT INTO clientes (nombre, apellido1, apellido2, telefono, celular, calle, numero, colonia, municipio, cp)
			VALUES (
				'".$datos['nombre']."',
				'".$datos['apellido1']."',
				'".$datos['apellido2']."',
				'".$datos['telefono']."',
				'".$datos['celular']."',
				'".$datos['calle']."',
				'".$datos['numero']."',
				'".$datos['colonia']."',
				'".$datos['municipio']."',
				'".$datos['cp']."'
			)");

		echo "<script type=\"text/javascript\">alert(\"Cliente dado de alta satisfactoriamente\");</script>";
	}

	function updateCliente($datos){
		$query = $this->db->query(" UPDATE clientes SET
									nombre = '".$datos['nombre']."',
									apellido1 = '".$datos['apellido1']."',
									apellido2 = '".$datos['apellido2']."',
									telefono = '".$datos['telefono']."',
									celular = '".$datos['celular']."',
									calle = '".$datos['calle']."',
									numero = '".$datos['numero']."',
									colonia = '".$datos['colonia']."',
									municipio = '".$datos['municipio']."',
									cp = '".$datos['cp']."'
								 WHERE id_cliente = '".$datos['id_cliente']."'");
		return "OK";
	}

	function getClient($id){
		$query = $this->db->query("SELECT * FROM clientes WHERE id_cliente = '".$id."' AND activo = 1 LIMIT 1");
			return $query->row();
	}

	function getPets($id){
		$tabla ="";

		$query = $this->db->query("SELECT mascotas.id_mascota, mascotas.nombre,mascotas.peso, mascotas.estatura, mascotas.fecha_nacimiento, mascotas.id_raza, razas.raza as raza,especies.id_especie, especies.especie as especie, mascotas.id_tamano, tamanos.tamano as tamano, mascotas.id_pelaje, pelajes.pelaje as pelaje FROM mascotas INNER JOIN razas ON mascotas.id_raza = razas.id_raza INNER JOIN tamanos ON mascotas.id_tamano = tamanos.id_tamano INNER JOIN pelajes ON mascotas.id_pelaje = pelajes.id_pelaje INNER JOIN especies ON razas.id_especie = especies.id_especie
			 WHERE mascotas.id_cliente = {$id}");

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive">
			<table class="table table-hover tabla">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Nombre</th>
                  <th class="titles-thead" scope="col">Especie</th>
                  <th class="titles-thead" scope="col">Raza</th>
                  <th class="titles-thead" scope="col">Peso (kg)</th>
                  <th class="titles-thead" scope="col">Estatura (m)</th>
                  <th class="titles-thead" scope="col">Fecha nacimiento</th>
                  <th class="titles-thead" scope="col">Pelaje</th>
                  <th class="titles-thead" scope="col">Tamaño</th>
                  <th class="titles-thead" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_mascota."||".
            				$row->nombre."||".
            				$row->peso."||".
            				$row->id_raza."||".
            				$row->estatura."||".
            				$row->fecha_nacimiento."||".
            				$row->id_pelaje."||".
                    $row->id_tamano."'";
            	$tabla.=' <tr class="first-column">
            	<td>'.$row->nombre.'</td>
            	<td>'.$row->especie.'</td>
            	<td>'.$row->raza.'</td>
            	<td>'.$row->peso.'</td>
            	<td>'.$row->estatura.'</td>
            	<td>'.$row->fecha_nacimiento.'</td>
            	<td>'.$row->pelaje.'</td>
            	<td>'.$row->tamano.'</td>
              <td class="action-buttons">
                <a href="#" data-toggle="modal" data-target="#editPet" onclick="mascotas('.$datos.')" title="Editar">
                  <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
                  <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/></svg>
                </a>

            		&nbsp;&nbsp;

            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';

		}else{
			$tabla=' <p">No se han encontrado mascotas registradas para este cliente</p>' ;
		}

		return $tabla;
	}

	function getEspecies(){
		$result = '<label for="especie">Especies</label>
              <select name="especie" id="especie" onchange="loadRazas()" class="form-control" required>
              <option disabled selected value="0"> -- Seleccione especie -- </option>';

		$query = $this->db->query("SELECT * FROM especies");
		foreach ($query->result() as $row){
			$result .= '<option value="'.$row->id_especie.'">'.$row->especie.'</option>';
		}
		$result .= '</select>';

		return $result;

	}

	function loadRazas($id_especie){
		$result = '<label for="raza">Razas</label>
				<select name="raza" id="raza" class="form-control" required>
             	<option disabled selected value="0"> -- Seleccione especie -- </option>';
		$query = $this->db->query("SELECT * FROM razas WHERE id_especie = '".$id_especie['especie']."' ORDER BY raza ");
		foreach ($query->result() as $row){
			$result .= '<option value="'.$row->id_raza.'">'.$row->raza.'</option>';
		}
		$result .= '</select>';

		return $result;
	}

	function loadTamano(){
		$result = '<label for="tamano" >Tamaño</label>
				<select name="tamano" id="tamano" class="form-control" required>
             	<option disabled selected value="0"> -- Seleccione tamaño -- </option>';
		$query = $this->db->query("SELECT * FROM tamanos");
		foreach ($query->result() as $row){
			$result .= '<option value="'.$row->id_tamano.'">'.$row->tamano.'</option>';
		}
		$result .= '</select>';

		return $result;
	}

	function loadPelaje(){
		$result = '<label for="pelaje">Tipo pelaje</label>
				<select name="pelaje" id="pelaje" class="form-control" required>
             	<option disabled selected value="0"> -- Seleccione pelaje -- </option>';
		$query = $this->db->query("SELECT * FROM pelajes");
		foreach ($query->result() as $row){
			$result .= '<option value="'.$row->id_pelaje.'">'.$row->pelaje.'</option>';
		}
		$result .= '</select>';

		return $result;
	}

	function insertPet($datos){

		$query = $this->db->query("INSERT INTO mascotas (id_cliente, id_raza, id_tamano, id_pelaje, nombre, fecha_nacimiento, peso, estatura)
			VALUES(
			'".$datos['id_cliente']."',
			'".$datos['id_raza']."',
			'".$datos['id_tamano']."',
			'".$datos['id_pelaje']."',
			'".$datos['nombre']."',
			'".$datos['fecha_nacimiento']."',
			'".$datos['peso']."',
			'".$datos['estatura']."'
			)");
		return "OK";
	}

	function editPet($datos){
		$query = $this->db->query("UPDATE mascotas SET
				nombre = '".$datos['nombre']."',
				fecha_nacimiento = '".$datos['fecha_nacimiento']."',
				peso = '".$datos['peso']."',
				estatura = '".$datos['estatura']."'
				WHERE id_mascota = '".$datos['id_mascota']."'
			");
	}
	/****************************************************************************************************/
	/****************************************************************************************************/
	/*************** R E S E R V A S ******************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	function getReservas($info){
		$tabla ="";

		$query = $this->db->query("SELECT reservas.id_reserva, reservas.id_mascota, Date(reservas.fecha_reserva) as date ,time(reservas.fecha_servicio) as time ,reservas.total, clientes.nombre as cliente,clientes.apellido1 as apellido, mascotas.nombre as mascota, razas.raza, pelajes.pelaje, tamanos.tamano, especies.especie FROM reservas INNER JOIN mascotas ON reservas.id_mascota = mascotas.id_mascota INNER JOIN clientes ON mascotas.id_cliente = clientes.id_cliente INNER JOIN pelajes ON mascotas.id_pelaje = pelajes.id_pelaje INNER JOIN razas ON mascotas.id_raza = razas.id_raza INNER JOIN tamanos ON mascotas.id_tamano = tamanos.id_tamano INNER JOIN especies ON razas.id_especie = especies.id_especie WHERE reservas.activo = 1 AND id_estado = 1 AND DATE(reservas.fecha_servicio) = '".$info['fecha']."' ORDER BY reservas.id_reserva");

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive">
			<table class="table table-hover tabla">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Folio</th>
                  <th class="titles-thead" scope="col">Fecha</th>
                  <th class="titles-thead" scope="col">Hora</th>
                  <th class="titles-thead" scope="col">Cliente</th>
                  <th class="titles-thead" scope="col">Especie</th>
                  <th class="titles-thead" scope="col">Mascota</th>
                  <th class="titles-thead" scope="col">Raza</th>
                  <th class="titles-thead" scope="col">Pelaje</th>
                  <th class="titles-thead" scope="col">Tamaño</th>
                  <th class="titles-thead" scope="col">Total</th>
                  <th class="titles-thead" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>';
            foreach ($query->result() as $row) {
            	$id_reserva = $row->id_reserva;
            	$tabla.=' <tr class="first-column">
            	<td>'.$row->id_reserva.'</td>
            	<td>'.$row->date.'</td>
            	<td>'.$row->time.'</td>
            	<td>'.$row->cliente.' '.$row->apellido.'</td>
            	<td>'.$row->especie.'</td>
            	<td>'.$row->mascota.'</td>
            	<td>'.$row->raza.'</td>
            	<td>'.$row->pelaje.'</td>
            	<td>'.$row->tamano.'</td>
            	<td>$ '.$row->total.'</td>           		
	            <td class="action-buttons">
	            	<a href="#" class="fas fa-2x fa-arrow-alt-circle-up"  data-toggle="modal" data-target="#editPet" onclick="sendReservationToOrder('.$id_reserva.')" title="Enviar a orden de trabajo"></a>

	            	&nbsp;&nbsp;

	                <a href="#" data-toggle="modal" data-target="" title="Editar">
	                  <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	                  <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
	                  <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/></svg>
	                </a>


	            	&nbsp;&nbsp;

	                <a href="#" data-toggle="modal" data-target="" title="Editar">
	                  <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	                  <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
	                  <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/></svg>
	                </a>


	                &nbsp;&nbsp;

	                <a href="#" data-toggle="modal" data-target="" title="Cancelar reserva" onclick="deleteReserva('.$id_reserva.')">
	                  <svg height="35" class="icon-action" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/><path d="M0 0h48v48H0z" fill="none"/></svg>
	                </a>
	            </td>
            	</tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';

		}else{
			$tabla=' <p">No se han encontrado reservas registradas esta fecha </p>' . $info['fecha'];
		}
		return $tabla;

	}

	function getClientReservation($info){

		$query = $this->db->query("SELECT * FROM clientes WHERE nombre LIKE '%".$info['q']."%' OR apellido1 LIKE '%".$info['q']."%' OR apellido2 LIKE '%".$info['q']."%' OR celular LIKE '%".$info['q']."%' OR telefono LIKE '%".$info['q']."%'");
		$data = array();
		if ($query->num_rows()>0) {
			 foreach ($query->result() as $row){
			 	$data[] = array('id'=>$row->id_cliente, 'text' =>$row->nombre.' '.$row->apellido1.' '.$row->apellido2.' Celular: '.$row->celular.' Teléfono: '.$row->telefono);
			 }
		}else{
			$data[] = array('id'=>0, 'text' =>'No encontrado');
		}

		return $data;
	}

	function getMascotaReservation($data){
		$info = '';
		$query = $this->db->query("SELECT mascotas.id_mascota, mascotas.nombre, mascotas.peso, mascotas.estatura, razas.raza, tamanos.tamano, pelajes.pelaje, especies.especie FROM mascotas INNER JOIN razas ON mascotas.id_raza = razas.id_raza INNER JOIN tamanos ON mascotas.id_tamano = tamanos.id_tamano INNER JOIN pelajes ON mascotas.id_pelaje = pelajes.id_pelaje INNER JOIN especies ON razas.id_especie = especies.id_especie WHERE  id_cliente = '".$data['id_cliente']."'");
		if ($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$info.='
				<div class="card card-custom gutter-b col-md-3 col-lg-2" style="    margin: 15px;">
        <div class="card-header" style="background: #fff;">
          <div class="card-title" style="display: flex;">
          <input style="margin-top: 10px;" type="checkbox" name="mascota" onclick="onlyOne(this)" value="'.$row->id_mascota.'">
          <h2 for="mascota" class="card-label" style="margin-left: 15px; color: #8a909d">'.$row->nombre.'
          </h2>
          </div>
        </div>
        <div class="card-body">
          Especie: '.$row->especie.'<br> Raza: '.$row->raza.'<br> Tamaño: '.$row->tamano.'<br> Pelaje: '.$row->pelaje.'<br> Peso (kg): '.$row->peso.'<br> Estatura (m): '.$row->estatura.'<br>
          </div>
        </div>';
			}
		}else{
			$info.='Este cliente no tiene mascotas registradas';
		}
		return $info;

	}

	function getServiciosReservation(){
		$info = '';
		$query = $this->db->query("SELECT * FROM servicios WHERE activo = 1");
		if ($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$info.='
				<div class="card card-custom gutter-b col-md-3 col-lg-2" style="    margin: 15px;">
        <div class="card-header" style="background: #fff; border: none;     border: none;
        padding-bottom: 0;">
          <div class="card-title" style="display: flex;">
          <input style="margin-top: 5px;" type="checkbox" name="servicio[]"  value="'.$row->id_servicio.'">
          <h6 class="card-label" style="margin-left: 15px; color: #8a909d">'.$row->servicio.'</h6>
          </div>
        </div>
        <div class="card-body" style="padding-top: 0;
        padding-bottom: 15px;">
        Descripción: '.$row->descripcion.'
        </div>
        </div>';
			}
		}else{
			$info.='No se han registrado servicios, registre servicios o llame al administrador';
		}
		return $info;
	}


	function insertReserva($data){

		$id_empleado = $this->session->userdata('id');
	 	$fecha =  date("Y-m-d H:i:s", strtotime($data['fecha']));
	 	$this->db->trans_start();
		$this->db->query("SET @now =  NOW()");
		$this->db->query("INSERT INTO reservas ( id_mascota, id_empleado, fecha_reserva, fecha_servicio, activo,total, comentarios, id_estado) VALUES ({$data['mascota']}, {$id_empleado}, @now, '{$fecha}', 1, {$data['total']}, '{$data['comentarios']}', 1 )");
		$this->db->query("SET @last_id_reserva = last_insert_id()");
		foreach($data['servicio'] as $selected){
			$this->db->query("INSERT INTO reservas_servicios (id_reserva, id_servicio )
			VALUES(@last_id_reserva, {$selected})");
		}

		if($this->db->trans_complete()){
			echo "<script type=\"text/javascript\">alert(\"Reserva registrada con exito\");</script>";
			return TRUE;
		}else{
			echo "<script type=\"text/javascript\">alert(\"Ha ocurrido un error no se ha podido hacer reserva\");</script>";
			return FALSE;
		}
	}

	function deleteReserva($data){

		$query = $this->db->query("UPDATE reservas SET activo = 0 WHERE id_reserva = {$data['id']}");
		return "OK";
	}

	function sendReservationToOrder($data){
		$this->db->trans_start();
		$query = $this->db->query("SELECT * FROM reservas WHERE id_reserva = {$data['id']}")->row();
		$this->db->query("SELECT * FROM reservas WHERE id_reserva = {$data['id']}");
		$this->db->query("INSERT INTO orden_trabajo (id_mascota, id_empleado, id_reserva, id_estado, fecha_servicio, total, comentarios)
			VALUES('{$query->id_mascota}', '{$query->id_empleado}',  '{$query->id_reserva}', 1, '{$query->fecha_servicio}', '{$query->total}', '{$query->comentarios}')");
		$this->db->query("SET @last_id_rol = last_insert_id()");
		$services = $this->db->query("SELECT * FROM reservas_servicios WHERE id_reserva = {$data['id']}");
		foreach ($services->result() as $row) {
			$this->db->query("INSERT INTO orden_trabajo_servicios (id_estado, id_orden_trabajo, id_servicio )
			VALUES(99, @last_id_rol, {$row->id_servicio})");
		}
		$this->db->query("UPDATE reservas SET id_estado = 3 WHERE reservas.id_reserva = {$data['id']}");
		
		if($this->db->trans_complete()){
			echo "<script type=\"text/javascript\">alert(\"Orden registrada con exito\");</script>";
			return TRUE;
		}else{
			echo "<script type=\"text/javascript\">alert(\"Ha ocurrido un error no se ha podido hacer orden\");</script>";
			return FALSE;
		}


	}

	/****************************************************************************************************/
	/****************************************************************************************************/
	/*************** O R D E N - D E - T R A B A J O S **************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	function getOrdenesTrabajo($data){
		$tabla ="";
		date_default_timezone_set("America/Mexico_City");
		$hoy = date("Y-m-d");
		$query = $this->db->query("SELECT orden_trabajo.id_orden_trabajo, orden_trabajo.total, mascotas.nombre, estados.estado, especies.especie, razas.raza FROM orden_trabajo INNER JOIN mascotas ON orden_trabajo.id_mascota = mascotas.id_mascota INNER JOIN razas ON mascotas.id_raza = razas.id_raza INNER JOIN especies ON razas.id_especie = especies.id_especie INNER JOIN estados ON orden_trabajo.id_estado = estados.id_estado WHERE orden_trabajo.activo = 1 AND orden_trabajo.id_estado = 1 AND DATE(orden_trabajo.fecha_servicio) = '{$hoy}' AND (razas.raza LIKE '%{$data}%' OR mascotas.nombre LIKE '%{$data}%' OR especies.especie LIKE '%{$data}%' ) ORDER BY id_orden_trabajo ASC");

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive">
			<table class="table table-hover tabla">
              <thead>
                <tr>
                  <th class="titles-thead" scope="col">Folio</th>
                  <th class="titles-thead" scope="col">Especie</th>
                  <th class="titles-thead" scope="col">Raza</th>
                  <th class="titles-thead" scope="col">Nombre</th>
                  <th class="titles-thead" scope="col">No. Servicios</th>
                  <th class="titles-thead" scope="col">Total</th>
                  <th class="titles-thead" scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>';
            foreach ($query->result() as $row) {
            	$query = $this->db->query("SELECT COUNT(id_orden_trabajo) as servicios FROM orden_trabajo_servicios WHERE id_orden_trabajo = $row->id_orden_trabajo");
            	$id = $row->id_orden_trabajo;
            	$tabla.=' <tr class="first-column">
            	<td>'.$row->id_orden_trabajo.'</td>
            	<td>'.$row->especie.'</td>
            	<td>'.$row->raza.'</td>
            	<td>'.$row->nombre.'</td>
            	<td>'.$query->row('servicios').'</td>
            	<td>'.$row->total.'</td>
              <td class="action-buttons">
                <a href="'.base_url().'welcome/editarOrden/'.$id.'" title="Editar orden de servicio">
                <svg id="Layer_1" class="icon-action icon-editar" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967  c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688  h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z"/>
                <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571  c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753  c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467  l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376  c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z"/></svg>
              </a>
              &nbsp;&nbsp;
              <a href="#" data-toggle="modal" data-target="" onclick="deleteService('.$id.')" title="Cancelar reserva">
                <svg height="35" class="icon-action" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/><path d="M0 0h48v48H0z" fill="none"/></svg>
              </a>
            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';

		}else{
			$tabla=' <p">No se han encontrado ordenes de trabajo </p>' . $data;
		}
		return $tabla;
	}

	function agregarOrden($data){
		$id_empleado = $this->session->userdata('id');
	 	$this->db->trans_start();
		$this->db->query("SET @now =  NOW()");
		$this->db->query("INSERT INTO
			orden_trabajo ( id_mascota, id_empleado, id_estado, fecha_servicio, total, activo, comentarios)
			VALUES ({$data['mascota']}, {$id_empleado}, 1, @now, {$data['total']}, 1, '{$data['comentarios']}' )");
		$this->db->query("SET @last_id_rol = last_insert_id()");
		foreach($data['servicio'] as $selected){
			$this->db->query("INSERT INTO orden_trabajo_servicios (id_estado, id_orden_trabajo, id_servicio )
			VALUES(99, @last_id_rol, {$selected})");
		}

		if($this->db->trans_complete()){
			echo "<script type=\"text/javascript\">alert(\"Orden registrada con exito\");</script>";
			return TRUE;
		}else{
			echo "<script type=\"text/javascript\">alert(\"Ha ocurrido un error no se ha podido hacer reserva\");</script>";
			return FALSE;
		}
	}

	function deleteOrden($data){
		$query = $this->db->query("UPDATE orden_trabajo SET activo = 0 WHERE id_orden_trabajo = {$data['id']}");
		return "OK";
	}

	function getOrdenTrabajo($id){
		$query = $this->db->query("SELECT clientes.nombre as cliente, clientes.apellido1, clientes.apellido2, clientes.telefono, clientes.celular, clientes.calle, clientes.numero, clientes.colonia, clientes.cp, clientes.municipio, mascotas.nombre, mascotas.peso, mascotas.estatura, mascotas.fecha_nacimiento, especies.especie, razas.raza, pelajes.pelaje, tamanos.tamano, orden_trabajo.id_orden_trabajo, orden_trabajo.fecha_servicio, orden_trabajo.total FROM orden_trabajo INNER JOIN mascotas ON orden_trabajo.id_mascota = mascotas.id_mascota INNER JOIN razas ON mascotas.id_raza = razas.id_raza INNER JOIN especies ON razas.id_especie = especies.id_especie INNER JOIN clientes ON mascotas.id_cliente = clientes.id_cliente INNER JOIN pelajes ON mascotas.id_pelaje = pelajes.id_pelaje INNER JOIN tamanos ON mascotas.id_tamano = tamanos.id_tamano WHERE orden_trabajo.id_orden_trabajo = {$id}");
		return $query->row();
	}



	function getOrders($id){

		$result='';
		$estados = $query = $this->db->query("SELECT * FROM estados");
		$query = $this->db->query("SELECT orden_trabajo_servicios.id_orden_trabajo, orden_trabajo_servicios.id_servicio, orden_trabajo_servicios.id_empleado, orden_trabajo_servicios.id_estado, orden_trabajo_servicios.hora_inicio, orden_trabajo_servicios.hora_fin, servicios.servicio, estados.estado FROM orden_trabajo_servicios INNER JOIN servicios ON orden_trabajo_servicios.id_servicio = servicios.id_servicio INNER JOIN estados ON orden_trabajo_servicios.id_estado = estados.id_estado WHERE id_orden_trabajo = {$id['id_orden']}");
		foreach ($query->result() as $row) {

			$result.='<div>
						<form action="#" id="service'.$row->id_servicio.'">

		  				<label for="servicio" >'.$row->servicio.'</label>
		  				<p>Estado actual: '.$row->estado.' </p>
		  				<select  class="form-select" name="servicio" id="servicio'.$row->id_servicio.'">
		  				<option value="0" >Seleccione estado</option>';

		  				foreach ($estados->result() as $select) {
		  					$result.='<option value="'.$select->id_estado.'">'.$select->estado.'</option>';
		  				}
			  		$result.='</select>
			  			<button type="button" class="btn btn-primary mb-2" onclick="update('.$row->id_orden_trabajo.','.$row->id_servicio.');">Actualizar</button>
			  			</form>
		  			</div>';
		}

		return $result;
	}

	function updateOrdenServicio($data){
		$estado = $this->db->query("SELECT orden_trabajo_servicios.id_estado FROM orden_trabajo_servicios WHERE orden_trabajo_servicios.id_orden_trabajo = {$data['id_orden']} AND orden_trabajo_servicios.id_servicio = {$data['id_servicio']}");
		if($estado->row('id_estado') == 99 ){
			$this->db->query("SET @now =  NOW()");
			$query = $this->db->query("UPDATE orden_trabajo_servicios SET id_estado = {$data['estado']}, hora_inicio = @now WHERE orden_trabajo_servicios.id_orden_trabajo = {$data['id_orden']} AND orden_trabajo_servicios.id_servicio = {$data['id_servicio']}");
		}else{
			$this->db->query("SET @now =  NOW()");
			$query = $this->db->query("UPDATE orden_trabajo_servicios SET id_estado = {$data['estado']}, hora_fin = @now WHERE orden_trabajo_servicios.id_orden_trabajo = {$data['id_orden']} AND orden_trabajo_servicios.id_servicio = {$data['id_servicio']}");
		}

		return $query;
	}


	function successOrden($data){
		$query = $this->db->query("UPDATE orden_trabajo SET id_estado = 3 WHERE orden_trabajo.id_orden_trabajo= {$data['id_orden']}");
		return $query;
	}

	function getOrdenesTrabajoRealizadas($data){
		$tabla ="";
		date_default_timezone_set("America/Mexico_City");
		$hoy = date("Y-m-d");
		$query = $this->db->query("SELECT orden_trabajo.id_orden_trabajo, orden_trabajo.total, mascotas.nombre, estados.estado, especies.especie, razas.raza FROM orden_trabajo INNER JOIN mascotas ON orden_trabajo.id_mascota = mascotas.id_mascota INNER JOIN razas ON mascotas.id_raza = razas.id_raza INNER JOIN especies ON razas.id_especie = especies.id_especie INNER JOIN estados ON orden_trabajo.id_estado = estados.id_estado WHERE orden_trabajo.activo = 1 AND orden_trabajo.id_estado = 3 AND DATE(orden_trabajo.fecha_servicio) = '{$hoy}' AND (razas.raza LIKE '%{$data}%' OR mascotas.nombre LIKE '%{$data}%' OR especies.especie LIKE '%{$data}%' ) ORDER BY id_orden_trabajo ASC");

		if($query->num_rows()>0){
			$tabla.='
			<div class="table-responsive">
			<table class="table table-hover ">
              <thead>
                <tr>
                  <th scope="col">Folio</th>
                  <th scope="col">Especie</th>
                  <th scope="col">Raza</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">#Servicios</th>
                  <th scope="col">Total</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>';
            foreach ($query->result() as $row) {
            	$query = $this->db->query("SELECT COUNT(id_orden_trabajo) as servicios FROM orden_trabajo_servicios WHERE id_orden_trabajo = $row->id_orden_trabajo");
            	$id = $row->id_orden_trabajo;
            	$tabla.=' <tr>
            	<td>'.$row->id_orden_trabajo.'</td>
            	<td>'.$row->especie.'</td>
            	<td>'.$row->raza.'</td>
            	<td>'.$row->nombre.'</td>
            	<td>'.$query->row('servicios').'</td>
            	<td>'.$row->total.'</td>
            	<td>

            		&nbsp;&nbsp;&nbsp;&nbsp;
            		<a href="'.base_url().'welcome/detalleOrden/'.$id.'" class="fas fa-2x fa-eye" title="Ver detalle orden de trabajo"></a>
            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';

		}else{
			$tabla=' <p">No se han encontrado ordenes de trabajo  </p>' . $data;
		}
		return $tabla;
	}


	function detalleOrden($id){
		$query = $this->db->query("SELECT clientes.nombre as cliente, clientes.apellido1, clientes.apellido2, clientes.telefono, clientes.celular, clientes.calle, clientes.numero, clientes.colonia, clientes.cp, clientes.municipio, mascotas.nombre, mascotas.peso, mascotas.estatura, mascotas.fecha_nacimiento, especies.especie, razas.raza, pelajes.pelaje, tamanos.tamano, orden_trabajo.id_orden_trabajo, orden_trabajo.fecha_servicio, orden_trabajo.total FROM orden_trabajo INNER JOIN mascotas ON orden_trabajo.id_mascota = mascotas.id_mascota INNER JOIN razas ON mascotas.id_raza = razas.id_raza INNER JOIN especies ON razas.id_especie = especies.id_especie INNER JOIN clientes ON mascotas.id_cliente = clientes.id_cliente INNER JOIN pelajes ON mascotas.id_pelaje = pelajes.id_pelaje INNER JOIN tamanos ON mascotas.id_tamano = tamanos.id_tamano WHERE orden_trabajo.id_orden_trabajo = {$id}");
		return $query->row();
	}

	function ordenesDetalle($id){

		$result='';
		$query = $this->db->query("SELECT orden_trabajo_servicios.id_orden_trabajo, orden_trabajo_servicios.id_servicio,orden_trabajo_servicios.id_empleado, orden_trabajo_servicios.id_estado, orden_trabajo_servicios.hora_inicio, orden_trabajo_servicios.hora_fin, servicios.servicio, estados.estado FROM orden_trabajo_servicios INNER JOIN servicios ON orden_trabajo_servicios.id_servicio = servicios.id_servicio INNER JOIN estados ON orden_trabajo_servicios.id_estado = estados.id_estado WHERE id_orden_trabajo = {$id['id_orden']}");
		foreach ($query->result() as $row) {

			$result.='<div>
		  				<h5> '.$row->servicio.' estado: '.$row->estado.' incio: '.$row->hora_inicio.'  fin: '.$row->hora_fin.' </h5>
		  			</div>';
		}

		return $result;
	}

	/****************************************************************************************************/
	/****************************************************************************************************/
	/*************** V E N T A S ************************************************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/


}
