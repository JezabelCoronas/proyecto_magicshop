<?php

namespace App\Controllers;

class Home extends BaseController
{

    //Ver página principal
    public function index(){
    
        // titulo de etiqueta de la pagina 
        $data = ["titulo" => "MAGIC SHOP"];
        echo view("plantillas/header");
        echo view("plantillas/navbar");
        echo view("plantilla_home", $data);   //plantilla de inicio
        echo view("plantillas/footer");
    }
    

    //Ver página Quiénes somos
     public function llamarQuienesSomos(){
        $data = ["titulo" => "MAGIC SHOP"];
        echo view("plantillas/header");
        echo view("plantillas/navbar");
        echo view("frontend/quienes_somos");   
        echo view("plantillas/footer");
    }
    
    //ver página Comercialización
    public function llamarComercializacion(){
        $data = ["titulo" => "COMERCIALIZACIÓN"];
        echo view("plantillas/header", $data);
        echo view ("plantillas/navbar");
        echo view('frontend/comercializacion');
        echo view("plantillas/footer");
    }
    
    //Ver página Términos y Usos
    public function llamarTerminosUsos(){
        $data = ["titulo" => "TERMINOS Y USOS"];
        echo view("plantillas/header", $data); 
        echo view ("plantillas/navbar");
        echo view('frontend/terminos_usos');
        echo view("plantillas/footer");
    }
    
    //Ver página Contacto
    public function llamarContacto(){
        $data = ["titulo" => "CONTACTO"];
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view('frontend/contacto');
        echo view("plantillas/footer");
    }

    //Ver página LOGIN
    public function llamarLogin(){
        $data = ["titulo" => "LOGIN"];
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view('backend/usuario/login');
        echo view("plantillas/footer");
    }

    //Ver página Llamar PRODUCTOS
    public function llamarProductos(){
        $data = ["titulo" => "PRODUCTOS"];
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view('frontend/productos');
        echo view("plantillas/footer");
    }

    //Ver Página Registro
    public function llamarRegistro(){
        $data = ["titulo" => "REGISTRO"];
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view('backend/usuario/registro');
        echo view("plantillas/footer");
    }
   
   
}


  
   


