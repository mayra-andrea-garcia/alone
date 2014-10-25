<?php
/** 
*Controlador de Vehiculos
*@author Mayra Garcia
*@version 1.0
*/
class ControladorVehiculo
{
	public $modelo;

	function __construct()
	{
		/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*@param No recibe
		*@throws No se generan excepciones
		*/
<<<<<<< HEAD
		require_once('Controlador/ValidadorSesion.php');
		require_once('Modelo/ModeloVehiculo.php');
		require_once('Controlador/SanitizadorDatos.php');
=======
<<<<<<< HEAD
		require_once('Modelo/ModeloVehiculo.php');
		require_once('Controlador/SanitizadorDatos.php');
=======
		require('Modelo/ModeloVehiculo.php');
		require('Controlador/SanitizadorDatos.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$this->modelo = new ModeloVehiculo();
	}

	function __set($modelo, $valor)
	{
		/**
		*Modifica el valor de Modelo
		*@param $modelo tipo Object
		*@param $valor tipo String
		*/
		$this->modelo = $modelo;
	}

	function __get($modelo)
	{
		/**
		*Retorna el valor de Modelo
		*@param $modelo tipo Object
		*@return $modelo tipo Object
		*/
		return $modelo;
	}

	function run()
	{
		/**
		*La entrada a la clase, se ejecuta segun la actividad
		*@param No contiene
		*@return No retorna valor
		*@throws No lleva excepciones
<<<<<<< HEAD
		*/	$act = $_GET['actividad'];
			switch ($act) {
				case 'crear':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$this->crear();
						}
						else
						{
							require_once('Vista/Permisos.php');
						}
					}
					else
					{
						require_once('Vista/Login.php');
					}	
					break;
				case 'listar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado()||
							ValidadorSesion::esCliente())
						{
							$this->listar();
						}
						else
						{
							require_once('Vista/Permisos.php');
						}
					}
					else
					{
						require_once('Vista/Login.php');
					}	
					break;
				case 'eliminar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$this->eliminar();
						}
						else
						{
							require_once('Vista/Permisos.php');
						}
					}
					else
					{
						require_once('Vista/Login.php');
					}	
					break;
				case 'modificar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpelado())
						{
							$this->modificar();
						}
						else
						{
							require_once('Vista/Permisos.php');
						}
					}
					else
					{
						require_once('Vista/Login.php');
					}	
					$this->modificar();
					break;
				case 'listarFecha':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado() ||
							ValidadorSesion::esCliente())
						{
							$this->listarFecha();
						}
						else
						{
							require_once('Vista/Permisos.php');
						}
					}
					else
					{
						require_once('Vista/Login.php');
					}	
					break;
				default:
					print 'Error: La activdad: '.$act.' no existe porfavor intente con otra';
=======
<<<<<<< HEAD
		*/	$act = $_GET['actividad'];
			switch ($act) {
=======
		*/
			switch ($_GET['actividad']) {
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
				case 'crear':
					$this->crear();
					break;
				case 'listar':
					$this->listar();
					break;
				case 'eliminar':
					$this->eliminar();
					break;
				case 'modificar':
					$this->modificar();
					break;
<<<<<<< HEAD
				case 'listarFecha':
					 $this->listarFecha();
					 break;
				default:
					print 'Error: La activdad: '.$act.' no existe porfavor intente con otra';
=======
				default:
					echo 'Error: Esa actividad no existe';
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
					break;
			}
	}

