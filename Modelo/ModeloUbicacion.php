<?php

class ModeloUbicacion
{

	public $datos;

<<<<<<< HEAD
	function __construct()
	{
		require_once("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}
=======
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a

	function listar($vin)
	{
	/**
	*Funcion que lista de la Base de Datos
	*@param $vin string
	*@return $datos array
	**/
<<<<<<< HEAD
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "SELECT * FROM Ubicacion WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->listar($query);
	
=======
		$this->datos = array('vin'=>$vin,
							 'ubicacion'=>'VariableUbicacionBD',
							 'subUbicacion'=>'VariableSubUbicacionBD');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
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
<<<<<<< HEAD
		$vin = $this->manejadorBD->escaparVariable($vin);
		$ubicacion = $this->manejadorBD->escaparVariable($ubicacion);
		$subUbicacion = $this->manejadorBD->escaparVariable($subUbicacion);

		$query = "INSERT INTO Ubicacion(vin,ubicacion,subUbicacion) VALUES('$vin', '$ubicacion', '$subUbicacion');";
		$select = "SELECT * FROM Ubicacion WHERE vin = '$vin';";
		$this->datos = $this->manejadorBD->insertar($query, $select);

=======
		$this->datos = array('vin'=>$vin,
						     'ubicacion'=>$ubicacion,
							 'subUbicacion'=>$subUbicacion);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
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
<<<<<<< HEAD
		$vin = $this->manejadorBD->escaparVariable($vin);
		$Nubicacion = $this->manejadorBD->escaparVariable($Nubicacion);
		$NsubUbicaicon = $this->manejadorBD->escaparVariable($NsubUbicaicon);

		$query = "UPDATE Ubicacion SET ubicacion = '$Nubicacion', subUbicacion = '$NsubUbicaicon'
		          WHERE vin = $vin";
		$select = "SELECT * FROM  WHERE vin = $vin;";
		$this->datos = $this->manejadorBD->modificar($query, $select);
=======
		$this->datos = array('vin'=>$vin,
							 'ubicacion'=>$Nubicacion,
							 'subUbicacion'=>$NsubUbicacion);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
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
<<<<<<< HEAD
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "DELETE FROM Ubicacion WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->eliminar($query);

=======
		$this->datos = array('vin'=>'NULL',
							 'ubicacion'=>'NULL',
							 'subUbicacion'=>'NULL');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
		return $this->datos;
	}
}
