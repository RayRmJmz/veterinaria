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
			<div class="table-responsive">
			<table class="table table-hover ">
              <thead>
                <tr style="text-transform:uppercase;">
                  <th scope="col">Usuario</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">ROl</th>
                  <th scope="col">Fecha ingreso</th>
                  <th scope="col">Acciones</th>
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
                            $row->id_rol."'";
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

            		&nbsp;&nbsp;

            		<a href="#" class="fas fa-2x fa-user-shield"  data-toggle="modal" data-target="#cambiarPass" onclick="updatePassword('.$datos.')" title="CAMBIAR CONTRASEÑA"></a>

            		&nbsp;&nbsp;
            		
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
			<div class="table-responsive">
			<table class="table table-hover ">
              <thead>
                <tr style="text-transform:uppercase;">
                  <th scope="col">Servicio</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody style="text-transform:uppercase;">';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_servicio."||".
            				$row->servicio."||".
                            $row->descripcion."'";
            	$tabla.=' <tr>
            	<td>'.$row->servicio.'</td>
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

	function checkServicio($verifica){

		$query = $this->db->query("SELECT * FROM servicios WHERE servicio = '".$verifica."' AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			echo "SE HA ENCONTRADO UN SERVICIO PARECIDO";
		}else{
			echo "SERVICIO DISPONIBLE";
		}
	}

	function insertServicio($datos){
		$query = $this->db->query("INSERT INTO servicios (servicio, descripcion)
			VALUES (
				'".$datos['servicio']."',
				'".$datos['descripcion']."'
			)");

		echo "<script type=\"text/javascript\">alert(\"SERVICIO DADO DE ALTA SATISFACTORIAMENTE\");</script>";
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
			<div class="table-responsive">
			<table class="table table-hover ">
              <thead>
                <tr style="text-transform:uppercase;">
                  <th scope="col">ARTICULO</th>
                  <th scope="col">MARCA</th>
                  <th scope="col">PRECIO</th>
                  <th scope="col">EXISTENCIA</th>
                  <th scope="col">ACCIONES</th>
                </tr>
              </thead>
              <tbody style="text-transform:uppercase;">';
            foreach ($query->result() as $row) {
            	$datos = "'".$row->id_articulo."||".
            				$row->articulo."||".
            				$row->marca."||".
            				$row->precio."||".
                            $row->existencia."'";
            	$tabla.=' <tr>
            	<td>'.$row->articulo.'</td>
            	<td>'.$row->marca.'</td>
            	<td>'.$row->precio.'</td>
            	<td>'.$row->existencia.'</td>
            	<td> 
            		<a href="#" class="fas fa-2x fa-edit"  data-toggle="modal" data-target="#editarArticulo" onclick="articulos('.$datos.')" title="EDITAR"></a>

            		&nbsp;&nbsp;&nbsp;&nbsp;

            		<a href="#" class="fas fa-2x fa-minus-circle" style="color: red;"  data-toggle="modal" data-target="#bajaArticulo" onclick="removeArticulos('.$datos.')" title="DAR DE BAJA"></a>

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

	function checkArticulo($verifica){

		$query = $this->db->query("SELECT * FROM articulos WHERE articulo = '".$verifica."' AND activo = 1 LIMIT 1");

		if($query->num_rows()>0){
			echo "SE HA ENCONTRADO UN ARTICULO PARECIDO";
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

		echo "<script type=\"text/javascript\">alert(\"ARTICULO DADO DE ALTA SATISFACTORIAMENTE\");</script>";
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
			<div class="table-responsive">
			<table class="table table-hover ">
              <thead>
                <tr style="text-transform:uppercase;">
                  <th scope="col">#Cliente</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">celular</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">#Mascotas</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody style="text-transform:uppercase;">';
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
            	$tabla.=' <tr>
            	<td>'.$row->id_cliente.'</td>
            	<td>'.$row->nombre.'</td>
            	<td>'.$row->apellido1.' '.$row->apellido2.'</td>
            	<td>'.$row->celular.'</td>
            	<td>'.$row->telefono.'</td>
            	<td>'.$query->row('mascotas').'</td>
            	<td> 
            		<a href="#" class="fas fa-2x fa-user-edit"  data-toggle="modal" data-target="#editarCliente" onclick="clientes('.$datos.')" title="EDITAR"></a>

            		&nbsp;&nbsp;

            		
            		<a href="#" class="fas fa-2x fa-paw" style="color: green;"  onclick="removeClientes('.$datos.')" title="ADMINISTRAR MASCOTAS"></a>

            	</td>
            	<tr>';
            	}
            $tabla.='</tbody>
                    </table>
                    </div>';


		}else{
			$tabla="NO SE HAN ENCONTRADO CLIENTES EN LA BUSQUEDA";			
		}

		return $tabla;
	}

}