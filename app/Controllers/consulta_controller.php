<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\consulta_Model;

class consulta_controller extends BaseController {

   //Visualizar view de contacto para ingresar consultas
    public function create() {
        $data['titulo'] = 'Registro'; 
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view('backend/usuario/contacto');
        echo view('plantillas/footer');
    }

   //Formulario
    public function formValidate() {
        $validationRules = [
            'consulta_nombre' => 'required|min_length[3]',
            'consulta_apellido'=> 'required|min_length[3]|max_length[25]',
            'consulta_email'=> 'required|min_length[4]|max_length[100]|valid_email',
            'consulta_telefono'=> 'required|min_length[3]|is_unique[usuarios.usuario]',
            'consulta_mensaje'=> 'required|min_length[6]|max_length[200]'
        ];

        $validationMessages = [
            'consulta_nombre' => ['required' => 'El campo nombre es obligatorio.'],
            'consulta_apellido' => ['required' => 'El campo apellido es obligatorio.'],
            'consulta_email' => [
                'required' => 'El campo e-mail es obligatorio.',
                'valid_email' => 'Inserte un e-mail válido'
            ],
            'consulta_telefono' => ['required' => 'El campo telefono es obligatorio.'],
            'consulta_mensaje' => [
                'required' => 'El campo mensaje es obligatorio.',
                'min_length' => 'Escriba seis (6) caracteres como mínimo.',
                'max_length' => 'Escriba hasta 200 caracteres.'
            ]
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            $data['titulo'] = 'Contacto'; 
            echo view('plantillas/header', $data);
            echo view('plantillas/navbar');
            echo view('frontend/contacto', ['validation' => $this->validator]);
            echo view('plantillas/footer');
        } else {
            $formModel = new consulta_Model();
            $formModel->save([
                'consulta_nombre' => $this->request->getPost('consulta_nombre'),
                'consulta_apellido'=> $this->request->getPost('consulta_apellido'),
                'consulta_email'=> $this->request->getPost('consulta_email'),
                'consulta_telefono'=> $this->request->getPost('consulta_telefono'),
                'consulta_mensaje'=> $this->request->getPost('consulta_mensaje'),
            ]);  
            
            session()->setFlashdata('success', 'Consulta registrada con éxito');
            return redirect()->to('/contacto');
        }
    }


    //Visualizar lista de consultas en CRUD
  public function ver_consultas(){
        $consultas = new consulta_model();
        $data['consultas'] = $consultas->findAll();
        $data['titulo'] = 'Administrador';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view("backend/usuario/ver_consultas_view");
        echo view('plantillas/footer');
    }

    //Ver lista de consultas ya respondidas en el CRUD
      public function con_respondidas(){
        $consultas = new consulta_Model();
        $data['consultas'] = $consultas->where('respondida', 'SI')->findAll();

        $data['titulo'] = 'Consultas Respondidas';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view('backend/usuario/consultas_respondidas', $data);
        echo view('plantillas/footer');
    }

    //Mover consulta a lista de consultas atendidas/respondidas
    public function atender_consulta($id = null){
        $consultasModel = new Consulta_Model();
        $consulta = $consultasModel->find($id);

            if ($consulta) {
                $data = ['respondida' => 'SI'];
                if ($consultasModel->update($id, $data)) {
                    // Consulta atendida exitosamente
                    return redirect()->to(site_url('/ver_consultas'))->with('success', 'Consulta atendida exitosamente.');
                } else {
                    // Error al atender la consulta
                    return redirect()->to(site_url('/ver_consultas'))->with('error', 'Ocurrió un error al atender la consulta.');
                }
            } else {
                // Consulta no encontrada
                return redirect()->to(site_url('/ver_consultas'))->with('error', 'La consulta que intentas atender no existe.');
            }
        }

     //Borrar una consulta definitivamente
        public function borrar_consulta($id = null){
            $consultasModel = new Consulta_Model();
            $consulta = $consultasModel->find($id);

            if ($consulta) {
                if ($consultasModel->delete($id)) {
                    // Consulta borrada exitosamente
                    return redirect()->to(site_url('con_respondidas'))->with('success', 'Consulta borrada exitosamente.');
                } else {
                    // Error al borrar la consulta
                    return redirect()->to(site_url('con_respondidas'))->with('error', 'Ocurrió un error al borrar la consulta.');
                }
            } else {
                // Consulta no encontrada
                return redirect()->to(site_url('con_respondidas'))->with('error', 'La consulta que intentas borrar no existe.');
            }
        }

}
?>