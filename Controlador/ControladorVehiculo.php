<?php
/** 
*Controlador de Vehiculos
*@author Mayra Garcia
*@version 1.0
*/
class ControladorVehiculo
{
	public $modelo;

	function __construct()
	{
		/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*@param No recibe
		*@throws No se generan excepciones
		*/
		require('Modelo/ModeloVehiculo.php');
		require('Controlador/SanitizadorDatos.php');
		$this->modelo = new ModeloVehiculo();
	}

	function __set($modelo, $valor)
	{
		/**
		*Modifica el valor de Modelo
		*@param $modelo tipo Object
		*@param $valor tipo String
		*/
		$this->modelo = $modelo;
	}

	function __get($modelo)
	{
		/**
		*Retorna el valor de Modelo
		*@param $modelo tipo Object
		*@return $modelo tipo Object
		*/
		return $modelo;
	}

	function run()
	{
		/**
		*La entrada a la clase, se ejecuta segun la actividad
		*@param No contiene
		*@return No retorna valor
		*@throws No lleva excepciones
		*/
			switch ($_GET['actividad']) {
				case 'crear':
					$this->crear();
					break;
				case 'listar':
					$this->listar();
					break;
				case 'eliminar':
					$this->eliminar();
					break;
				case 'modificar':
					$this->modificar();
					break;
				default:
					echo 'Error: Esa actividad no existe';
					break;
			}
	}

	private function crear(){
		/**
		*Crea un Vehiculo
		*@param No contiene
		*@return No retorna valor
		*/
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$marca = SanitizadorDatos::validaTexto($_POST['marca']);
		$tipo = SanitizadorDatos::validaTexto($_POST['tipo']);
		$modelo = SanitizadorDatos::validaM($_POST['modelo']);

		$result = $this->modelo->crear($vin, $marca, $tipo, $modelo);

		//Revisa si se creo el Vehiculo
		if(isset($result))
		{
			//carga la vista
			require('Vista/CrearVehiculo.php');
		}
		else
		{
			echo 'Error: No se pudo crear el vehiculo';
		}
	}

	private function listar()
	{
		/**
		*Metodo que lista un Vehiculo
		*@param no contiene 
		*@return no retorna
		*/	
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);

		$result = $this->modelo->listar($vin);

		///Revisa si se puede listar el vehiculo
		if(isset($result))
		{
			//carga la vista
			require('Vista/ListaVehiculo.php');
		}
		else
		{
			echo 'Error: El vehiculo no existe';
		}
	}

	private function modificar()
	{
		/**
		*Modifica un Vehiculo
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$Nmarca = SanitizadorDatos::validaTexto($_POST['marca']);
		$Ntipo = SanitizadorDatos::validaTexto($_POST['tipo']);
		$Nmodelo = SanitizadorDatos::validaNumero($_POST['modelo']);

		$result = $this->modelo->modificar($vin, $Nmarca, $Ntipo, $Nmodelo);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
			//carga la vista
			require('Vista/ModificaVehiculo.php');
		}
		else
		{
			echo 'Error: El vehiculo no existe';
		}
	}

	private function eliminar()
	{
		/**
		*Elimina una unbicacion
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);

		$result = $this->modelo->eliminar($vin);

		//Revisa si se realizo la eliminacion
		if(isset($result))
		{
			//carga la vista
			require('Vista/EliminaVehiculo.php');
		}
		else
		{
			echo 'Error: El vehiculo no existe';
		}
	}

}

?>
