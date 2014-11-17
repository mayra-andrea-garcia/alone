<?php
/** 
*Controlador de Inventario
*@author Mayra Garcia
*@version 1.0
*/

class ControladorInventario
{
	private $modeloInventario;
	private $modeloUsuario;
	private $modeloVehiculo;
	private $modeloUbicacion;
	

	function __construct()
	{
		require_once('Controlador/ValidadorSesion.php');
		require_once('Modelo/ModeloUsuario.php');
		require_once('Modelo/ModeloInventario.php');
		require_once('Modelo/ModeloVehiculo.php');
		require_once('Modelo/ModeloUbicacion.php');
		require_once('Controlador/SanitizadorDatos.php');
		$this->modeloInventario = new ModeloInventario();
		$this->modeloUsuario = new ModeloUsuario();
		$this->modeloVehiculo = new ModeloVehiculo();
		$this->modeloUbicacion = new ModeloUbicacion();
	}
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



	function run()
	{
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
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
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
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
						{
							$this->agregar();
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
					}	
					break;
				case 'eliminar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							require_once('Vista/EliminaInventario.html');
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
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin() ||
							ValidadorSesion::esEmpleado())
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
				default:
					echo 'Error: Esa Actividad no existe';
					break;
		    }
	}
	/**
	*La entrada a la clase, se ejecuta segun la actividad
	*@param No contiene
	*@return No retorna valor
	*@throws No lleva excepciones
	*/

	public function listar()
	{	
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
				
		$resultVehiculo = $this->modeloVehiculo->listar($vin);
		$resultInventario = $this->modeloInventario->listar($vin);
		$resultUsuario = $this->modeloUsuario->listar($numEmpleado);
		$resultUbicacion = $this->modeloUbicacion->listar($vin);
		//Revisa si se puede listar el usuario 
		if(isset($resultInventario) && 
		   isset($resultVehiculo) &&
		   isset($resultUsuario))
		{
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
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$kilometraje = SanitizadorDatos::validaNumero($_POST['kilometraje']);
		$combustible = SanitizadorDatos::validaNumero($_POST['combustible']);
		$golpe = SanitizadorDatos::validaTexto($_POST['golpe']);
		$severidad = SanitizadorDatos::validaTexto($_POST['severidad']);
		$piezaGolpeada = SanitizadorDatos::validaTexto($_POST['piezaGolpeada']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		$result = $this->modeloInventario->agregar($numEmpleado,$vin, $kilometraje, 
										 $combustible, $golpe, 
										 $severidad, $piezaGolpeada);

		//Revisa si se creo el usuario
		if(isset($result))
		{
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
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$kilometraje = SanitizadorDatos::validaNumero($_POST['kilometraje']);
		$combustible = SanitizadorDatos::validaNumero($_POST['combustible']);
		$golpe = SanitizadorDatos::validaTexto($_POST['golpe']);
		$severidad = SanitizadorDatos::validaTexto($_POST['severidad']);
		$piezaGolpeada = SanitizadorDatos::validaTexto($_POST['piezaGolpeada']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
		
		$result = $this->modeloInventario->modificar($vin, $kilometraje,  
		               					   $combustible, $golpe,
		               					   $severidad, $piezaGolpeada,$numEmpleado);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
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
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
				
		$result = $this->modelo->eliminar($vin);

		//Revisa si la Eliminacion fue Exitosa
		if(isset($result))
		{
			///carga la vista
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
}

?>