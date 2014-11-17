<?php

class ModeloUbicacion
{

	public $datos;

	function __construct()
	{
		require_once("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}

	function listar($vin)
	{
	/**
	*Funcion que lista de la Base de Datos
	*@param $vin string
	*@return $datos array
	**/
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "SELECT * FROM Ubicacion WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->listar($query);
	
		return $this->datos;
	}

	function crear($vin, $ubicacion, $subUbicacion)
	{
	/**
	*Funcion que agrega en la Base de Datos
	*@param $vin string
	*@param $ubicacion string
	*@param $subUbicaicon string
	*@return $datos array
	**/
		$vin = $this->manejadorBD->escaparVariable($vin);
		$ubicacion = $this->manejadorBD->escaparVariable($ubicacion);
		$subUbicacion = $this->manejadorBD->escaparVariable($subUbicacion);

		$query = "INSERT INTO Ubicacion(vin,ubicacion,subUbicacion) VALUES('$vin', '$ubicacion', '$subUbicacion');";
		$select = "SELECT * FROM Ubicacion WHERE vin = '$vin';";
		$this->datos = $this->manejadorBD->insertar($query, $select);

		return $this->datos;
	}

	function modificar($vin, $Nubicacion, $NsubUbicacion)
	{
	/**
	*Funcion que modifica en la Base de Datos
	*Busca el vin y modifica el contenido que contenga ese vin
	*@param $vin string
	*@param $Nubicacion string
	*@param $NsubUbicaicon string
	*@return $datos array
	**/
		$vin = $this->manejadorBD->escaparVariable($vin);
		$Nubicacion = $this->manejadorBD->escaparVariable($Nubicacion);
		$NsubUbicacion = $this->manejadorBD->escaparVariable($NsubUbicacion);

		$query = "UPDATE Ubicacion SET ubicacion = '$Nubicacion', subUbicacion = '$NsubUbicacion'
		          WHERE vin = $vin";
		$select = "SELECT * FROM Ubicacion WHERE vin = $vin;";
		$this->datos = $this->manejadorBD->modificar($query, $select);
		return $this->datos;
	}

	function eliminar($vin)
	{
	/**
	*Funcion que elimina en la Base de Datos
	*Busca con el VIN y elimina de la Base de Datos
	*@param $vin string
	*@return $datos array
	**/
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "DELETE FROM Ubicacion WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->eliminar($query);

		return $this->datos;
	}
}
