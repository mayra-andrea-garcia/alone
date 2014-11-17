<?php
/** 
*Controlador de Inventario
*@author Mayra Garcia
*@version 1.0
*/

class ControladorInventario
{
<<<<<<< HEAD
	private $modeloInventario;
=======
	private $modelo;
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
	private $modeloUsuario;
	private $modeloVehiculo;
	private $modeloUbicacion;
	

	function __construct()
	{
<<<<<<< HEAD
		require_once('Controlador/ValidadorSesion.php');
=======
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		require_once('Modelo/ModeloUsuario.php');
		require_once('Modelo/ModeloInventario.php');
		require_once('Modelo/ModeloVehiculo.php');
		require_once('Modelo/ModeloUbicacion.php');
		require_once('Controlador/SanitizadorDatos.php');
<<<<<<< HEAD
		$this->modeloInventario = new ModeloInventario();
=======
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$this->modeloUsuario = new ModeloUsuario();
		$this->modeloVehiculo = new ModeloVehiculo();
		$this->modeloUbicacion = new ModeloUbicacion();
	}
<<<<<<< HEAD
	/**
	*Se incluye el Modelo que corresponde al Controlador
	*Se incluye un Sanitizador de Datos
	*@param string
	*@throws No se generan excepciones
	*/

	function __set($modeloInventario, $valor)
	{
		$this->modeloInventario = $modeloInventario;
	}
	/**
	*Modifica el valor de Modelo
	*@param $modelo tipo Object
	*@param $valor tipo String
	*/

	function __get($modeloInventario)
	{
		return $modeloInventario;
	}
	/**
	*Retorna el valor de Modelo
	*@param $modelo tipo Object
	*@return $modelo tipo Object
	*/

=======

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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6


	function run()
	{
<<<<<<< HEAD
			switch ($_GET['actividad']) {
				case 'listarInventario':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/ListaInventario.html');
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
				case 'listarI':
=======
		/**
		*La entrada a la clase, se ejecuta segun la actividad
		*@param No contiene
		*@return No retorna valor
		*@throws No lleva excepciones
		*/

			switch ($_GET['actividad']) {
				case 'listar':
<<<<<<< HEAD
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$this->listar();
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
				case 'agregarInventario':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/AgregarInventario.html');
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
				case 'agregarI':
=======
						require_once('Vista/Login.php');
					}	
					break;
				case 'agregar':
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
					break;
				case 'eliminaInventario':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$vista = file_get_contents('Vista/EliminaInventario.html');
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
=======
						require_once('Vista/Login.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					}	
					break;
				case 'eliminar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
<<<<<<< HEAD
							require_once('Vista/EliminaInventario.html');
=======
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
				case 'modificarInventario':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$vista = file_get_contents('Vista/ModificaInventario.html');
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
				case 'modificarI':
=======
						require_once('Vista/Login.php');
					}	
					break;
				case 'modificar':
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
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
=======
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					break;
				default:
					echo 'Error: Esa Actividad no existe';
					break;
		    }
	}
<<<<<<< HEAD
	/**
	*La entrada a la clase, se ejecuta segun la actividad
	*@param No contiene
	*@return No retorna valor
	*@throws No lleva excepciones
	*/

