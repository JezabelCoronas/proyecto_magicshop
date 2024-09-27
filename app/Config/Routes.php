<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//Llamo a los metodos
//'/views', 'Home::metodoenhome'

//VISTAS PRINCIPALES - Perfil invitado y Cliente
$routes->get('/plantilla_home', 'Home::index'); //Página principal
$routes->get('/quienes_somos', 'Home::llamarQuienesSomos');
$routes->get('/comercializacion', 'Home::llamarComercializacion');
$routes->get('/terminos_usos', 'Home::llamarTerminosUsos');
$routes->get('/contacto', 'Home::llamarContacto');
$routes->get('/login', 'Home::llamarLogin');
$routes->get('/productos', 'Home::llamarProductos');
$routes->get('/registro', 'Home::llamarRegistro');

//REGISTRO DE USUARIO
$routes->get('/registro', 'usuario_controller::create');
$routes->post('/enviar-form','usuario_controller::formValid');
//INICIAR y CERRAR SESION/LOGIN y LOGOUT
$routes->get('/login', 'login_controller');
$routes->post('/enviarLogin', 'login_controller::auth');
$routes->get('/panel', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'login_controller::logout');

//CRUD de Usuarios
//Visualizar CRUD
$routes->get('/usuario_logueado', 'usuario_controller::ver_usuarios',['filter' => 'auth']);
//Borrar un usuario según ID
$routes->get('us_borrar/(:num)', 'usuario_controller::us_deletelogico/$1',['filter' => 'auth']);
//Visualizar lista de Eliminados
$routes->get('/us_eliminados', 'usuario_controller::usuarios_eliminados',['filter' => 'auth']);
//Editar, activar y actualizar un usuario según ID
$routes->get('us_editar/(:num)', 'usuario_controller::singleUser/$1', ['filter' => 'auth']);
$routes->get('us_activar/(:num)', 'usuario_controller::activar/$1',['filter' => 'auth']);
$routes->post('us_modifica/(:num)', 'usuario_controller::update/$1', ['filter' => 'auth']);



//CONSULTAS - CRUD consultas
$routes->get('contacto', 'consulta_controller::create');
$routes->post('consulta-form', 'consulta_controller::formValidate');
$routes->get('/ver_consultas', 'consulta_controller::ver_consultas');
$routes->get('/atender(:num)', 'consulta_controller::atender_consulta/$1');
//Visualizar lista de consultas ya respondidas y eliminarlas definitivamente
$routes->get('/con_respondidas', 'consulta_controller::con_respondidas');
$routes->get('/con_borrar(:num)', 'consulta_controller::borrar_consulta/$1');


// PRODUCTO - CRUD Productos
//Visualizar CRUD de Productos
$routes->get('/crear', 'producto_controller::index', ['filter' => 'auth']);
//Registrar un producto con formulario 
$routes->get('/produ-form', 'producto_controller::crea_producto', ['filter' => 'auth']);
$routes->post('/enviar-prod', 'producto_controller::formValidation', ['filter' => 'auth']);
//Editar Producto
$routes->get('/editar(:num)', 'producto_controller::singleproducto/$1', ['filter' => 'auth']);
$routes->post('modifica/(:num)', 'producto_controller::actualizarPro/$1', ['filter' => 'auth']);
//Borrar, visualizar lista de productos eliminados, activarlos
$routes->get('borrar/(:num)', 'producto_controller::deletelogico/$1',['filter' => 'auth']);
$routes->get('/eliminados', 'producto_controller::eliminados_prod', ['filter' => 'auth']);
$routes->get('activar_pro/(:num)', 'producto_controller::activarproducto/$1', ['filter' => 'auth']);


//CARRITO
//Visualizar catálogo y carrito respectivamente
$routes->get('/todos_p', 'cart_controller::catalogo', ['filter'=>'auth']);
$routes->get('/muestro', 'cart_controller::muestra', ['filter'=> 'auth']);
//Acciones principales
$routes->get('/carrito_actualiza', 'cart_controller::actualiza_carrito', ['filter' =>'auth']);
$routes->post('/carrito_agrega', 'cart_controller::add', ['filter'=>'auth']);
$routes->get('carrito_elimina/(:any)', 'cart_controller::remove/$1', ['filter'=>'auth']);
$routes->get('/borrar', 'cart_controller::borrar_carrito', ['filter'=>'auth']);
$routes->get('/carrito_comprar', 'venta_controller::registrar_venta', ['filter'=>'auth']);

//Rutas del Perfil Cliente para ver sus compras y detalle
$routes->get('/vista_compras/(:num)', 'venta_controller::ver_factura/$1', ['filter'=>'auth']);
$routes->get('/ver_factura_usuario/(:num)', 'venta_controller::ver_factura_usuario/$1', ['filter'=>'auth']);
$routes->get('/mis_compras', 'venta_controller::listar_ventas');


//Ruta del Perfil Administrador para ver todas las ventas con sus detalles
$routes->get('/ventas', 'venta_controller::index');


// SINTAXIS $routes->get('/nombreRuta', 'controlador::nombreFuncion');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
