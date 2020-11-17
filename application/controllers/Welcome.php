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
		$this->load->view('admin',$datos);

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
		$this->load->view('empleados',$datos);
		$this->load->view('footer');
	}

	function agregarEmpleado(){
		$this->valida_session();
		$this->loadnav();
		$datos = $this->getCatalogos();
		$this->load->view('agregarEmpleado',$datos);
		$this->load->view('footer');
	}




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
		date_default_timezone_set('America/Mexico_City');
		setlocale(LC_TIME, 'es_MX.UTF-8');
		$fecha_actual=strftime("%Y-%m-%d");
		$data = array(
			'newEmpleado' => $_POST['usuario'],
			'newPass' => $_POST['password'],
			'newName' => $_POST['name'],
			'newApellido1' => $_POST['apellido1'],
			'newApellido2' => $_POST['apellido2'],
			'newCell' => $_POST['celular'],
			'newDate' => $fecha_actual=strftime("%Y-%m-%d"),
			'newPuesto' => $_POST['puesto'],
			'newRol' => $_POST['rol']
		);

		$insert = $this->Model->insertEmpleado($data);
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



	


	/****************************** S E R V I C I O S *****************************/
	
	function test(){
		$result = $this->Model->probar($_POST);

		echo $result;
	}


}
