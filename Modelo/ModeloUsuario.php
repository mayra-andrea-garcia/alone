<?php

class ModeloUsuario
{

	public $datos;


	function listar($numEmpleado)
	{
	/**
	*Funcion que lista en la Base de Datos
	*@param $numEmpleado string
	*@return $datos array
	**/
		$this->datos = array('numEmpleado'=>$numEmpleado,
							 'nombre'=>'VariableNombreBD',
						     'email'=>'VariableEmailBD',
						     'telefono'=>'VariableTelefonoBD',
						     'direccion'=>'VariableDireccionBD',
						     'rfc'=>'VariableRfcBD');
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
		$this->datos = array('nombre'=>$nombre,
						     'email'=>$email,
						     'telefono'=>$telefono,
						     'direccion'=>$direccion,
						     'rfc'=>$rfc,
						     'numEmpleado'=>$numEmpleado);
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
	*@param $rfc string
	*@param $numEmpleado string
	*@return $datos array
	**/
		$this->datos = array('nombre'=>$Nnombre,
						     'email'=>$Nemail,
						     'telefono'=>$Ntelefono,
						     'direccion'=>$Ndireccion,
						     'rfc'=>$rfc,
						     'numEmpleado'=>$numEmpleado);
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
		$this->datos = array('nombre'=> 'NULL',
						     'email'=>'NULL',
						     'telefono'=>'NULL',
						     'direccion'=>'NULL',
						     'rfc'=>'NULL');
		return $this->datos;
	}
}
