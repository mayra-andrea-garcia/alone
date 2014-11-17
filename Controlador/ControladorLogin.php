<?php	
/** 
*Controlador de Login
*@author Mayra Garcia
*@version 1.0
*/
class ControladorLogin 
{
	private $modelo;
<<<<<<< HEAD
	

	function __construct()
	{
		require_once('Controlador/ValidadorSesion.php');
		require_once('Controlador/SanitizadorDatos.php');
		require_once('Modelo/ModeloLogin.php');
		require_once('Controlador/PHPMailer-master/EnviarCorreo.php');
		$this->modelo = new ModeloLogin();
		$this->mail = new EnviarCorreo();
	}
	/**
=======

	function __construct()
	{
		/**
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*Se invcluye un Validador de Sesion
		*Se carga el servidor de Correos
		*@param No recibe
		*@throws No se generan excepciones
		*/
<<<<<<< HEAD

  	function run()
	{
=======
		require_once('Controlador/ValidadorSesion.php');
		require_once('Controlador/SanitizadorDatos.php');
		require_once('Modelo/ModeloLogin.php');
		require_once('Controlador/PHPMailer-master/EnviarCorreo.php');
		$this->modelo = new ModeloLogin();
		$this->mail = new EnviarCorreo();
	}

  	function run()
	{
		/**
		*La entrada a la clase, se ejecuta segun la actividad
		*@param No contiene
		*@return No retorna valor
		*@throws No lleva excepciones
		*/

>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
			switch ($_GET['actividad']) {
				case 'login':
					$this->iniciarSesion();
					break;
				case 'logout':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()||
							ValidadorSesion::esCliente()||
							ValidadorSesion::esEmpleado())
						{
							$this->cerrarSesion();
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
				case 'registrarPerfil':if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$vista = file_get_contents('Vista/registrarPerfil.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario']/*$this->diccionario['{nombre_sesion}'] */, $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario']/*$this->diccionario['{nombre_sesion}'] */, $vista);
							echo $vista;
=======
							require_once('Vista/Permisos.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
						}
					}
					else
					{
<<<<<<< HEAD
						require_once('Vista/registrarPerfilCliente.html');
					}	
					break;
				case 'registrar': $this->registrar();
					   break;
				case 'eliminarPerfil':
=======
						require_once('Vista/Login.php');
					}	
					break;
				case 'registrar':
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
<<<<<<< HEAD
							$vista = file_get_contents('Vista/eliminarPerfil.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario']/*$this->diccionario['{nombre_sesion}'] */, $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
=======
							$this->registrar();
						}
						else
						{
							require_once('Vista/Permisos.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
						}
					}
					else
					{
<<<<<<< HEAD
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
							$this->eliminar();
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
				case 'modificarPerfil': if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()||
							ValidadorSesion::esEmpleado()||
							ValidadorSesion::esCliente())
						{
							$this->modificar();
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
=======
						require_once('Vista/Login.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					}	
					break;
				case 'modificar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin()||
							ValidadorSesion::esEmpleado()||
							ValidadorSesion::esCliente())
						{
<<<<<<< HEAD
							$vista = file_get_contents('Vista/CambiarContrasena.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario']/*$this->diccionario['{nombre_sesion}'] */, $vista);
							echo $vista;
						}
						else
						{
							$vista = file_get_contents('Vista/Permisos.html');
							$vista =str_replace( "{permisos}", $_SESSION['permisos'], $vista);
							echo $vista;
=======
							$this->modificar();
						}
						else
						{
							require_once('Vista/Permisos.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
						}
					}
					else
					{
<<<<<<< HEAD
						require_once('Vista/Login.html');
=======
						require_once('Vista/Login.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
					}	
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

	function iniciarSesion()
	{
=======
	function iniciarSesion()
	{
		/**
		*Se inicia una sesion
		*@param No recibe
		*@return No contiene
		*@throws No se generan excepciones
		*/
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']);
		$contrasena = SanitizadorDatos::validaTexto($_POST['contrasena']);

		$result = $this->modelo->login($nombreUsuario, $contrasena);
		$_SESSION = ValidadorSesion::login($this->modelo->datos);

		if(isset($result) && ValidadorSesion::estaLogueado())
		{
<<<<<<< HEAD
			$vista = file_get_contents('Vista/index.html');
			$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario'] , $vista);
			echo $vista;
		}
		else
		{
			require_once('Vista/Login.html');
		}

	}
	/**
		*Se inicia una sesion
		*@param No recibe
		*@return No contiene
		*@throws No se generan excepciones
		*/

	function cerrarSesion()
	{
		
		$result = ValidadorSesion::logout();
		require_once('Vista/Login.html');
	}
	/**
=======
			require_once('Vista/UsuarioLogueado.php');
		}
		else
		{
			require_once('Vista/Login.php');
		}

	}

	function cerrarSesion()
	{
		/**
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		*Se cierra la sesion actual
		*@return No tiene valor de retorno
		*@param No recibe
		*@throws No se generan excepciones
		*/
<<<<<<< HEAD

	function registrar()
	{

=======
		$result = ValidadorSesion::logout();
		require_once('Vista/Login.php');
	}

	function registrar()
	{
		/**
		*Se crea un nuevo usuario para el login
		*@return No contiene
		*@param No recibe
		*@throws No se generan excepciones
		*/
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']); 
		$contrasena = SanitizadorDatos::validaTexto($_POST['contrasena']); 
		$nombre = SanitizadorDatos::validaTexto($_POST['nombre']); 
		$apellidos = SanitizadorDatos::validaTexto($_POST['apellidos']);
		$mail = SanitizadorDatos::validaCorreo($_POST['mail']);
		$permisos = SanitizadorDatos::validaTexto($_POST['permisos']);

		$nombreExistente = $this->modelo->consultaExistencia($nombreUsuario);
		if(isset($nombreExistente))
		{
<<<<<<< HEAD
			require_once('Vista/NombreExistente.html');
=======
			require_once('Vista/NombreExistente.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		}
		else
		{
			$result = $this->modelo->registrar($nombreUsuario, $contrasena, $nombre, 
				                               $apellidos, $mail, $permisos);
			if(isset($result))
			{
				$envioExitoso = $this->mail->enviarCorreo($mail, $nombreUsuario, $_SESSION['usuario']);
				if($envioExitoso)
				{
<<<<<<< HEAD
					require_once('Vista/RegistroExitoso.html');
=======
					require_once('Vista/RegistroExitoso.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
				}
			}
			else
			{
				print 'No se pudo agregar el usuario!! :(';
			}
		}
	}
<<<<<<< HEAD
	/**
		*Se crea un nuevo usuario para el login
		*@return No contiene
		*@param No recibe
		*@throws No se generan excepciones
		*/
=======
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6

	function eliminar()
	{
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']);

		$result = $this->modelo->eliminar($nombreUsuario);

		if(isset($result))
		{
<<<<<<< HEAD
			require_once('Vista/EliminaSesion.html');
=======
			require_once('Vista/EliminaSesion.php');
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		}
		else
		{
			print 'El nombre de usuario que proporcionas no existe';
		}
	}

	function modificar()
	{
<<<<<<< HEAD
		
=======
		/**
		*Modifica contraseña usuario
		*@param No contiene
		*@return No retorna valor
		*/

>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		//Se consiguen los valores desde POST y se Sanitizan
		$contrasena = SanitizadorDatos::validaTexto($_POST['contrasena']);
		$contrasenaConfirmada = SanitizadorDatos::validaTexto($_POST['contrasenaConfirmada']);
		$contrasenaVieja = SanitizadorDatos::validaTexto($_POST['contrasenaVieja']);
		$contrasenaExistente = $this->modelo->consultaContrasena($_SESSION['usuario'], $contrasenaVieja);
		if(isset($contrasenaExistente))
		{
			$bandContrasena = strcmp($contrasena, $contrasenaConfirmada);
			if($bandContrasena == 0)
			{
				$result = $this->modelo->modificarContrasena($_SESSION['usuario'], $contrasena); 
			}
			if(isset($result))
			{
<<<<<<< HEAD
				require_once('Vista/ContrasenaExitosa.html');
			}
			else
			{
				require_once('Vista/NoConcuerdaContrasena.html');
=======
				require_once('Vista/ContrasenaExitosa.php');
			}
			else
			{
				print 'Las dos contraseñas no son iguales, revisa y vuelve a intentar!! :(';
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
			}
		}
		else
		{
<<<<<<< HEAD
			require_once('Vista/ContrasenaViejaMal.html');	
		}
	}
	/**
		*Modifica contraseña usuario
		*@param No contiene
		*@return No retorna valor
		*/
=======
			print 'La contraseña vieja que me das no es correcta!!';	
		}
	}
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
}

?>