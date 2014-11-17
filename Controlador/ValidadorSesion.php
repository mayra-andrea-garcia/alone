<?php	
/** 
*Validador de Sesion
*Clase que se encarga de proveer servicios a los controladores
*@author Mayra Garcia
*@version 1.0
*/
class ValidadorSesion
{	
	static function estaLogueado()
	{
		/**
		*Funcion que te permite saber si hay una sesion
		*@param No contiene
		*@return boolean
		*@throws No lleva excepciones
		*/

		if( isset($_SESSION['usuario']) )
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	static function esAdmin()
	{
		/**
		*Funcion que te permite saber si un usuario es admin
		*@param No contiene
		*@return boolean
		*@throws No lleva excepciones
		*/
		if( isset($_SESSION['permisos']) && $_SESSION['permisos'] == 'administrador' )
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	static function esEmpleado()
	{
		/**
		*Funcion que te permite saber si un usuario es Empelado
		*@param No contiene
		*@return boolean
		*@throws No lleva excepciones
		*/
		if( isset($_SESSION['permisos']) && $_SESSION['permisos'] == 'empleado' )
		{	
			return true;
		}
		else
		{
			return false;
		}
	}

	static function esCliente()
	{
		/**
		*Funcion que te permite saber si un usuario es Cliente
		*@param No contiene
		*@return boolean
		*@throws No lleva excepciones
		*/
		if( isset($_SESSION['permisos']) && $_SESSION['permisos'] == 'cliente' )
		{
			return true;
		}
		else
		{
			return false;
		}	
	}

	static function logout()
	{
		/**
		*Funcion que desloguea al usuario actual
		*@param No contiene
		*@return boolean
		*@throws No lleva excepciones
		*/
		session_unset();
		session_destroy();		
		setcookie(session_name(), '', time()-3600);
	}

	static function login($datos)
	{
		/**
		*Funcion que loguea al usuario recibido por parametro
		*@param $datos array
		*@return $_SESSION object
		*@throws No lleva excepciones
		*/
		$_SESSION['usuario'] = $datos['nombreUsuario'];
		$_SESSION['contrasena'] = $datos['contrasena'];
		$_SESSION['nombre'] = $datos['nombre'];
		$_SESSION['apellidos'] = $datos['apellidos'];
		$_SESSION['mail'] = $datos['mail'];
		$_SESSION['permisos'] = $datos['permisos'];
		return $_SESSION;
	}
}

?>