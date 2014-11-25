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
		require_once('Controlador/ValidadorSesion.php');
		require_once('Controlador/SanitizadorDatos.php');
		require_once('Modelo/ModeloLogin.php');
		require_once('Controlador/PHPMailer-master/EnviarCorreo.php');
		$this->modelo = new ModeloLogin();
		$this->mail = new EnviarCorreo();
	}
	/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*Se invcluye un Validador de Sesion
		*Se carga el servidor de Correos
		*@param No recibe
		*@throws No se generan excepciones
		*/

  	function run()
	{
			switch ($_GET['actividad']) {
				case 'login':if(!ValidadorSesion::estaLogueado())
							{

								$this->iniciarSesion();
							}
							else
							{
								require_once('Vista/Login.html');
								/*$vista = file_get_contents('Vista/index.html');
							 	$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario']/*$this->diccionario['{nombre_sesion}'], $vista);
							 	echo $vista;*/
							}
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
							require_once('Vista/Login.html');
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
						}
					}
					else
					{
						require_once('Vista/registrarPerfilCliente.html');
					}	
					break;
				case 'registrar': $this->registrar();
					   break;
				case 'eliminarPerfil':
					if(ValidadorSesion::estaLogueado())
					{
						if(ValidadorSesion::esAdmin())
						{
							$vista = file_get_contents('Vista/eliminarPerfil.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario']/*$this->diccionario['{nombre_sesion}'] */, $vista);
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
						if(ValidadorSesion::esAdmin()||
							ValidadorSesion::esEmpleado()||
							ValidadorSesion::esCliente())
						{
							$vista = file_get_contents('Vista/CambiarContrasena.html');
							$vista =str_replace( "{nombre_sesion}", $_SESSION['usuario']/*$this->diccionario['{nombre_sesion}'] */, $vista);
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
				case 'recupera':
					
						require_once('Vista/RecuperaContrasena.html');
					
					break;	
				case 'recuperarContrasena': 
					if(!ValidadorSesion::estaLogueado())
					{
							$this->recuperaContrasena();
					}
					else
					{
						require_once('Vista/Login.html');
					}	
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

	function iniciarSesion()
	{
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']);
		$contrasena = SanitizadorDatos::validaTexto($_POST['contrasena']);

		$result = $this->modelo->login($nombreUsuario, $contrasena);
		$_SESSION = ValidadorSesion::login($this->modelo->datos);

		if(isset($result) && ValidadorSesion::estaLogueado())
		{
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
		*Se recupera la contraseña de un usuario
		*@param No recibe
		*@return No contiene
		*@throws No se generan excepciones
		*/

	function recuperaContrasena()
	{
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']); 

		$result = $this->modelo->listaUsuario($nombreUsuario); 

		if (isset($result)) 
		{
			$band = $this->enviarCorreo($nombreUsuario, $mail, 'recupera', $result['contrasena']);
			if($band)
			{
				require_once('Vista/ContrasenaRecuperada.html');
			}	
			else
			{
				require_once('Vista/MailNoConcuerda.html');
			}
		}
		else
		{
			require_once('Vista/MailNoConcuerda.html');
		}	
	}
	/**
		*Se cierra la sesion actual
		*@return No tiene valor de retorno
		*@param No recibe
		*@throws No se generan excepciones
		*/
	function enviarCorreo($mail, $nombreUsuario, $op, $contrasena)
	{
		switch($op)
		{							
			case 'registra': 	$titulo    = 'BIENVENIDO AL TALLER DE VEHICULOS SUPERSTAR';
								$mensaje   = "Hola $nombreUsuario <br/> <br/>".
									            "Te has registrado en el taller de vehiculos <br/>".
									            "Intenta loguearte en la siguiente pagina: <br/>".
									            "<a href= 'http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=login&actividad=login'> INICIA SESION AQUI </a>".
									            "<br/> <br/> Saludos";
								$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
								$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$cabeceras .= "To: $mail" . "\r\n";
								$cabeceras .= 'From: mayra.garcia@alone-mayra.comli.com' . "\r\n";

								$band = mail($para, $titulo, $message, $cabeceras); 
							    return $band;
							    break;
			case 'recupera': 	$titulo    = 'RECUPERACION DE CONTRASEÑA DE TALLER DE VEHICULOS SUPERSTAR';
								$mensaje   = "Hola $nombreUsuario <br/> <br/>".
									            "Has solicitado un cambio de contraseña <br/>".
									            "Tu contraseña es: $contrasena pruebala porfavor aqui:<br/>".
									            "<a href= 'http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=login&actividad=login'> INICIA SESION AQUI </a>".
									            "<br/> <br/> Saludos";
								$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
								$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$cabeceras .= "To: $mail" . "\r\n";
								$cabeceras .= 'From: mayra.garcia@alone-mayra.comli.com' . "\r\n";

								$band = mail($para, $titulo, $message, $cabeceras); 
							    return $band;
							    break;
			default: echo 'Esa actividad no existe';
	 	}
	}

	function registrar()
	{

		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']); 
		$contrasena = SanitizadorDatos::validaTexto($_POST['contrasena']); 
		$nombre = SanitizadorDatos::validaTexto($_POST['nombre']); 
		$apellidos = SanitizadorDatos::validaTexto($_POST['apellidos']);
		$mail = SanitizadorDatos::validaCorreo($_POST['mail']);
		$permisos = SanitizadorDatos::validaTexto($_POST['permisos']);

		$nombreExistente = $this->modelo->consultaExistencia($nombreUsuario);
		if(isset($nombreExistente))
		{
			require_once('Vista/NombreExistente.html');
		}
		else
		{
			$result = $this->modelo->registrar($nombreUsuario, $contrasena, $nombre, 
				                               $apellidos, $mail, $permisos);
			if(isset($result))
			{	//$envioExitoso = $this->mail->enviarCorreo($mail, $nombreUsuario, $_SESSION['usuario']);
				$envioExitoso=$this->enviarCorreo($mail,$nombreUsuario,'registra', null);
				if($envioExitoso)
				{
					require_once('Vista/RegistroExitoso.html');
				}
			}
			else
			{
				print 'No se pudo agregar el usuario!! :(';
			}
		}
	}
	/**
		*Se crea un nuevo usuario para el login
		*@return No contiene
		*@param No recibe
		*@throws No se generan excepciones
		*/

	function eliminar()
	{
		$nombreUsuario = SanitizadorDatos::validaTexto($_POST['nombreUsuario']);

		$result = $this->modelo->eliminar($nombreUsuario);

		if(isset($result))
		{
			require_once('Vista/EliminaSesion.html');
		}
		else
		{
			print 'El nombre de usuario que proporcionas no existe';
		}
	}

	function modificar()
	{
		
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
				require_once('Vista/ContrasenaExitosa.html');
			}
			else
			{
				require_once('Vista/NoConcuerdaContrasena.html');
			}
		}
		else
		{
			require_once('Vista/ContrasenaViejaMal.html');	
		}
	}
	/**
		*Modifica contraseña usuario
		*@param No contiene
		*@return No retorna valor
		*/
}

?>