<<<<<<< HEAD
	private function crear()
	{
=======
<<<<<<< HEAD
	private function crear()
	{
=======
	private function crear(){
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		/**
		*Crea un Vehiculo
		*@param No contiene
		*@return No retorna valor
		*/
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d', $timestamp = time());
		$dia = date('l', $timestamp);

<<<<<<< HEAD
=======
=======
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$marca = SanitizadorDatos::validaTexto($_POST['marca']);
		$tipo = SanitizadorDatos::validaTexto($_POST['tipo']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$modelo = SanitizadorDatos::validaNumero($_POST['modelo']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		$result = $this->modelo->crear($vin, $marca, $tipo, $modelo, $fecha, $dia, $numEmpleado);
<<<<<<< HEAD
=======
=======
		$modelo = SanitizadorDatos::validaM($_POST['modelo']);

		$result = $this->modelo->crear($vin, $marca, $tipo, $modelo);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d

		//Revisa si se creo el Vehiculo
		if(isset($result))
		{
			//carga la vista
<<<<<<< HEAD
			require_once('Vista/CrearVehiculo.php');
=======
<<<<<<< HEAD
			require_once('Vista/CrearVehiculo.php');
=======
			require('Vista/CrearVehiculo.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: No se pudo crear el vehiculo';
		}
	}

	private function listar()
	{
		/**
		*Metodo que lista un Vehiculo
		*@param no contiene 
		*@return no retorna
		*/	
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$band = SanitizadorDatos::cadenaVacia($vin);

		if($band)
		{
			$result = $this->modelo->listar($vin);
		}	
		else
		{
			unset($result);
		}
<<<<<<< HEAD
=======
=======

		$result = $this->modelo->listar($vin);

>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		///Revisa si se puede listar el vehiculo
		if(isset($result))
		{
			//carga la vista
<<<<<<< HEAD
			require_once('Vista/ListaVehiculo.php');
=======
<<<<<<< HEAD
			require_once('Vista/ListaVehiculo.php');
=======
			require('Vista/ListaVehiculo.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: El vehiculo no existe';
		}
	}

	private function modificar()
	{
		/**
		*Modifica un Vehiculo
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$Nmarca = SanitizadorDatos::validaTexto($_POST['marca']);
		$Ntipo = SanitizadorDatos::validaTexto($_POST['tipo']);
		$Nmodelo = SanitizadorDatos::validaNumero($_POST['modelo']);

<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$result = $this->modelo->modificar($vin, $Nmarca, $Ntipo, $Nmodelo);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
			//carga la vista
<<<<<<< HEAD
			require_once('Vista/ModificaVehiculo.php');
=======
<<<<<<< HEAD
			require_once('Vista/ModificaVehiculo.php');
=======
			require('Vista/ModificaVehiculo.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: El vehiculo no existe';
		}
	}

	private function eliminar()
	{
		/**
		*Elimina una unbicacion
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);

		$result = $this->modelo->eliminar($vin);

		//Revisa si se realizo la eliminacion
		if(isset($result))
		{
			//carga la vista
<<<<<<< HEAD
			require_once('Vista/EliminaVehiculo.php');
=======
<<<<<<< HEAD
			require_once('Vista/EliminaVehiculo.php');
=======
			require('Vista/EliminaVehiculo.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: El vehiculo no existe';
		}
	}

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
	private function listarFecha()
	{
		/**
		*Lista Fechas dependiendo de la opcion del Usuario
		*contiene 2 opciones:
		*opcion_1: Lista Vehiculos en un Rango de Fechas
		*opcion_2: Programa un Vehiculo conforme a los dias que se indique
		*Considerando tambien que los dias Habiles solo son de Lunes a Viernes
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		date_default_timezone_set('America/Mexico_City');
		$fecha = SanitizadorDatos::validaFecha($_POST['fecha']);
		$rangoInicio = SanitizadorDatos::validaFecha($_POST['rangoInicio']);
		$rangoFin = SanitizadorDatos::validaFecha($_POST['rangoFin']);
		$numDias = SanitizadorDatos::validaNumero($_POST['numDias']);
		$op = SanitizadorDatos::validaTexto($_POST['op']);
		
		//Se consigue el dia que pertenece a la fecha 
		//Del rango proporcionado por el usuario 
		$dia = date('l', strtotime($rangoInicio));
		
		switch($op)
		{
			case 'rango': if(($dia != 'Sunday' && $dia != 'Saturday'))
						  {
						  	date_default_timezone_set('America/Mexico_City');
						  	$rango = new dateTime("$rangoInicio");
						  	$fecha = $rango->format('Y-m-d');
						  	$dia = date('l', strtotime($rango->format('Y-m-d')));
						  	$result = $this->modelo->listarRangoFecha($fecha);
							while($rangoFin != $fecha)
						 	{	
						 		//$rango->add(new DateInterval('P01D'));			 			
						  		//$fecha = $rango->format('Y-m-d');
						 		if($dia != 'Saturday' && $dia != 'Sunday')
						 		{
						 			$rango->add(new DateInterval('P01D'));
						 			$fecha = $rango->format('Y-m-d');
						 			$dia = date('l', strtotime($fecha));
						 			if($dia == 'Saturday')
						 			{
						 				$rango->add(new DateInterval('P02D'));
						 				$fecha = $rango->format('Y-m-d');
						 				$dia = date('l', strtotime($fecha));
						 				$result =  $this->modelo->listarRangoFecha($fecha);			 			
						 			}
						 			else
						 			{
						 				$result =  $this->modelo->listarRangoFecha($fecha);			 			
						 			}
						 		}
						 		else
						 		{
						 			print 'El dia no existe';
						 		}
						  	}
						  }	
						  else
						  {
						  	print 'Recuerda que los Sabados y Domingos no se Labora';
						  }	
						  if(isset($result))
						  {
						  	require_once('Vista/ListaRangoFecha.php');
						  }				  
						  break;
			case 'dias': if(($dia != 'Sunday' && $dia != 'Saturday'))
						 {
						 	date_default_timezone_set('America/Mexico_City');
					     	$fecha = date('Y-m-d', $timestamp = time());
						 	$fec = new dateTime($fecha);
						 	$fec->add(new DateInterval('P'.$numDias.'D'));
						 	$dia = date('l', strtotime($fec->format('Y-m-d')));
						 	if($dia != 'Saturday' && $dia != 'Sunday')
						 	{
						 		$aux = $fec->format('Y-m-d');
						 		$result = $this->modelo->listarDiasSumados($aux, $dia);
						 	}
						 	else if($dia == 'Saturday')
						 	{
						 		$fec->add(new DateInterval('P02D'));
						 		$aux = $fec->format('Y-m-d');
						 		$dia = date('l', strtotime($fec->format('Y-m-d')));
						 		$result = $this->modelo->listarDiasSumados($aux, $dia);
						 	}
						 	else if($dia == 'Sunday')
						 	{
						 		$fec->add(new DateInterval('P01D'));
						 		$aux = $fec->format('Y-m-d');
						 		$dia = date('l', strtotime($fec->format('Y-m-d')));
						 		$result = $this->modelo->listarDiasSumados($aux, $dia);
						 	}
						 	else
						 	{
						 		print 'El dia no existe';
						 	}
						 }
						 else
						 {
						 	print 'Hoy es Sabado no Deberías estar trabajando Hoy';
						 }
						 if(isset($result))
						  {
						  	require_once('Vista/ListaSumaDias.php');
						  }				  
						  break;
				 default: print 'Lo Siento la OP: '.$op.' no existe';
						  print '<br/>';
						  break;
		}

	}

<<<<<<< HEAD
=======
=======
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
}

?>
