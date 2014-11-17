<?php
/** 
*Controlador de Ubicacion
*@author Mayra Garcia
*@version 1.0
*/
class ControladorUbicacion
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
		require_once('Modelo/ModeloUbicacion.php');
		require_once('Controlador/SanitizadorDatos.php');
=======
<<<<<<< HEAD
		require_once('Controlador/ValidadorSesion.php');
		require_once('Modelo/ModeloUbicacion.php');
		require_once('Controlador/SanitizadorDatos.php');
=======
		require('Modelo/ModeloUbicacion.php');
		require('Controlador/SanitizadorDatos.php');
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$this->modelo = new ModeloUbicacion();
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
		*/
			switch ($_GET['actividad']) 
			{
<<<<<<< HEAD
				case 'listarUbicacion':
				 	if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()|| 
						   ValidadorSesion::esEmpleado() || 
						   ValidadorSesion::esCliente())
						{
							$vista = file_get_contents('Vista/ListaUbicacion.html');
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

				case 'listar':
=======
				case 'listar':
<<<<<<< HEAD
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()|| 
						   ValidadorSesion::esEmpleado() || 
						   ValidadorSesion::esCliente())
						{
							$this->listar();
						}
						else
						{
<<<<<<< HEAD
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
				case 'eliminarUbicacion':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()||
							ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/EliminaUbicacion.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario'] , $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
=======
							require_once('Vista/Permisos.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
						}
					}
					else
					{
<<<<<<< HEAD
						require_once('Vista/Login.html');
					}	
					break;

=======
						require_once('Vista/Login.php');
					}	
					break;
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
				case 'eliminar':
				     if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()||
							ValidadorSesion::esEmpleado())
						{
							$this->eliminar();
						}
						else
						{
<<<<<<< HEAD
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
=======
							require_once('Vista/Permisos.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
						}
					}
					else
					{
<<<<<<< HEAD
						require_once('Vista/Login.html');
					}	
					break;
				case 'modificarUbicacion':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()|| 
						   ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/ModificaUbicacion.html');
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
=======
						require_once('Vista/Login.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					}	
					break;
				case 'modificar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()|| 
						   ValidadorSesion::esEmpleado())
						{
							$this->modificar();
						}
						else
						{
<<<<<<< HEAD
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
=======
							require_once('Vista/Permisos.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
						}
					}
					else
					{
<<<<<<< HEAD
						require_once('Vista/Login.html');
					}	
					break;
				case 'agregarUbicacion':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/AgregarUbicacion.html');
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
=======
						require_once('Vista/Login.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					}	
					break;
				case 'agregar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$this->agregar();
						}
						else
						{
<<<<<<< HEAD
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
=======
							require_once('Vista/Permisos.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
						}
					}
					else
					{
<<<<<<< HEAD
						require_once('Vista/Login.html');
					}	
=======
						require_once('Vista/Login.php');
					}	
=======
					$this->listar();
					break;
				case 'eliminar':
					$this->eliminar();
					break;
				case 'modificar':
					$this->modificar();
					break;
				case 'agregar':
					$this->agregar();
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					break;
				default:
					echo 'Error: La actividad no existe';
					break;
			}
	}

	public function listar()
	{
		/**
		*Metodo que lista una Ubicacion 
		*@param no contiene 
		*@return no retorna
		*/	

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		
		$result = $this->modelo->listar($vin);

		//Revisa si se puede listar la ubicacion
		if(isset($result))
<<<<<<< HEAD
		{	
			$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
			                    '{ubicacion}'=>$this->modelo->datos['ubicacion'],
			                    '{subUbicacion}'=>$this->modelo->datos['subUbicacion'],
			                    '{nombre_sesion}'=>$_SESSION['usuario']);
			$vista = file_get_contents('Vista/UbicacionEncontrada.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require('Vista/UbicacionInexistente.html');
=======
		{
			//carga la vista
			require('Vista/ListaUbicacion.php');
		}
		else
		{
			echo 'Error: la Ubicacion no existe';
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		}
	}

	public function agregar()
	{
		/**
		*Agrega una Ubicación
		*@param No contiene
		*@return No retorna valor
		*/
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$ubicacion = SanitizadorDatos::validaTexto($_POST['ubicacion']);
		$subUbicacion = SanitizadorDatos::ValidaTexto($_POST['subUbicacion']);

		$result = $this->modelo->crear($vin, $ubicacion, $subUbicacion);

		//Revisa si la ubicacion se agregó
		if(isset($result))
		{
<<<<<<< HEAD
			$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
			                    '{ubicacion}'=>$this->modelo->datos['ubicacion'],
			                    '{subUbicacion}'=>$this->modelo->datos['subUbicacion'],
			                    '{nombre_sesion}'=>$_SESSION['usuario']);
			$vista = file_get_contents('Vista/UbicacionEncontrada.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require('Vista/UbicacionNoAgregada.html');
=======
			//carga la vista
			require('Vista/AgregarUbicacion.php');
		}
		else
		{
			echo 'Error: La ubicacion no se pudo agregar';
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		}
	}

	public function modificar()
	{
		/**
		*Modifica una Ubicacion
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$ubicacion = SanitizadorDatos::validaTexto($_POST['ubicacion']);
		$subUbicacion = SanitizadorDatos::validaTexto($_POST['subUbicacion']);


		$result = $this->modelo->modificar($vin, $ubicacion, $subUbicacion);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
<<<<<<< HEAD
			$diccionario = array('{vin}'=>$this->modelo->datos['vin'],
			                    '{ubicacion}'=>$this->modelo->datos['ubicacion'],
			                    '{subUbicacion}'=>$this->modelo->datos['subUbicacion'],
			                    '{nombre_sesion}'=>$_SESSION['usuario']);
			$vista = file_get_contents('Vista/UbicacionModificada.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require('Vista/UbicacionInexistente.html');
=======
			//carga la vista
			require('Vista/ModificaUbicacion.php');
		}
		else
		{
			echo 'Error: La ubicacion no se encontro';
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		}
	}

	public function eliminar()
	{
		/**
		*Elimina una Ubicacion
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
			require('Vista/UbicacionEliminada.html');
		}
		else
		{
			echo require('Vista/UbicacionInexistente.html');
=======
			require('Vista/EliminaUbicacion.php');
		}
		else
		{
			echo 'Error: La ubicacion ya no existe';
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		}
	}
}

?>