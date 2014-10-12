<?php

session_start();


switch($_GET['control'])
{
	case 'usuario':
		//crear y ejecutar controlador
		require('Controlador/ControladorUsuario.php');
		//crear el objeto
		$control = new ControladorUsuario();
		$control->run();
		break;
	case 'vehiculo':
		require('Controlador/ControladorVehiculo.php');
		$control = new ControladorVehiculo();
		$control->run();
		break;
	case 'inventario':
		require('Controlador/ControladorInventario.php');
		$control = new ControladorInventario();
		$control->run();
	case 'ubicacion':
		require('Controlador/ControladorUbicacion.php');
		$control = new ControladorUbicacion();
		$control->run();
		break;
	case 'login':
	     require('Controlador/ControladorLogin.php');
	     $control = new ControladorLogin();
	     $control->run(); 
		 break;
	default: print 'Error: No existe el controlador';
	    break;

}


