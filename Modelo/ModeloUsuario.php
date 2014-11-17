<?php

class ModeloUsuario
{

	public $datos;

	function __construct()
	{
		require_once("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}

	function listar($numEmpleado)
	{
	
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);

		$query = "SELECT * FROM Usuario WHERE num_empleado= $numEmpleado;";
		$this->datos = $this->manejadorBD->listar($query);
	
		return $this->datos;
	}
	/**
	*Funcion que lista en la Base de Datos
	*@param $numEmpleado string
	*@return $datos array
	**/

	function crear($nombre,$email,$telefono,$direccion, $rfc, $numEmpleado)
	{
		$nombre = $this->manejadorBD->escaparVariable($nombre);
		$email = $this->manejadorBD->escaparVariable($email);
		$direccion = $this->manejadorBD->escaparVariable($direccion);
		$telefono = $this->manejadorBD->escaparVariable($telefono);
		$rfc = $this->manejadorBD->escaparVariable($rfc);
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);

		$query = "INSERT INTO Usuario(num_empleado,nombre,email,telefono,direccion,rfc) 
		          VALUES($numEmpleado,'$nombre', '$email', '$telefono', '$direccion', '$rfc');";
		$select = "SELECT * FROM Usuario WHERE num_empleado=$numEmpleado;";
		$this->datos = $this->manejadorBD->insertar($query, $select);

		return $this->datos;
	}
	/**
	*Funcion que agrega en la Base de Datos
	*@param $nombre string
	*@param $email string
	*@param $telefono string
	*@param $direccion string
	*@param $rfc string
	*@param $numEmpleado string
	*@return $datos array
	**/

	function modificar($Nnombre,$Nemail,$Ntelefono,$Ndireccion, $rfc, $numEmpleado)
	{
		$Nnombre = $this->manejadorBD->escaparVariable($Nnombre);
		$Nemail = $this->manejadorBD->escaparVariable($Nemail);
		$Ntelefono = $this->manejadorBD->escaparVariable($Ntelefono);
		$Ndireccion = $this->manejadorBD->escaparVariable($Ndireccion);
		$rfc = $this->manejadorBD->escaparVariable($rfc);
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);

		$query = "UPDATE Usuario SET nombre = '$Nnombre', email = '$Nemail', telefono = '$Ntelefono',
		                              direccion = '$Ndireccion', rfc = '$rfc' WHERE num_empleado = $numEmpleado";
		$select = "SELECT * FROM Usuario WHERE num_empleado = $numEmpleado;";
		$this->datos = $this->manejadorBD->modificar($query, $select);
		return $this->datos;
	}
	/**
	*Funcion que modifica en la Base de Datos
	*@param $Nnombre string
	*@param $Nemail string
	*@param $Ntelefono string
	*@param $Ndireccion string
	*@param $rfc string
	*@param $numEmpleado string
	*@return $datos array
	**/

	function eliminar($numEmpleado)
	{
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);

		$query = "DELETE FROM Usuario WHERE num_empleado='$numEmpleado';";
		$this->datos = $this->manejadorBD->eliminar($query);

		return $this->datos;
	}
	/**
	*Funcion que Elimina en la Base de Datos
	*Busca el $numEmpleado en la BD para eliminar
	*@param $numEmpleado string
	*@return $datos array
	**/
}
