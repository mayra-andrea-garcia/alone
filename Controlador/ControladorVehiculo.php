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
		require_once('Controlador/ValidadorSesion.php');
		require_once('Modelo/ModeloVehiculo.php');
		require_once('Controlador/SanitizadorDatos.php');
		$this->modelo = new ModeloVehiculo();
	}
	/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*@param No recibe
		*@throws No se generan excepciones
		*/

	function __set($modelo, $valor)
	{
		$this->modelo = $modelo;
	}
	/**
		*Modifica el valor de Modelo
		*@param $modelo tipo Object
		*@param $valor tipo String
		*/

	function __get($modelo)
	{
		return $modelo;
	}
	/**
		*Retorna el valor de Modelo
		*@param $modelo tipo Object
		*@return $modelo tipo Object
		*/

	function run()
	{
		$act = $_GET['actividad'];
			switch ($act) {
				case 'crearVehiculo':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/CrearVehiculo.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario'] , $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
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
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
				case 'listarVehiculo':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado()||
							ValidadorSesion::esCliente())
						{
							$vista = file_get_contents('Vista/ListaVehiculo.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario'] , $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
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
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
				case 'eliminarVehiculo':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/EliminarVehiculo.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario'], $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
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
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
				case 'modificarVehiculo':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpelado())
						{
							$vista = file_get_contents('Vista/ModificaVehiculo.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario'] , $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
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
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
				case 'listarFechaVehiculo':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado() ||
							ValidadorSesion::esCliente())
						{
							$vista = file_get_contents('Vista/ListaFecha.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario'] , $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
				default:
					print 'Error: La activdad: '.$act.' no existe porfavor intente con otra';
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
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
				case 'buscar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado() ||
							ValidadorSesion::esCliente())
						{
							$this->buscar();
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
						}
					}
					else
					{
						require_once('Vista/Login.html');
					}	
					break;
				default:
					print 'Error: La activdad: '.$act.' no existe porfavor intente con otra';
					break;
			}
	}
	/**
		*La entrada a la clase, se ejecuta segun la actividad
		*@param No contiene
		*@return No retorna valor
		*@throws No lleva excepciones
		*/

	private function crear()
	{
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d', $timestamp = time());
		$dia = date('l', $timestamp);

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$marca = SanitizadorDatos::validaTexto($_POST['marca']);
		$tipo = SanitizadorDatos::validaTexto($_POST['tipo']);
		$modelo = SanitizadorDatos::validaNumero($_POST['modelo']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		$result = $this->modelo->crear($vin, $marca, $tipo, $modelo, $fecha, $dia, $numEmpleado);

		//Revisa si se creo el Vehiculo
		if(isset($result))
		{
			$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
			                    '{marca}'=>$this->modelo->datos['marca'],
			                    '{tipo}'=>$this->modelo->datos['tipo'],
			                    '{modelo}'=>$this->modelo->datos['modelo'],
			                    '{numEmpleado}'=>$this->modelo->datos['num_empleado'],
			                    '{nombre_sesion}'=>$_SESSION['usuario']);
			$vista = file_get_contents('Vista/VehiculoCreado.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require_once('Vista/VehiculoYaExiste.html');
		}
	}
	/**
		*Crea un Vehiculo
		*@param No contiene
		*@return No retorna valor
		*/

	private function buscar()
	{
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$band = SanitizadorDatos::cadenaVacia($vin);

		if($band)
		{
			$result = $this->modelo->listar($vin);
		}	
		else
		{
			unset($result);
		}
		///Revisa si se puede listar el vehiculo
		if(isset($result))
		{
			$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
			                    '{marca}'=>$this->modelo->datos['marca'],
			                    '{tipo}'=>$this->modelo->datos['tipo'],
			                    '{modelo}'=>$this->modelo->datos['modelo'],
			                    '{numEmpleado}'=>$this->modelo->datos['num_empleado'],
			                    '{nombre_sesion}'=>$_SESSION['usuario'],
			                    '{fecha}'=>$this->modelo->datos['fecha']);
			$vista = file_get_contents('Vista/VehiculoBuscadoAModificar.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require_once('Vista/VehiculoNoEncontrado.html');
		}
	}

	private function listar()
	{	
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$band = SanitizadorDatos::cadenaVacia($vin);

		if($band)
		{
			$result = $this->modelo->listar($vin);
		}	
		else
		{
			unset($result);
		}
		///Revisa si se puede listar el vehiculo
		if(isset($result))
		{
			$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
			                    '{marca}'=>$this->modelo->datos['marca'],
			                    '{tipo}'=>$this->modelo->datos['tipo'],
			                    '{modelo}'=>$this->modelo->datos['modelo'],
			                    '{numEmpleado}'=>$this->modelo->datos['num_empleado'],
			                    '{nombre_sesion}'=>$_SESSION['usuario'],
			                    '{fecha}'=>$this->modelo->datos['fecha']);
			$vista = file_get_contents('Vista/VehiculoEncontrado.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require_once('Vista/VehiculoNoEncontrado.html');
		}
	}
	/**
		*Metodo que lista un Vehiculo
		*@param no contiene 
		*@return no retorna
		*/

	private function modificar()
	{
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$Nmarca = SanitizadorDatos::validaTexto($_POST['marca']);
		$Ntipo = SanitizadorDatos::validaTexto($_POST['tipo']);
		$Nmodelo = SanitizadorDatos::validaNumero($_POST['modelo']);


		$result = $this->modelo->modificar($vin, $Nmarca, $Ntipo, $Nmodelo);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
			$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
			                    '{marca}'=>$this->modelo->datos['marca'],
			                    '{tipo}'=>$this->modelo->datos['tipo'],
			                    '{modelo}'=>$this->modelo->datos['modelo'],
			                    '{numEmpleado}'=>$this->modelo->datos['numEmpleado'],
			                    '{nombre_sesion}'=>$_SESSION['usuario'],
			                    '{fecha}'=>$this->modelo->datos['fecha']);
			$vista = file_get_contents('Vista/VehiculoModificado.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require_once('Vista/VehiculoNoEncontrado.html');
		}
	}
	/**
		*Modifica un Vehiculo
		*@param No contiene
		*@return No retorna valor
		*/

	private function eliminar()
	{
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);

		$result = $this->modelo->eliminar($vin);

		//Revisa si se realizo la eliminacion
		if(isset($result))
		{
			//carga la vista
			require_once('Vista/VehiculoEliminado.html');
		}
		else
		{
			require_once('Vista/VehiculoNoEncontrado.html');
		}
	}
	/**
		*Elimina una unbicacion
		*@param No contiene
		*@return No retorna valor
		*/

	private function listarFecha()
	{
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
						 			require_once('Vista/DiaInexistente.html');
						 		}
						  	}
						  }	
						  else
						  {
						  	require_once('DiasHabiles.html');
						  }	
						  if(isset($result))
						  {
							$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
							                    '{marca}'=>$this->modelo->datos['marca'],
							                    '{tipo}'=>$this->modelo->datos['tipo'],
							                    '{modelo}'=>$this->modelo->datos['modelo'],
							                    '{numEmpleado}'=>$this->modelo->datos['numEmpleado'],
							                    '{nombre_sesion}'=>$_SESSION['usuario'],
							                    '{fecha}'=>$this->modelo->datos['fecha']);
							$vista = file_get_contents('Vista/ListaRangoFecha.html');
							foreach ($diccionario as $dato => $significado) {
								$vista =str_replace( $dato, $significado , $vista);
							}
							echo $vista;
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
						 		require_once('Vista/DiaInexistente.html');
						 	}
						 }
						 else
						 {
						 	require_once('Vista/DiasHabiles.html');
						 }
						 if(isset($result))
						  {	
							$diccionario = array('{nombre_sesion}'=>$_SESSION['usuario'],
							                    '{fecha}'=>$this->modelo->datos['fechaFinal']);
							$vista = file_get_contents('Vista/ListaSumaDias.html');
							foreach ($diccionario as $dato => $significado) {
								$vista =str_replace( $dato, $significado , $vista);
							}
							echo $vista;
						  }				  
						  break;
				 default: print 'Lo Siento la OP: '.$op.' no existe';
						  print '<br/>';
						  break;
		}/**
		*Lista Fechas dependiendo de la opcion del Usuario
		*contiene 2 opciones:
		*opcion_1: Lista Vehiculos en un Rango de Fechas
		*opcion_2: Programa un Vehiculo conforme a los dias que se indique
		*Considerando tambien que los dias Habiles solo son de Lunes a Viernes
		*@param No contiene
		*@return No retorna valor
		*/

	}

}

?>
