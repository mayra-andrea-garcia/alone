<?php

class ModeloUbicacion
{

	public $datos;


	function listar($vin)
	{
	/**
	*Funcion que lista de la Base de Datos
	*@param $vin string
	*@return $datos array
	**/
		$this->datos = array('vin'=>$vin,
							 'ubicacion'=>'VariableUbicacionBD',
							 'subUbicacion'=>'VariableSubUbicacionBD');
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
		$this->datos = array('vin'=>$vin,
						     'ubicacion'=>$ubicacion,
							 'subUbicacion'=>$subUbicacion);
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
		$this->datos = array('vin'=>$vin,
							 'ubicacion'=>$Nubicacion,
							 'subUbicacion'=>$NsubUbicacion);
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
		$this->datos = array('vin'=>'NULL',
							 'ubicacion'=>'NULL',
							 'subUbicacion'=>'NULL');
		return $this->datos;
	}
}
