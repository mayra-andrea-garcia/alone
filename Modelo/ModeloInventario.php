<?php

class ModeloInventario
{

	public $datos;
	public $manejadorBD;

	function __construct()
	{
		require_once("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}

	
	function agregar($numEmpleado, $vin, $kilometraje, $combustible, $golpes, $severidad, $piezaGolpeada)
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
		$vin = $this->manejadorBD->escaparVariable($vin);
		$kilometraje = $this->manejadorBD->escaparVariable($kilometraje);
		$combustible = $this->manejadorBD->escaparVariable($combustible);
		$golpes = $this->manejadorBD->escaparVariable($golpes);
		$severidad = $this->manejadorBD->escaparVariable($severidad);
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);
		$piezaGolpeada = $this->manejadorBD->escaparVariable($piezaGolpeada);


		$query = "INSERT INTO Inventario(kilometraje, combustible, golpe, severidad, piezaGolpeada, vin, numEmpleado) VALUES($kilometraje, $combustible, '$golpes', '$severidad','$piezaGolpeada', '$vin', $numEmpleado);";
		$select = "SELECT * FROM Inventario WHERE vin = '$vin' AND numEmpleado = $numEmpleado;";
		$this->datos = $this->manejadorBD->insertar($query, $select);

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
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "SELECT * FROM Inventario INNER JOIN Vehiculo ON Inventario.vin = Vehiculo.vin 
		          INNER JOIN Ubicacion ON Inventario.vin = Ubicacion.vin WHERE Inventario.vin='$vin';";
		$this->datos = $this->manejadorBD->listar($query);
	
		return $this->datos;
	}

	function modificar($vin, $kilometraje, 
		               $combustible, $golpe,
		               $severidad, $piezaGolpeada, $numEmpleado)
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
		$vin = $this->manejadorBD->escaparVariable($vin);
		$kilometraje = $this->manejadorBD->escaparVariable($kilometraje);
		$combustible = $this->manejadorBD->escaparVariable($combustible);
		$golpe = $this->manejadorBD->escaparVariable($golpe);
		$severidad = $this->manejadorBD->escaparVariable($severidad);
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);
		$piezaGolpeada = $this->manejadorBD->escaparVariable($piezaGolpeada);

		$query = "UPDATE Inventario SET numEmpleado = $numEmpleado,
		                                kilometraje = '$kilometraje', 
		                                combustible = '$combustible', golpe = '$golpe',
		                                severidad = '$severidad', piezaGolpeada = '$piezaGolpeada' 
		                                WHERE vin = $vin";
		$select = "SELECT * FROM Inventario WHERE vin = $vin;";
		$this->datos = $this->manejadorBD->modificar($query, $select);
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
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "DELETE FROM Inventario WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->eliminar($query);

		return $this->datos;
	}	
}

?>
