<?php	
/** 
*Controlador de Login
*@author Mayra Garcia
*@version 1.0
*/
class ControladorLogin 
{
	private $modelo;

	function __construct()
	{
		/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*Se invcluye un Validador de Sesion
		*Se carga el servidor de Correos
		*@param No recibe
		*@throws No se generan excepciones
		*/
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
							require_once('Vista/Permisos.php');
						}
					}
					else
					{
						require_once('Vista/Login.php');
					}	
					break;
				case 'registrar':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$this->registrar();
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
						if(ValidadorSesion::esAdmin()||
							ValidadorSesion::esEmpleado()||
							ValidadorSesion::esCliente())
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
					break;
				default:
					echo 'Error: Esa Actividad no existe';
					break;
		    }
	}
	function iniciarSesion()
	{
		/**
		*Se inicia una sesion
		*@param No recibe
		*@return No contiene
		*@throws No se generan excepciones
		*/
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']);
		$contrasena = SanitizadorDatos::validaTexto($_POST['contrasena']);

		$result = $this->modelo->login($nombreUsuario, $contrasena);
		$_SESSION = ValidadorSesion::login($this->modelo->datos);

		if(isset($result) && ValidadorSesion::estaLogueado())
		{
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
		*Se cierra la sesion actual
		*@return No tiene valor de retorno
		*@param No recibe
		*@throws No se generan excepciones
		*/
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
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']); 
		$contrasena = SanitizadorDatos::validaTexto($_POST['contrasena']); 
		$nombre = SanitizadorDatos::validaTexto($_POST['nombre']); 
		$apellidos = SanitizadorDatos::validaTexto($_POST['apellidos']);
		$mail = SanitizadorDatos::validaCorreo($_POST['mail']);
		$permisos = SanitizadorDatos::validaTexto($_POST['permisos']);

		$nombreExistente = $this->modelo->consultaExistencia($nombreUsuario);
		if(isset($nombreExistente))
		{
			require_once('Vista/NombreExistente.php');
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
					require_once('Vista/RegistroExitoso.php');
				}
			}
			else
			{
				print 'No se pudo agregar el usuario!! :(';
			}
		}
	}

	function eliminar()
	{
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']);

		$result = $this->modelo->eliminar($nombreUsuario);

		if(isset($result))
		{
			require_once('Vista/EliminaSesion.php');
		}
		else
		{
			print 'El nombre de usuario que proporcionas no existe';
		}
	}

	function modificar()
	{
		/**
		*Modifica contraseña usuario
		*@param No contiene
		*@return No retorna valor
		*/

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
				require_once('Vista/ContrasenaExitosa.php');
			}
			else
			{
				print 'Las dos contraseñas no son iguales, revisa y vuelve a intentar!! :(';
			}
		}
		else
		{
			print 'La contraseña vieja que me das no es correcta!!';	
		}
	}
}

?>