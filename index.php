<?php

switch($_GET['control'])
{
	case 'usuario':
		//crear y ejecutar controlador
		require_once('Controlador/ControladorUsuario.php');
		//crear el objeto
		$control = new ControladorUsuario();
		$control->run();
		break;
	case 'vehiculo':
		require_once('Controlador/ControladorVehiculo.php');
		$control = new ControladorVehiculo();
		$control->run();
		break;
	case 'inventario':
		require_once('Controlador/ControladorInventario.php');
		$control = new ControladorInventario();
		$control->run();
	case 'ubicacion':
		require_once('Controlador/ControladorUbicacion.php');
		$control = new ControladorUbicacion();
		$control->run();
		break;
	default: print 'Error: No existe el controlador';
	    break;

}


