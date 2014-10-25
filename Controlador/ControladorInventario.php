<?php
/** 
*Controlador de Inventario
*@author Mayra Garcia
*@version 1.0
*/

class ControladorInventario
{
	private $modelo;
	private $modeloUsuario;
	private $modeloVehiculo;
	private $modeloUbicacion;
	

	function __construct()
	{
		/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*@param string
		*@throws No se generan excepciones
		*/
<<<<<<< HEAD
		require_once('Controlador/ValidadorSesion.php');
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		require_once('Modelo/ModeloUsuario.php');
		require_once('Modelo/ModeloInventario.php');
		require_once('Modelo/ModeloVehiculo.php');
		require_once('Modelo/ModeloUbicacion.php');
		require_once('Controlador/SanitizadorDatos.php');
<<<<<<< HEAD
=======
=======
		require('Modelo/ModeloUsuario.php');
		require('Modelo/ModeloInventario.php');
		require('Modelo/ModeloVehiculo.php');
		require('Modelo/ModeloUbicacion.php');
		require('Controlador/SanitizadorDatos.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$this->modelo = new ModeloInventario();
		$this->modeloUsuario = new ModeloUsuario();
		$this->modeloVehiculo = new ModeloVehiculo();
		$this->modeloUbicacion = new ModeloUbicacion();
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

<<<<<<< HEAD
=======
	/*function __set($modeloUsuario, $valor)
	{
		/**
		*Modifica el valor de ModeloUsuario
		*@param $modelo tipo Object
		*@param $valor tipo String
		
		$this->modeloUsuario = $modeloUsuario;
	}

	function __get($modeloUsuario)
	{
		/**
		*Retorna el valor de ModeloUsuario
		*@param $modelo tipo Object
		*@return $modelo tipo Object
		
		return $modeloUsuario;
	}

	function __set($modeloUbicacion, $valor)
	{
		/**
		*Modifica el valor de ModeloUbicacion
		*@param $modelo tipo Object
		*@param $valor tipo String
		
		$this->modeloUbicacion = $modeloUbicacion;
	}

	function __get($modeloUbicacion)
	{
		/**
		*Retorna el valor de ModeloUbicacion
		*@param $modelo tipo Object
		*@return $modelo tipo Object
		
		return $modeloUbicacion;
	}

	function __set($modeloVehiculo, $valor)
	{
		/**
		*Modifica el valor de ModeloVehiculo
		*@param $modelo tipo Object
		*@param $valor tipo String
		
		$this->modeloVehiculo = $modeloVehiculo;
	}

	function __get($modeloVehiculo)
	{
		/**
		*Retorna el valor de ModeloVehiculo
		*@param $modelo tipo Object
		*@return $modelo tipo Object
		
		return $modeloVehiculo;
	}*/
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d


	function run()
	{
		/**
		*La entrada a la clase, se ejecuta segun la actividad
		*@param No contiene
		*@return No retorna valor
		*@throws No lleva excepciones
		*/

			switch ($_GET['actividad']) {
				case 'listar':
<<<<<<< HEAD
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
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
						if(ValidadorSesion::esAdmin())
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
							ValidadorSesion::esEmpleado())
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
=======
					$this->listar();
					break;
				case 'agregar':
					$this->agregar();
					break;
				case 'eliminar':
					$this->eliminar();
					break;
				case 'modificar':
					$this->modificar();
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
					break;
				default:
					echo 'Error: Esa Actividad no existe';
					break;
		    }
	}

	public function listar()
	{
		/**
		*Metodo que lista el Inventario 
		*@param no contiene 
		*@return no retorna
		*/	
		
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
				
		$resultVehiculo = $this->modeloVehiculo->listar($vin);
		$resultInventario = $this->modelo->listar($vin);
		$resultUsuario = $this->modeloUsuario->listar($numEmpleado);
		$resultUbicacion = $this->modeloUbicacion->listar($vin);
		//Revisa si se puede listar el usuario 
		if(isset($resultInventario) && 
		   isset($resultVehiculo) &&
		   isset($resultUsuario))
		{
			//carga la vista
<<<<<<< HEAD
			require_once('Vista/ListaInventario.php');
=======
<<<<<<< HEAD
			require_once('Vista/ListaInventario.php');
=======
			require('Vista/ListaInventario.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: el vehiculo en el inventario no existe';
		}
	}

	public function agregar()
	{
		/**
		*Agrega un vehiculo al usuario
		*@param No contiene
		*@return No retorna valor
		*/
		
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$kilometraje = SanitizadorDatos::validaNumero($_POST['kilometraje']);
		$combustible = SanitizadorDatos::validaNumero($_POST['combustible']);
		$golpe = SanitizadorDatos::validaTexto($_POST['golpe']);
		$severidad = SanitizadorDatos::validaTexto($_POST['severidad']);
		$piezaGolpeada = SanitizadorDatos::validaTexto($_POST['piezaGolpeada']);
<<<<<<< HEAD
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		$result = $this->modelo->agregar($numEmpleado,$vin, $kilometraje, 
=======
<<<<<<< HEAD
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		$result = $this->modelo->agregar($numEmpleado,$vin, $kilometraje, 
=======

		$result = $this->modelo->agregar($vin, $kilometraje, 
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
										 $combustible, $golpe, 
										 $severidad, $piezaGolpeada);

		//Revisa si se creo el usuario
		if(isset($result))
		{
			//carga la vista
<<<<<<< HEAD
			require_once('Vista/AgregarInventario.php');
=======
<<<<<<< HEAD
			require_once('Vista/AgregarInventario.php');
=======
			require('Vista/AgregarInventario.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: el vehiculo no se a podido agregar';
		}
	}

	public function modificar()
	{	
		/**
		*Modifica un Vehiculo en el inventario
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$kilometraje = SanitizadorDatos::validaNumero($_POST['kilometraje']);
		$combustible = SanitizadorDatos::validaNumero($_POST['combustible']);
		$golpe = SanitizadorDatos::validaTexto($_POST['golpe']);
		$severidad = SanitizadorDatos::validaTexto($_POST['severidad']);
		$piezaGolpeada = SanitizadorDatos::validaTexto($_POST['piezaGolpeada']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
		
		$result = $this->modelo->modificar($vin, $kilometraje,  
		               					   $combustible, $golpe,
		               					   $severidad, $piezaGolpeada,$numEmpleado);
<<<<<<< HEAD
=======
=======
		
		$result = $this->modelo->modificar($vin, $kilometraje,  
		               					   $combustible, $golpe,
		               					   $severidad, $piezaGolpeada);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
			//carga la vista
<<<<<<< HEAD
			require_once('Vista/ModificaInventario.php');
=======
<<<<<<< HEAD
			require_once('Vista/ModificaInventario.php');
=======
			require('Vista/ModificaInventario.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: el vehiculo no se a modificado';
		}
	}

	public function eliminar()
	{
		/**
		*Elimina un Usuario
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
				
		$result = $this->modelo->eliminar($vin);

		//Revisa si la Eliminacion fue Exitosa
		if(isset($result))
		{
			///carga la vista
<<<<<<< HEAD
			require_once('Vista/EliminaInventario.php');
=======
<<<<<<< HEAD
			require_once('Vista/EliminaInventario.php');
=======
			require('Vista/EliminaInventario.php');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		}
		else
		{
			echo 'Error: El vehiculo ya se habia eliminado del inventario';
		}
	}
}

?>