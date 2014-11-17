<?php
/** 
*Controlador de Usuarios
*@author Mayra Garcia
*@version 1.0
*/

class ControladorUsuario
{
	private $modelo;
<<<<<<< HEAD
	private $diccionario;
=======
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
	

	function __construct()
	{
<<<<<<< HEAD
		require_once('Controlador/ValidadorSesion.php');
		require_once('Modelo/ModeloUsuario.php');
		require_once('Controlador/SanitizadorDatos.php');
		$this->modelo = new ModeloUsuario();
		$this->diccionario = array('{nombre_sesion}' => $_SESSION['usuario'] ,
							 '{nombre}' => $this->nombre,
							 '{email}' => $this->email,
							 '{telefono}' => $this->telefono,
							 '{direccion}' => $this->direccion,
							 '{rfc}' => $this->rfc,
 							 '{numEmpleado}' => $this->numEmpleado);
	}
	/**
	*Se incluye el Modelo que corresponde al Controlador
	*Se incluye un Sanitizador de Datos
	*@param string
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
=======
		/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*@param string
		*@throws No se generan excepciones
		*/
<<<<<<< HEAD
		require_once('Controlador/ValidadorSesion.php');
		require_once('Modelo/ModeloUsuario.php');
		require_once('Controlador/SanitizadorDatos.php');
=======
		require('Modelo/ModeloUsuario.php');
		require('Controlador/SanitizadorDatos.php');
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		$this->modelo = new ModeloUsuario();
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		*Retorna el valor de Modelo
		*@param $modelo tipo Object
		*@return $modelo tipo Object
		*/
<<<<<<< HEAD

	function run()
	{
			switch ($_GET['actividad']) {
				case 'listarUsuario': if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$vista = file_get_contents('Vista/ListaUsuario.html');
							$vista =str_replace( "{nombre_sesion}", $this->diccionario['{nombre_sesion}'] , $vista);
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
=======
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

			switch ($_GET['actividad']) {
				case 'listar':
<<<<<<< HEAD
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
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
				case 'crearUsuario':
					 if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$vista = file_get_contents('Vista/CrearUsuario.html');
							$vista =str_replace( "{nombre_sesion}", $this->diccionario['{nombre_sesion}'] , $vista);
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
=======
						require_once('Vista/Login.php');
					}	
					break;
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
				case 'crear':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$this->crear();
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
				case 'eliminaUsuario':if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$vista = file_get_contents('Vista/EliminaUsuario.html');
							$vista =str_replace( "{nombre_sesion}", $this->diccionario['{nombre_sesion}'] , $vista);
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
=======
						require_once('Vista/Login.php');
					}
					break;
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
				case 'eliminar':
				    if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
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
				case 'modificarUsuario': if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$vista = file_get_contents('Vista/ModificaUsuario.html');
							$vista =str_replace( "{nombre_sesion}", $this->diccionario['{nombre_sesion}'] , $vista);
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
					echo 'Error: Esa Actividad no existe';
					break;
=======
						require_once('Vista/Login.php');
					}
					break;
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
				case 'modificar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
<<<<<<< HEAD
							require_once('Vista/ModificaUsuario.html');
=======
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
				case 'crear':
					$this->crear();
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
		*Metodo que lista el Usuario 
		*@param no contiene 
		*@return no retorna
		*/	
		
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
		
		$result = $this->modelo->listar($numEmpleado);

		//Revisa si se puede listar el usuario 
		if(isset($result))
		{
<<<<<<< HEAD
			$diccionario = array('{nombre}'=>$this->modelo->datos['nombre'],
				               '{email}'=>$this->modelo->datos['email'],
				               '{telefono}'=>$this->modelo->datos['telefono'],
				               '{direccion}'=>$this->modelo->datos['direccion'],
				               '{rfc}'=>$this->modelo->datos['rfc'],
				               '{numEmpleado}'=>$this->modelo->datos['numEmpleado']);

			$vista = file_get_contents('Vista/UsuarioEncontrado.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require_once('Vista/UsuarioNoEncontrado.html');
		}
	}
	/**
		*Metodo que lista el Usuario 
		*@param no contiene 
		*@return no retorna
		*/

