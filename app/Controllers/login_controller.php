<?php
 namespace App\Controllers;
 use Codeigniter\Controller;
 use App\Models\usuario_Model;


 class login_controller extends BaseController{


  //Mostrar vista de Login / inicio sesión
 	public function index(){
 		helper(['form', 'url']);

 		$dato['titulo']='login';
 		echo view('plantillas/header', $dato);
 		echo view('plantillas/navbar');
 		echo view('backend/usuario/login');
 		echo view('plantillas/footer');
 	}

  //Autenticar
 	public function auth(){
       		$session= session(); //El objeto de sesión se asigna a la variable session
       		$model= new usuario_Model(); //se instancia el modelo
       	

       	//traemos los datos del formulario, para ingresar pedirá nombre de usuario y contraseña
       	$usuario = $this->request->getVar('usuario');
       	$password= $this->request->getVar('pass');



          $data= $model->where('usuario', $usuario)->first();   //consulta SQL en base al nombre de usuarios

          if($data){
          	$pass= $data['pass'];
          	$ba = $data['baja'];

          	  if($ba =='SI'){
          	  	$session->setFlashdata('msg', 'usuario dado de baja');
          	  	  
                   return redirect()->to('/login_controller');
          	 }
          	 //Se verifican los datos ingresados para iniciar, y si cumple la verificacion inicia sesión

          	 $verify_pass = password_verify($password, $pass);

          	 //password verify determina los requisitos de configuración de la contraseña

          	 if($verify_pass){ 
          	 	$ses_data= [
          	 		'id_usuario'=> $data['id_usuario'],
          	 		'nombre'=>$data['nombre'],
          	 		'apellido'=>$data['apellido'],
          	 		'email'=>$data['email'],
          	 		'usuario'=>$data['usuario'],
          	 		'perfil_id'=>$data['perfil_id'],
          	 		'logged_in'=>TRUE
          	 	];
          	 	//Si se cumple la verificación inicia la sesión

          	 	$session->set($ses_data);
          	 	session()->setFlashdata('msg', 'Bienvenido!!');
          	 	return redirect()->to('/plantilla_home');
          	 }
          	}else{
          		//Si no pasó la validación del NOMBRE DE USUARIO:

          		$session->setFlashdata('msg', 'No existe el usuario o es incorrecto');
          		return redirect()->to('/login');
          	}
          }
        
      //Cerrar sesión
      public function logout(){
      	$session= session();
      	$session->destroy();
      	return redirect()->to('/');
      }

}
?>