	public function listar()
	{	
=======

	public function listar()
	{
		/**
		*Metodo que lista el Inventario 
		*@param no contiene 
		*@return no retorna
		*/	
		
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
				
		$resultVehiculo = $this->modeloVehiculo->listar($vin);
<<<<<<< HEAD
		$resultInventario = $this->modeloInventario->listar($vin);
=======
		$resultInventario = $this->modelo->listar($vin);
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$resultUsuario = $this->modeloUsuario->listar($numEmpleado);
		$resultUbicacion = $this->modeloUbicacion->listar($vin);
		//Revisa si se puede listar el usuario 
		if(isset($resultInventario) && 
		   isset($resultVehiculo) &&
		   isset($resultUsuario))
		{
<<<<<<< HEAD
			$diccionario = array('{vin}'=>$this->modeloVehiculo->datos['vin'],
			                    '{marca}'=>$this->modeloVehiculo->datos['marca'],
			                    '{tipo}'=>$this->modeloVehiculo->datos['tipo'],
			                    '{modelo}'=>$this->modeloVehiculo->datos['modelo'],
			                    '{numEmpleado}'=>$this->modeloVehiculo->datos['num_empleado'],
			                    '{ubicacion}'=>$this->ModeloUbicacion->datos['ubicacion'],
			                    '{subUbicacion}'=>$this->ModeloUbicacion->datos['subUbicacion'],
			                    '{kilometraje}'=>$this->modeloInventario->datos['kilometraje'],
			                    '{combustible}'=>$this->modeloInventario->datos['combustible'],
			                    '{golpe}'=>$this->modeloInventario->datos['golpe'],
			                    '{severidad}'=>$this->modeloInventario->datos['severidad'],
			                    '{piezaGolpeada}'=>$this->modeloInventario->datos['piezaGolpeada'],
			                    '{fecha}'=>$this->modeloVehiculo->datos['fecha'],
			                    '{nombre_sesion}'=>$_SESSION['usuario']);
			$vista = file_get_contents('Vista/InventarioEncontrado.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista; 
			//carga la vista
		}
		else
		{
			require_once('Vista/VehiculoInexistente.html');
		}
	}
	/**
	*Metodo que lista el Inventario 
	*@param no contiene 
	*@return no retorna
	*/	

	public function agregar()
	{
=======
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
		
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$kilometraje = SanitizadorDatos::validaNumero($_POST['kilometraje']);
		$combustible = SanitizadorDatos::validaNumero($_POST['combustible']);
		$golpe = SanitizadorDatos::validaTexto($_POST['golpe']);
		$severidad = SanitizadorDatos::validaTexto($_POST['severidad']);
		$piezaGolpeada = SanitizadorDatos::validaTexto($_POST['piezaGolpeada']);
<<<<<<< HEAD
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		$result = $this->modeloInventario->agregar($numEmpleado,$vin, $kilometraje, 
=======
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
										 $combustible, $golpe, 
										 $severidad, $piezaGolpeada);

		//Revisa si se creo el usuario
		if(isset($result))
		{
<<<<<<< HEAD
			$diccionario = array('{vin}'=>$this->modeloInventario->datos['vin'],
			                    '{kilometraje}'=>$this->modeloInventario->datos['kilometraje'],
			                    '{combustible}'=>$this->modeloInventario->datos['combustible'],
			                    '{golpe}'=>$this->modeloInventario->datos['golpe'],
			                    '{severidad}'=>$this->modeloInventario->datos['severidad'],
			                    '{piezaGolpeada}'=>$this->modeloInventario->datos['piezaGolpeada'],
			                    '{numEmpleado}'=>$this->modeloInventario->datos['numEmpleado'],
			                    '{nombre_sesion}'=>$_SESSION['usuario']);
			$vista = file_get_contents('Vista/InventarioAgregado.html');
			foreach ($diccionario as $dato => $significado) {
			$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista; 
		}
		else
		{
			require_once('Vista/VehiculoNoAgregado.html');
		}
	}
	/**
	*Agrega un vehiculo al usuario
	*@param No contiene
	*@return No retorna valor
	*/

	public function modificar()
	{	
=======
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

>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$kilometraje = SanitizadorDatos::validaNumero($_POST['kilometraje']);
		$combustible = SanitizadorDatos::validaNumero($_POST['combustible']);
		$golpe = SanitizadorDatos::validaTexto($_POST['golpe']);
		$severidad = SanitizadorDatos::validaTexto($_POST['severidad']);
		$piezaGolpeada = SanitizadorDatos::validaTexto($_POST['piezaGolpeada']);
<<<<<<< HEAD
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
		
		$result = $this->modeloInventario->modificar($vin, $kilometraje,  
		               					   $combustible, $golpe,
		               					   $severidad, $piezaGolpeada,$numEmpleado);
=======
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
<<<<<<< HEAD
			$diccionario = array('{vin}'=>$this->modeloInventario->datos['vin'],
			                    '{kilometraje}'=>$this->modeloInventario->datos['kilometraje'],
			                    '{combustible}'=>$this->modeloInventario->datos['combustible'],
			                    '{golpe}'=>$this->modeloInventario->datos['golpe'],
			                    '{severidad}'=>$this->modeloInventario->datos['severidad'],
			                    '{piezaGolpeada}'=>$this->modeloInventario->datos['piezaGolpeada'],
			                    '{numEmpleado}'=>$this->modeloInventario->datos['numEmpleado'],
			                    '{nombre_sesion}'=>$_SESSION['usuario']);
			$vista = file_get_contents('Vista/InventarioModificado.html');
			foreach ($diccionario as $dato => $significado) {
			$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista; 
		}
		else
		{
			require_once('Vista/VehiculoInexistente.html');
		}
	}
	/**
	*Modifica un Vehiculo en el inventario
	*@param No contiene
	*@return No retorna valor
	*/

	public function eliminar()
	{
=======
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

>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
				
		$result = $this->modelo->eliminar($vin);

		//Revisa si la Eliminacion fue Exitosa
		if(isset($result))
		{
			///carga la vista
<<<<<<< HEAD
			require_once('Vista/InventarioEliminado.html');
		}
		else
		{
			require_once('Vista/VehiculoInexistente.html');
		}
	}
	/**
		*Elimina un Usuario
		*@param No contiene
		*@return No retorna valor
		*/
=======
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
}

?>