<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index(){
		$this->load->view('login');
	}

	private function valida_session(){
		/*valida la session si no lo manda a iniciar sesion*/
		if( !$this->session->userdata('usuario')){
			header("Location: ".base_url());
		}
	}

	public function logout(){
			$this->session->sess_destroy();
			header("Location: ".base_url());
	}

	public function loadnav(){
		//carga el head y el navbar de pagina
		$userlog = $this->session->userdata('usuario');
		$fila= $this->Model->getUser($userlog);
		$datos =array('nombre'=>$fila->nombre,'apellido1'=>$fila->apellido1,'apellido2'=>$fila->apellido2, 'rol'=>$fila->id_rol);
		$this->load->view("head",$datos);

	}

	function login (){
		$usuario =  $this->input->post('usuario');
		$password =  $this->input->post('password');

		$fila = $this->Model->getUser($usuario);
		
		if($fila != null){
			if($fila->contrasena == $password){
				$data = array(
					'usuario' => $usuario,
					'id'	  => $fila->id_empleado,
					'login'	  => true
				);
				//guarda los datos en una session

				$this->session->set_userdata($data);

				$this->inicio();


			}else{
				echo "<script type=\"text/javascript\">alert(\"Contraseña incorrecta\");</script>";
				header("Location: ".base_url());
			}
		}else{
			echo "<script type=\"text/javascript\">alert(\"Usuario no encontrado\");</script>";
			header("Location: ".base_url());
		}
	}

	function inicio(){
		$this->valida_session();
		$this->loadnav();
		$datos = $this->getCatalogos();
		$this->load->view('administrador/admin',$datos);

		$this->load->view('footer');
	}

	/****************************** A D M I N I S T R A D O R *****************************/
	function getCatalogos(){
		$datos ['puestos'] = $this->Model->getPuestos();
		$datos ['roles'] = $this->Model->getRoles();
		return $datos;
	}

	/****************************** E  M P L E A D O S - V I S T A S *****************************/
	function empleados(){
		$this->valida_session();
		$this->loadnav();
		$datos = $this->getCatalogos();
		$this->load->view('administrador/empleados',$datos);
		$this->load->view('footer');
	}

	function agregarEmpleado(){
		$this->valida_session();
		$this->loadnav();
		$datos = $this->getCatalogos();
		$this->load->view('administrador/agregarEmpleado',$datos);
		$this->load->view('footer');
	}


	/****************************** E  M P L E A D O S - C R U D *****************************/

	function empleadoSearch(){
		//BUSCA TODOS LOS EMPLEADOS PARA MOSTRARLOS EN  LA VISTA EMPLEADOS()
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->getEmpleados($buscar);
		echo $resultados;
	}

	function verificaUsuario(){
		// BUSCA EN LA BD QUE EL USUARIO NO SE REPITA
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->verificaUsuario($buscar);		
	}

	function insertEmpleado(){
		$insert = $this->Model->insertEmpleado($_POST);
		$this->empleados();
	}

	function updateEmpleado(){
		$result = $this->Model->updateEmpleado($_POST);
		echo $result;
	}

	function updatePassEmpleado(){
		$result = $this->Model->updatePassEmpleado($_POST);
		echo $result;
	}

	function removeEmpleado(){
		$result = $this->Model->removeEmpleado($_POST);
		echo $result;
	}

	/****************************** S E R V I C I O S  - V I S T A S*****************************/
	
	function servicios(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('administrador/servicios');
		$this->load->view('footer');
	}

	function agregarServicio(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('administrador/agregarServicio');
		$this->load->view('footer');
	}
	/****************************** S E R V I C I O S - C R U D *****************************/

	function serviciosSearch(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->getServicios($buscar);
		echo $resultados;
	}

	function checkServicio(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->checkServicio($buscar);
	}

	function insertServicio(){
		$insert = $this->Model->insertServicio($_POST);
		$this->servicios();
	}

	function updateServicio(){
		$result = $this->Model->updateServicio($_POST);
		echo $result;
	}

	function removeServicio(){
		$result = $this->Model->removeServicio($_POST);
		echo $result;
	}

	/****************************** A R T I C U L O S  - V I S T A S*****************************/
	
	function articulos(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('administrador/articulos');
		$this->load->view('footer');
	}

	function agregarArticulo(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('administrador/agregarArticulo');
		$this->load->view('footer');

	}
	/****************************** A R T I C U L O S - C R U D *****************************/
	function articulosSearch(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->getArticulos($buscar);
		echo $resultados;
	}

	function checkArticulo(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->checkArticulo($buscar);
	}

	function insertArticulo(){
		$insert = $this->Model->insertArticulo($_POST);
		$this->articulos();
	}

	function updateArticulo(){
		$result = $this->Model->updateArticulo($_POST);
		echo $result;
	}

	function removeArticulo(){

		$result = $this->Model->removeArticulo($_POST);
		echo $result;
	}

	/****************************** C L I E N T E S  - V I S T A S*****************************/
	
	function clientes(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('clientes');
		$this->load->view('footer');
	}

	function agregarCliente(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('agregarCliente');
		$this->load->view('footer');

	}

	/****************************** C L I E N T E S - C R U D *****************************/

	function clienteSearch(){
		//BUSCA TODOS LOS EMPLEADOS PARA MOSTRARLOS EN  LA VISTA EMPLEADOS()
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->getClientes($buscar);
		echo $resultados;
	}

	function checkCliente(){
		$resultados= $this->Model->checkCliente($_POST);		
	}

	function insertCliente(){
		$insert = $this->Model->insertCliente($_POST);
		$this->clientes();
	}

	function updateCliente(){
		$result = $this->Model->updateCliente($_POST);
		echo $result;
	}

