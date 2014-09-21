<?php

class ModeloVehiculo
{

	public $datos;


	function crear($vin,$marca,$tipo,$modelo)
	{
	/**
	*Funcion que agrega en la Base de Datos
	*@param $vin string
	*@param $marca string
	*@param $tipo string
	*@param $modelo string
	*@return $datos array
	**/
		$this->datos = array('vin'=>$vin,
						     'marca'=>$marca,
						     'tipo'=>$tipo,
						     'modelo'=>$modelo);
		return $this->datos;
	}

	function listar($vin)
	{
	/**
	*Funcion que lista de la Base de Datos
	*@param $vin string
	*@return $datos array
	**/
		$this->datos = array('vin'=>$vin,
						     'marca'=>'VariableMarcaBD',
						     'tipo'=>'VariableTipoBD',
						     'modelo'=>'VariableModeloBD');
		return $this->datos;
	}

	function modificar($vin,$Nmarca,$Ntipo,$Nmodelo)
	{
	/**
	*Funcion que modifica en la Base de Datos
	*@param $vin string
	*@param $Nmarca string
	*@param $Ntipo string
	*@param $Nmodelo string
	*@return $datos array
	**/
		$this->datos = array('vin'=>$vin,
						     'marca'=>$Nmarca,
						     'tipo'=>$Ntipo,
						     'modelo'=>$Nmodelo);
		return $this->datos;
	}

	function eliminar($vin)
	{
	/**
	*Funcion que Elimina de la Base de Datos
	*Busca el VIN y elimina los datos que corresponden
	*@param $vin string
	*@return $datos array
	**/
		$this->datos = array('vin'=>'NULL',
							 'marca'=>'NULL',
							 'tipo'=>'NULL',
							 'modelo'=>'NULL');
		return $this->datos;
	}
}

?>
