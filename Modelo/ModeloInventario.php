<?php

class ModeloInventario
{

	public $datos;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
	public $manejadorBD;

	function __construct()
	{
		require_once("SingletonBD.php");
		$this->manejadorBD = SingletonBD::singleton();
	}

	
	function agregar($numEmpleado, $vin, $kilometraje, $combustible, $golpes, $severidad, $piezaGolpeada)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======


	function agregar($vin, $kilometraje, $combustible, $golpes, $severidad, $piezaGolpeada)
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$vin = $this->manejadorBD->escaparVariable($vin);
		$kilometraje = $this->manejadorBD->escaparVariable($kilometraje);
		$combustible = $this->manejadorBD->escaparVariable($combustible);
		$golpes = $this->manejadorBD->escaparVariable($golpes);
		$severidad = $this->manejadorBD->escaparVariable($severidad);
		$numEmpleado = $this->manejadorBD->escaparVariable($numEmpleado);
		$piezaGolpeada = $this->manejadorBD->escaparVariable($piezaGolpeada);


<<<<<<< HEAD
		$query = "INSERT INTO Inventario(kilometraje, combustible, golpe, severidad, piezaGolpeada, vin, numEmpleado) 
		          VALUES($kilometraje, $combustible, '$golpes', '$severidad','$piezaGolpeada', '$vin', $numEmpleado);";
		$select = "SELECT * FROM Inventario WHERE vin = '$vin' AND numEmpleado = $numEmpleado;";
		$this->datos = $this->manejadorBD->insertar($query, $select);

=======
		$query = "INSERT INTO Inventario(kilometraje, combustible, golpe, severidad, piezaGolpeada, vin, numEmpleado) VALUES($kilometraje, $combustible, '$golpes', '$severidad','$piezaGolpeada', '$vin', $numEmpleado);";
		$select = "SELECT * FROM Inventario WHERE vin = '$vin' AND numEmpleado = $numEmpleado;";
		$this->datos = $this->manejadorBD->insertar($query, $select);

<<<<<<< HEAD
=======
=======
		$this->datos = array('vin'=>$vin,
							 'kilometraje'=>$kilometraje,
						     'combustible'=>$combustible,
						     'golpes'=>$golpes,
						     'severidad'=>$severidad,
						     'piezaGolpeada'=>$piezaGolpeada);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "SELECT * FROM Inventario INNER JOIN Vehiculo ON Inventario.vin = Vehiculo.vin 
		          INNER JOIN Ubicacion ON Inventario.vin = Ubicacion.vin WHERE Inventario.vin='$vin';";
		$this->datos = $this->manejadorBD->listar($query);
	
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
		$this->datos = array('vin'=>$vin,
							 'kilometraje'=>'VariableKilometrajeBD',
							 'Combustible'=>'VariableCombustibleBD',
							 'golpes'=>'VariableGolpesBD',
							 'severidad'=>'VariableSeveridadBD',
							 'piezaGolpeada'=>'VariablePiezaGolpeadaDB');
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		return $this->datos;
	}

	function modificar($vin, $kilometraje, 
		               $combustible, $golpe,
<<<<<<< HEAD
		               $severidad, $piezaGolpeada, $numEmpleado)
=======
<<<<<<< HEAD
		               $severidad, $piezaGolpeada, $numEmpleado)
=======
<<<<<<< HEAD
		               $severidad, $piezaGolpeada, $numEmpleado)
=======
		               $severidad, $piezaGolpeada)
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
		$this->datos = array('vin'=>$vin,
							 'kilometraje'=>$kilometraje,
							 'combustible'=>$combustible,
							 'golpes'=>$golpe,
							 'severidad'=>$severidad,
							 'piezaGolpeada'=>$piezaGolpeada);
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		$vin = $this->manejadorBD->escaparVariable($vin);

		$query = "DELETE FROM Inventario WHERE vin='$vin';";
		$this->datos = $this->manejadorBD->eliminar($query);

		return $this->datos;
	}	
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
		$this->datos = array('vin'=>'NULL',
						    'kilometraje' =>'NULL',
						    'combusitble'=>'NULL',
						    'golpes'=>'NULL',
						    'severidad'=>'NULL',
						    'piezaGolpeada'=>'NULL');
		return $this->datos;
	}

	
>>>>>>> a7bd1f78dfe18bc3e9f1c08962a017205decdf9a
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
}

?>
