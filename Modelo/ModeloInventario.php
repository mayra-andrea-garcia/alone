<?php

class ModeloInventario
{

	public $datos;


	function agregar($vin, $kilometraje, $combustible, $golpes, $severidad, $piezaGolpeada)
	{
	/**
	*Funcion que agrega en la Base de Datos
	*@param $vin string
	*@param $kilometraje string
	*@param $combustible float
	*@param $golpes string
	*@param $severidad String
	*@param $piezaGolpeada String
	*@return $datos array
	**/
		$this->datos = array('vin'=>$vin,
							 'kilometraje'=>$kilometraje,
						     'combustible'=>$combustible,
						     'golpes'=>$golpes,
						     'severidad'=>$severidad,
						     'piezaGolpeada'=>$piezaGolpeada);
		return $this->datos;
	}

	function listar($vin)
	{
	/**
	*Funcion que lista el contenido de la Base de Datos
	*Utilizando la llave primaria $vin
	*@param $vin string
	*@return $datos array
	**/
		$this->datos = array('vin'=>$vin,
							 'kilometraje'=>'VariableKilometrajeBD',
							 'Combustible'=>'VariableCombustibleBD',
							 'golpes'=>'VariableGolpesBD',
							 'severidad'=>'VariableSeveridadBD',
							 'piezaGolpeada'=>'VariablePiezaGolpeadaDB');
		return $this->datos;
	}

	function modificar($vin, $kilometraje, 
		               $combustible, $golpe,
		               $severidad, $piezaGolpeada)
	{
	/**
	*Funcion que modifica en la Base de Datos
	*Busca el vin y reemplaza lo de la BD por lo valores recibidos
	*@param $vin string
	*@param $kilometraje string
	*@param $combustible float
	*@param $golpes string
	*@param $severidad string
	*@param $piezaGolpeada string
	*@return $datos array
	**/
		$this->datos = array('vin'=>$vin,
							 'kilometraje'=>$kilometraje,
							 'combustible'=>$combustible,
							 'golpes'=>$golpe,
							 'severidad'=>$severidad,
							 'piezaGolpeada'=>$piezaGolpeada);
		return $this->datos;
	}

	function eliminar($vin)
	{
	/**
	*Funcion que elimina de la Base de Datos
	*Se busca el elemento con el Vin proporcionado y se elimina
	*@param $vin string
	*@return $datos array
	**/
		$this->datos = array('vin'=>'NULL',
						    'kilometraje' =>'NULL',
						    'combusitble'=>'NULL',
						    'golpes'=>'NULL',
						    'severidad'=>'NULL',
						    'piezaGolpeada'=>'NULL');
		return $this->datos;
	}

	
}

?>