/****************************** C L I E N T E S  - P E T S*****************************/
	function mascotas($id){
		$this->valida_session();
		$this->loadnav();
		$cliente= $this->Model->getClient($id);
		$this->load->view('mascotas',$cliente);
		$this->load->view('footer');
	}

	function agregarMascota($id){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('agregarMascota',$id);
		$this->load->view('footer');
	}

	function getPets(){
		$id = $_POST['id'];
		$result = $this->Model->getPets($id);
		echo $result;
	}

	function getEspecies(){
		$result = $this->Model->getEspecies();
		echo $result;
	}

	function loadRazas(){
		$result = $this->Model->loadRazas($_POST);
		echo $result;

	}

	function loadTamano(){
		$result = $this->Model->loadTamano($_POST);
		echo $result;

	}

	function loadPelaje(){
		$result = $this->Model->loadPelaje($_POST);
		echo $result;

	}

	function insertPet(){
		$result = $this->Model->insertPet($_POST);
		echo $result;
	}

	function editPet(){
		$result = $this->Model->editPet($_POST);
		echo $result;
	}

	/****************************** R E S E R V A S*****************************/
	
	function reservas(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('reservas');
		$this->load->view('footer');
	}

	function agregarReserva(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('agregarReserva');
		$this->load->view('footer');
	}

	function getReservas(){
		$result = $this->Model->getReservas($_POST);
		echo $result;
	}

	function getClientReservation (){
		$result = $this->Model->getClientReservation($_POST);
		echo json_encode($result);	
	}

	 function getMascotaReservation(){
	 	$result = $this->Model->getMascotaReservation($_POST);
		echo $result;
	 }

	 function getServiciosReservation(){
	 	$result = $this->Model->getServiciosReservation();
		echo $result;
	 }

	 function insertReserva(){
	 	$result = $this->Model->insertReserva($_POST);
	 	if($result){
	 		$this->reservas();
	 	}else{
	 		$this->agregarReserva();
	 	}
	 }

	 function deleteReserva(){
	 	$result = $this->Model->deleteReserva($_POST);
	 	echo $result;
	 }

	 function sendReservationToOrder(){
	 	$result = $this->Model->sendReservationToOrder($_POST);
	 	echo $result;
	 }


	 /****************************** O R D E N  - D E - T R A B A J O*****************************/

	 function nuevaOrden(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('agregarOrden');
		$this->load->view('footer');
	}

	function ordenesActivas(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('ordenesActivas');
		$this->load->view('footer');
	}

	function ordenesRealizadas(){
		$this->valida_session();
		$this->loadnav();
		$this->load->view('ordenesRealizadas');
		$this->load->view('footer');
	}

	function agregarOrden(){
		$result = $this->Model->agregarOrden($_POST);
	 	if($result){
	 		$this->ordenesActivas();
	 	}else{
	 		$this->nuevaOrden();
	 	}
	}

	function deleteOrden(){
		$result = $this->Model->deleteOrden($_POST);
	 	echo $result;
	}

	function getOrdenesTrabajo(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$result = $this->Model->getOrdenesTrabajo($buscar);
		echo $result;
	}

	function editarOrden($id){
		$this->valida_session();
		$this->loadnav();
		$data = $this->Model->getOrdenTrabajo($id);
		$datos =array('data'=>$data);
		$this->load->view('editarOrden',$datos);
		$this->load->view('footer');
	}

	function getOrders(){
		$result = $this->Model->getOrders($_POST);
		echo $result;
	}

	function updateOrdenServicio(){
		$result = $this->Model->updateOrdenServicio($_POST);
		echo $result ;
	}

	function successOrden(){
		$result = $this->Model->successOrden($_POST);
		echo $result ;
	}

	function getOrdenesTrabajoRealizadas(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$result = $this->Model->getOrdenesTrabajoRealizadas($buscar);
		echo $result;
	}

	function detalleOrden($id){
		$this->valida_session();
		$this->loadnav();
		$data = $this->Model->detalleOrden($id);
		$datos =array('data'=>$data);
		$this->load->view('detalleOrden',$datos);
		$this->load->view('footer');
	}

	function ordenesDetalle(){
		$result = $this->Model->ordenesDetalle($_POST);
		echo $result;
	}



	function test(){
		$estado = $this->db->query("SELECT * FROM orden_trabajo_servicios WHERE orden_trabajo_servicios.id_orden_trabajo = 20 AND orden_trabajo_servicios.id_servicio = 2")->row();
		$data = "'{$estado->id_estado}'";
		echo $data;
	}








}
