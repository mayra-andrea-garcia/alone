<?php
/** 
*Modelo para administrar el login
*@author Mayra Garcia
*@version 1.0
*/
class ModeloLogin
{

	public $datos;

	function __construct()
	{
		require("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}

		/**
		*Se incluye el Singleton para el manejo de la conexion en la base de datos
		*@param No recibe
		*@throws No se generan excepciones
		*/

	function listaUsuario($nombreUsuario)
	{
		$nombreUsuario=$this->manejadorBD->escaparVariable($nombreUsuario);

		$query = "SELECT * FROM Sesion
				 WHERE nombreUsuario = 'nombreUsuario';";
		$this->datos = $this->manejadorBD->listar($query);

		return $this->datos; 
	}

		/**
		*Se Realiza una consulta con el nombre de usuario
		*@param $nombreUsuario String
		*@throws No se generan excepciones
		*@return $this->datos Array
		*/

	function login($nombreUsuario, $contrasena)
	{
		
		$nombreUsuario = $this->manejadorBD->escaparVariable($nombreUsuario);
		$contrasena = $this->manejadorBD->escaparVariable($contrasena);

		$query = "SELECT * FROM Sesion 
		          WHERE nombreUsuario ='$nombreUsuario'
		          AND contrasena = '$contrasena';";

		$this->datos = $this->manejadorBD->listar($query);
	
		return $this->datos;
	}
	/**
		*Funcion que loguea al usuario existente
		*@param $nombreUsuario string
		*@param $contrasena String
		*@return $datos array
		**/

	function consultaExistencia($nombreUsuario)
	{
		
		$select = "SELECT * FROM Sesion WHERE nombreUsuario = '$nombreUsuario';";

		$this->datos = $this->manejadorBD->listar($select);
		return $this->datos;
	}
	/**
		*Funcion que cunsulta si un  usuario ya existe 
		*@param $nombreUsuario string
		*@return $datos array
		**/

	function registrar($nombreUsuario, $contrasena, $nombre, $apellidos, $mail, $permisos)
	{
		
		$nombreUsuario = $this->manejadorBD->escaparVariable($nombreUsuario);
		$contrasena = $this->manejadorBD->escaparVariable($contrasena);
		$nombre = $this->manejadorBD->escaparVariable($nombre);
		$apellidos = $this->manejadorBD->escaparVariable($apellidos);
		$mail = $this->manejadorBD->escaparVariable($mail);
		$permisos = $this->manejadorBD->escaparVariable($permisos);

		$query = "INSERT INTO Sesion(nombreUsuario,contrasena,nombre,apellidos,mail,permisos) 
                  VALUES('$nombreUsuario','$contrasena','$nombre','$apellidos','$mail','$permisos');";
        $select = "SELECT * FROM Sesion WHERE nombreUsuario = '$nombreUsuario';";
    
        $this->datos = $this->manejadorBD->insertar($query, $select);
        return $this->datos;
	}
	/**
		*Funcion que registra un nuevo usuario
		*@param $nombreUsuario string
		*@param $contrasena String
		*@param $nombre
		*@param $apellidos
		*@param $mail
		*@param $permisos
		*@return $datos array
		**/

	function eliminar($nombreUsuario)
	{
		
		$nombreUsuario = $this->manejadorBD->escaparVariable($nombreUsuario);

		$query = "DELETE FROM Sesion WHERE nombreUsuario='$nombreUsuario';";
		$this->datos = $this->manejadorBD->eliminar($query);

		return $this->datos;
	}
	/**
		*Funcion que elimina un usuario existente
		*@param $nombreUsuario string
		*@return $datos array
		**/

	function modificarContrasena($nombreUsuario, $contrasena)
	{ 
		
		$contrasena = $this->manejadorBD->escaparVariable($contrasena);
		$nombreUsuario = $this->manejadorBD->escaparVariable($nombreUsuario);

		$query = "UPDATE Sesion SET contrasena = '$contrasena'
		          WHERE nombreUsuario = '$nombreUsuario'";
		$select = "SELECT * FROM Sesion WHERE nombreUsuario = '$nombreUsuario';";

		$this->datos = $this->manejadorBD->modificar($query, $select);
		return $this->datos;
	}
	/**
		*Funcion que permite modificar la contraseña
		*@param $nombreUsuario string
		*@param $contrasena String
		*@return $datos array
		**/

	function consultaContrasena($nombreUsuario, $contrasenaVieja)
	{
		
		$select = "SELECT * FROM Sesion WHERE nombreUsuario = '$nombreUsuario' 
		                                AND contrasena = '$contrasenaVieja';";

		$this->datos = $this->manejadorBD->listar($select);
		return $this->datos;
	}
	/**
		*Funcion que te permite saber si la contraseña es correcta
		*@param $nombreUsuario string
		*@param $contrasenaVieja String
		*@return $datos array
		**/
}

?>
