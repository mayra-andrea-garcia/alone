<?php

switch($_GET['control'])
{
	case 'usuario':
		//crear y ejecutar controlador
<<<<<<< HEAD
		require_once('Controlador/ControladorUsuario.php');
=======
		require('Controlador/ControladorUsuario.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
		//crear el objeto
		$control = new ControladorUsuario();
		$control->run();
		break;
	case 'vehiculo':
<<<<<<< HEAD
		require_once('Controlador/ControladorVehiculo.php');
=======
		require('Controlador/ControladorVehiculo.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
		$control = new ControladorVehiculo();
		$control->run();
		break;
	case 'inventario':
<<<<<<< HEAD
		require_once('Controlador/ControladorInventario.php');
		$control = new ControladorInventario();
		$control->run();
	case 'ubicacion':
		require_once('Controlador/ControladorUbicacion.php');
=======
		require('Controlador/ControladorInventario.php');
		$control = new ControladorInventario();
		$control->run();
	case 'ubicacion':
		require('Controlador/ControladorUbicacion.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
		$control = new ControladorUbicacion();
		$control->run();
		break;
	default: print 'Error: No existe el controlador';
	    break;

}


