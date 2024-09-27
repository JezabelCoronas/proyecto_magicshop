<?php
namespace App\Controllers;
Use App\Models\usuario_Model;
use CodeIgniter\Controller;

class usuario_controller extends Controller{
    public function __construct(){
           helper(['form', 'url']);
    }

    public function create(){    
         $dato['titulo']='Registro'; 
         echo view('plantillas/header',$dato);
         echo view('plantillas/navbar');
         echo view('backend/usuario/registro');
         echo view('plantillas/footer');
      }
 
    public function formValid(){
        //Reglas de validación para c/campo del form
       

        $validationRules= [
            'nombre' => 'required|min_length[3]',
            'apellido'=> 'required|min_length[3]|max_length[25]',
            'usuario'=> 'required|min_length[3]|is_unique[usuarios.usuario]',
            'email'=> 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'=>'required|min_length[6]|max_length[50]'
        ];

        $validationMessages=[
            'nombre'=>['required'=>'El campo nombre es obligatorio.'],
            'apellido'=>['required'=>'El campo apellido es obligatorio.'],
            'usuario'=>['required'=>'El nombre de usuario es obligatorio.',
                        'min_length'=>'Debe tener al menos 3 caracteres.',
                        'is_unique'=>'El nombre de usuario ya está registrado'],
            'email'=>['required'=>'El campo e-mail es obligatorio.',
                       'valid_email'=>'Debe ingresar un correo válido.',
                       'is_unique'=>'Este correo ya está registrado.'
        ],
            'pass'=>['required'=>'La contraseña es obligatoria.',
            'required'=>'La contraseña es obligatoria',
            'min_length'=>'La contraseña debe tener al menos 8 caracteres.']
        ];
        
       $input=$this->validate($validationRules, $validationMessages);
       $formModel = new usuario_Model();
        //Instancia del modelo
     
        if (!$input) {
               $data['titulo']='Registro'; 
                echo view('plantillas/header',$data);
                echo view('plantillas/navbar');
                echo view('backend/usuario/registro', ['validation' => $this->validator]);
                echo view('plantillas/footer');

        } else {
            //Si pasa la validación se guardan en el modelo los campos
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido'=> $this->request->getVar('apellido'),
                'usuario'=> $this->request->getVar('usuario'),
                'email'=> $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
              //password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);  
             
            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
               session()->setFlashdata('success', 'Usuario registrado con éxito');
                return redirect()->to('/registro');
              // return $this->response->redirect('/registro');
      
        }
    }

    public function ver_usuarios(){
        $usuarios = new usuario_Model();
        $data['usuarios'] = $usuarios->findAll();
     
        $data['titulo'] = 'Administrador';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view("backend/usuario/usuario_logueado");
        echo view('plantillas/footer');
    }

    
     // show single user
    public function singleUser($id = null){
         $userModel = new Usuario_Model();
         $data['usuario'] = $userModel->where('id_usuario', $id)->first();
        
        $dato['titulo']='Crud_usuarios'; 
         echo view('plantillas/header', $dato);
         echo view('plantillas/navbar');
         echo view('backend/usuario/edit_usuarios_view', $data);
         echo view('plantillas/footer');
    }
    // update user data

 public function update($id_usuario){
    $session = session();
    $userModel = new Usuario_Model();

    // Obtiene ID del usuario logueado desde la sesión, verifica si es el mismo que se 
    //está editando en el CRUD. en tal caso imprime mensaje de error
    
    $id_usuario_logueado = $session->get('id_usuario');
    if ($id_usuario_logueado == $id_usuario){
        $session->setFlashdata('fail', 'No puede editar sus propios datos.');
        return redirect()->back(); 
    }

    // Obtiene el usuario desde la base de datos
    $usuario = $userModel->find($id_usuario);
    // Verifica si el usuario existe o no
    if (!$usuario){
        $session->setFlashdata('fail', 'Usuario no encontrado.');
        return redirect()->back();
    }

    // Valida los datos del formulario que se pueden modificar (Solo nro de perfil)
    $validation = \Config\Services::validation();
    $rules = [
        'perfil' => 'required',
    ];

    if (!$this->validate($rules)){
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    // Obtienw los datos enviados por el formulario, que se puedan modificar
    $data = [ 
        'perfil_id' => $this->request->getPost('perfil'),
    ];

    // Actualizar el usuario en la base de datos
    if ($userModel->update($id_usuario, $data)){
        $session->setFlashdata('success', 'Usuario actualizado correctamente...');
    } else {
        $session->setFlashdata('fail', 'No se pudo actualizar el usuario. Inténtelo de nuevo...');
    }

    return redirect()->to('usuario_logueado');
  }



//delete lógico (cambia el estado del campo baja)   
public function us_deletelogico($id = null){
    $userModel = new usuario_Model();
    $user = $userModel->find($id);

    if ($user) {
        $data['baja'] = 'SI';
        if ($userModel->update($id, $data)) {
            // Usuario eliminado exitosamente
            return redirect()->to(site_url('usuario_logueado'))->with('success', 'Usuario eliminado exitosamente.');
        } else {
            // Error al eliminar el usuario
            return redirect()->to(site_url('usuario_logueado'))->with('error', 'Ocurrió un error al eliminar el usuario.');
        }
    } else {
        // Usuario no encontrado
        return redirect()->to(site_url('usuario_logueado'))->with('error', 'El usuario que intentas eliminar no existe.');
    }
}


    public function activar($id = null){
    $userModel = new usuario_Model();
    $user = $userModel->find($id);

    if ($user) {
        $data['baja'] = 'NO';
        if ($userModel->update($id, $data)) {
            // Usuario activado exitosamente
            return redirect()->to(site_url('us_eliminados'))->with('success', 'Usuario activado exitosamente.');
        } else {
            // Error al activar el usuario
            return redirect()->to(site_url('us_eliminados'))->with('error', 'Ocurrió un error al activar el usuario.');
        }
    } else {
        // Usuario no encontrado
        return redirect()->to(site_url('us_eliminados'))->with('error', 'El usuario que intentas activar no existe.');
    }
}
 

 public function usuarios_eliminados(){
        $userModel = new usuario_Model();
        $data['usuarios'] = $userModel->where('baja', 'SI')->findAll();

        $data['titulo'] = 'Usuarios Eliminados';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view('backend/usuario/usuarios_eliminados', $data);
        echo view('plantillas/footer');
    }

     public function actualizar($id = null){
        $userModel = new usuario_Model();
        $id = $userModel->where('id', $id)->first();

            $data= [
                'nombre_prod' => $this->request->getVar('nombre'),
                'precio'=> $this->request->getVar('apellido'),
                'precio_vta'=> $this->request->getVar('email'),
                'stock'=> $this->request->getVar('usuario'),
            ];
       
        $userModel->update($id, $data);
        session()->setFlashdata('success', 'Modificación exitosa...');
        return $this->response->redirect(site_url('usuario_logueado'));
    }

}

?>