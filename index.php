<?php

<<<<<<< HEAD
session_start();


=======
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
switch($_GET['control'])
{
	case 'usuario':
		//crear y ejecutar controlador
<<<<<<< HEAD
		require('Controlador/ControladorUsuario.php');
=======
<<<<<<< HEAD
		require_once('Controlador/ControladorUsuario.php');
=======
		require('Controlador/ControladorUsuario.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		//crear el objeto
		$control = new ControladorUsuario();
		$control->run();
		break;
	case 'vehiculo':
<<<<<<< HEAD
		require('Controlador/ControladorVehiculo.php');
=======
<<<<<<< HEAD
		require_once('Controlador/ControladorVehiculo.php');
=======
		require('Controlador/ControladorVehiculo.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$control = new ControladorVehiculo();
		$control->run();
		break;
	case 'inventario':
<<<<<<< HEAD
=======
<<<<<<< HEAD
		require_once('Controlador/ControladorInventario.php');
		$control = new ControladorInventario();
		$control->run();
	case 'ubicacion':
		require_once('Controlador/ControladorUbicacion.php');
=======
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		require('Controlador/ControladorInventario.php');
		$control = new ControladorInventario();
		$control->run();
	case 'ubicacion':
		require('Controlador/ControladorUbicacion.php');
<<<<<<< HEAD
		$control = new ControladorUbicacion();
		$control->run();
		break;
	case 'login':
	     require('Controlador/ControladorLogin.php');
	     $control = new ControladorLogin();
	     $control->run(); 
		 break;
=======
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
		$control = new ControladorUbicacion();
		$control->run();
		break;
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
	default: print 'Error: No existe el controlador';
	    break;

}


