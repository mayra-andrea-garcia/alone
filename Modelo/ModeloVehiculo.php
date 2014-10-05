<?php
/** 
*Modelo Vehiculo
*@author Mayra Garcia
*@version 1.0
*/
class ModeloVehiculo
{

	public $datos;
	public $manejadorBD;

	function __construct()
	{
		require_once("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}


	function crear($vin,$marca,$tipo,$modelo,$fecha,$dia,$numEmpleado)
	{
	/**
	*Funcion que agrega en la Base de Datos
	*@param $vin string
	*@param $marca string
	*@param $tipo string
	*@param $modelo string
	*@return $datos array
	**/
		$vin = $this->manejadorBD->escaparVariable($vin);
		$marca = $this->manejadorBD->escaparVariable($marca);
		$tipo = $this->manejadorBD->escaparVariable($tipo);
		$modelo = $this->manejadorBD->escaparVariable($modelo);
		$fecha = $this->manejadorBD->escaparVariable($fecha);
		$dia = $this->manejadorBD->escaparVariable($dia);
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);

		$query = "INSERT INTO Vehiculo(vin,marca,tipo,modelo,fecha,dia,numEmpleado) VALUES($vin, '$marca', '$tipo', '$modelo', '$fecha', '$dia',$numEmpleado);";
		$select = "SELECT * FROM Vehiculo WHERE vin=$vin;";
		$this->datos = $this->manejadorBD->insertar($query, $select);

		return $this->datos;
	}

	function listar($vin)
	{
	/**
	*Funcion que lista de la Base de Datos
	*@param $vin string
	*@return $datos array
	**/
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "SELECT * FROM Vehiculo WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->listar($query);
	
		return $this->datos;
	}

	function listarRangoFecha($fecha)
	{
	/**
	*Lista los Vehiculos en un Rango Dado
	*@param $fecha string
	*@return $datos array
	*/
		$fecha = $this->manejadorBD->escaparVariable($fecha);
		
		$query = "SELECT * FROM Vehiculo WHERE fecha='$fecha';";
		$this->datos = $this->manejadorBD->listar($query);

		var_dump($this->datos);
		return $this->datos;
	}

	function ListarDiasSumados($fechaFinal)
	{
	/**
	*Lista dias sumados a hoy
	*@param $fechaFinal string
	*@return $datos array
	*/
		//$fechaFinal = $this->manejadorBD->escaparVariable($fechaFinal);

		//$query = "SELECT * FROM Vehiculo WHERE fecha='$fecha';";
		//$this->datos = $this->manejadorBD->listar($query);
		$this->datos = array('fechaFinal' => $fechaFinal);
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
	*/
		$vin = $this->manejadorBD->escaparVariable($vin);
		$Nmarca = $this->manejadorBD->escaparVariable($Nmarca);
		$Ntipo = $this->manejadorBD->escaparVariable($Ntipo);
		$Nmodelo = $this->manejadorBD->escaparVariable($Nmodelo);

		$query = "UPDATE Vehiculo SET marca = '$Nmarca', tipo = '$Ntipo', modelo = '$Nmodelo' WHERE vin = $vin";
		$select = "SELECT * FROM Vehiculo WHERE vin = $vin;";
		$this->datos = $this->manejadorBD->modificar($query, $select);
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
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "DELETE Vehiculo,Ubicacion from Vehiculo
		          join Ubicacion ON Vehiculo.vin = Ubicacion.vin
                  WHERE Vehiculo.vin='$vin';";
		//$query = "DELETE FROM Vehiculo WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->eliminar($query);

		return $this->datos;
	}
}

?>