	public function crear()
	{
=======
			//carga la vista
			require('Vista/ListaUsuario.php');
		}
		else
		{
			echo 'Error: el usuario no se a insertado';
		}
	}

	public function crear()
	{
		/**
		*Crea un Usuario
		*@param No contiene
		*@return No retorna valor
		*/
		
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$nombre = SanitizadorDatos::validaTexto($_POST['nombre']);
		$email = SanitizadorDatos::validaCorreo($_POST['email']);
		$telefono = SanitizadorDatos::validaTelefono($_POST['telefono']);
		$direccion = SanitizadorDatos::validaDireccion($_POST['direccion']);
		$rfc = SanitizadorDatos::validaTexto($_POST['rfc']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		
		$result = $this->modelo->crear($nombre, $email, 
									   $telefono, $direccion, 
									   $rfc, $numEmpleado);

		//Revisa si se creo el usuario
		if(isset($result))
		{
<<<<<<< HEAD
			$diccionario = array('{nombre}'=>$this->modelo->datos['nombre'],
				               '{email}'=>$this->modelo->datos['email'],
				               '{telefono}'=>$this->modelo->datos['telefono'],
				               '{direccion}'=>$this->modelo->datos['direccion'],
				               '{rfc}'=>$this->modelo->datos['rfc'],
				               '{numEmpleado}'=>$this->modelo->datos['numEmpleado']);

			$vista = file_get_contents('Vista/UsuarioCreado.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;
		}
		else
		{
			require_once('Vista/UsuarioNoEncontrado.html');
		}
	}
	/**
		*Crea un Usuario
		*@param No contiene
		*@return No retorna valor
		*/
		

	public function modificar()
	{	
=======
			//carga la vista
			require('Vista/CrearUsuario.php');
		}
		else
		{
			echo 'Error: el usuario no se a insertado';
		}
	}

	public function modificar()
	{	
		/**
		*Modifica un Usuario
		*@param No contiene
		*@return No retorna valor
		*/

>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$nombre = SanitizadorDatos::validaTexto($_POST['nombre']);
		$email = SanitizadorDatos::validaCorreo($_POST['email']);
		$telefono = SanitizadorDatos::validaTelefono($_POST['telefono']);
		$direccion = SanitizadorDatos::validaDireccion($_POST['direccion']);
		$rfc = SanitizadorDatos::validaTexto($_POST['rfc']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		
		$result = $this->modelo->modificar($nombre, $email, 
										   $telefono, $direccion, 
										   $rfc, $numEmpleado);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
<<<<<<< HEAD
			$diccionario = array('{nombre}'=>$this->modelo->datos['nombre'],
				               '{email}'=>$this->modelo->datos['email'],
				               '{telefono}'=>$this->modelo->datos['telefono'],
				               '{direccion}'=>$this->modelo->datos['direccion'],
				               '{rfc}'=>$this->modelo->datos['rfc'],
				               '{numEmpleado}'=>$this->modelo->datos['numEmpleado']);

			$vista = file_get_contents('Vista/UsuarioModificado.html');
			foreach ($diccionario as $dato => $significado) {
				$vista =str_replace( $dato, $significado , $vista);
			}
			echo $vista;	
		}
		else
		{
			require_once('Vista/UsuarioNoEncontrado.html');
		}
	}
	/**
		*Modifica un Usuario
=======
			//carga la vista
			require('Vista/ModificaUsuario.php');
		}
		else
		{
			echo 'Error: el usuario no se a modificado';
		}
	}

	public function eliminar()
	{
		/**
		*Elimina un Usuario
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		*@param No contiene
		*@return No retorna valor
		*/

<<<<<<< HEAD
	public function eliminar()
	{
=======
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
				
		$result = $this->modelo->eliminar($numEmpleado);

		//Revisa si la Eliminacion fue Exitosa
		if(isset($result))
		{
			///carga la vista
<<<<<<< HEAD
			require('Vista/UsuarioEliminado.html');
		}
		else
		{
			require_once('Vista/UsuarioYaEliminado.html');
		}
	}
	/**
		*Elimina un Usuario
		*@param No contiene
		*@return No retorna valor
		*/
=======
			require('Vista/EliminaUsuario.php');
		}
		else
		{
			echo 'Error: el usuario ya se habia eliminado';
		}
	}
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
}

?>