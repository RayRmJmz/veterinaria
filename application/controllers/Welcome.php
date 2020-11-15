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

		$this->load->view('admin');

		$this->load->view('footer');
	}

	

	/****************************** A D M I N I S T R A D O R *****************************/


	/****************************** E  M P L E A D O S *****************************/
	function empleadosView(){
		$this->valida_session();
		$this->loadnav();
		//para enviar catalogos necesarios para administrar a los empleados (roles y puestos)
		$datos ['puestos'] = $this->Model->getPuestos();
		$datos ['roles'] = $this->Model->getRoles();
		$this->load->view('empleados',$datos);
		$this->load->view('footer');

	}

	function empleadoSearch(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->getEmpleados($buscar);

		echo $resultados;

	}

	function verificaUsuario(){
		$buscar= "";
		if(isset($_POST['cadena'])){
		$buscar = $_POST['cadena'];
		}
		$resultados= $this->Model->verificaUsuario($buscar);

		

	}

	function addEmpleado(){
		date_default_timezone_set('America/Mexico_City');
		setlocale(LC_TIME, 'es_MX.UTF-8');
		$fecha_actual=strftime("%Y-%m-%d");

		$data = array(
			'newEmpleado' => $_POST['newEmpleado'],
			'newPass' => $_POST['newPass'],
			'newName' => $_POST['newName'],
			'newApellido1' => $_POST['newApellido1'],
			'newApellido2' => $_POST['newApellido2'],
			'newCell' => $_POST['newCell'],
			'newDate' => $fecha_actual=strftime("%Y-%m-%d"),
			'newPuesto' => $_POST['newPuesto'],
			'newRol' => $_POST['newRol']
		);

		$insert = $this->Model->addEmpleado($data);
		$this->empleadosView();
			
	}

	function fecha(){
		date_default_timezone_set('America/Mexico_City');
		setlocale(LC_TIME, 'es_MX.UTF-8');
		$fecha_actual=strftime("%Y-%m-%d");
		print_r($fecha_actual);
		echo "<script type=\"text/javascript\">alert(\"Probando echo\");</script>";
	}



	/****************************** S E R V I C I O S *****************************/
	function serviciosView(){
		$this->valida_session();
		$this->loadnav();


		$datos ['puestos'] = $this->Model->getPuestos();
		$datos ['roles'] = $this->Model->getRoles();
		

		$this->load->view('servicios',$datos);
		$this->load->view('footer');
	}


}
