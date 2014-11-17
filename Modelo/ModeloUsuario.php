<?php

class ModeloUsuario
{

	public $datos;

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
	function __construct()
	{
		require_once("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}
<<<<<<< HEAD

	function listar($numEmpleado)
	{
	
=======
<<<<<<< HEAD
=======
=======
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d

	function listar($numEmpleado)
	{
	/**
	*Funcion que lista en la Base de Datos
	*@param $numEmpleado string
	*@return $datos array
	**/
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);

		$query = "SELECT * FROM Usuario WHERE num_empleado= $numEmpleado;";
		$this->datos = $this->manejadorBD->listar($query);
	
<<<<<<< HEAD
		return $this->datos;
	}
	/**
	*Funcion que lista en la Base de Datos
	*@param $numEmpleado string
	*@return $datos array
	**/

	function crear($nombre,$email,$telefono,$direccion, $rfc, $numEmpleado)
	{
=======
<<<<<<< HEAD
=======
=======
		$this->datos = array('numEmpleado'=>$numEmpleado,
							 'nombre'=>'VariableNombreBD',
						     'email'=>'VariableEmailBD',
						     'telefono'=>'VariableTelefonoBD',
						     'direccion'=>'VariableDireccionBD',
						     'rfc'=>'VariableRfcBD');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		return $this->datos;
	}

	function crear($nombre,$email,$telefono,$direccion, $rfc, $numEmpleado)
	{
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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

<<<<<<< HEAD
		return $this->datos;
	}
	/**
	*Funcion que agrega en la Base de Datos
	*@param $nombre string
	*@param $email string
	*@param $telefono string
	*@param $direccion string
=======
<<<<<<< HEAD
=======
=======
		$this->datos = array('nombre'=>$nombre,
						     'email'=>$email,
						     'telefono'=>$telefono,
						     'direccion'=>$direccion,
						     'rfc'=>$rfc,
						     'numEmpleado'=>$numEmpleado);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		return $this->datos;
	}

	function modificar($Nnombre,$Nemail,$Ntelefono,$Ndireccion, $rfc, $numEmpleado)
	{
	/**
	*Funcion que modifica en la Base de Datos
	*@param $Nnombre string
	*@param $Nemail string
	*@param $Ntelefono string
	*@param $Ndireccion string
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
	*@param $rfc string
	*@param $numEmpleado string
	*@return $datos array
	**/
<<<<<<< HEAD

	function modificar($Nnombre,$Nemail,$Ntelefono,$Ndireccion, $rfc, $numEmpleado)
	{
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
<<<<<<< HEAD
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
=======
<<<<<<< HEAD
=======
=======
		$this->datos = array('nombre'=>$Nnombre,
						     'email'=>$Nemail,
						     'telefono'=>$Ntelefono,
						     'direccion'=>$Ndireccion,
						     'rfc'=>$rfc,
						     'numEmpleado'=>$numEmpleado);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		return $this->datos;
	}

	function eliminar($numEmpleado)
	{
	/**
	*Funcion que Elimina en la Base de Datos
	*Busca el $numEmpleado en la BD para eliminar
	*@param $numEmpleado string
	*@return $datos array
	**/
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);

		$query = "DELETE FROM Usuario WHERE num_empleado='$numEmpleado';";
		$this->datos = $this->manejadorBD->eliminar($query);

<<<<<<< HEAD
		return $this->datos;
	}
	/**
	*Funcion que Elimina en la Base de Datos
	*Busca el $numEmpleado en la BD para eliminar
	*@param $numEmpleado string
	*@return $datos array
	**/
=======
<<<<<<< HEAD
=======
=======
		$this->datos = array('nombre'=> 'NULL',
						     'email'=>'NULL',
						     'telefono'=>'NULL',
						     'direccion'=>'NULL',
						     'rfc'=>'NULL');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
		return $this->datos;
	}
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
}
