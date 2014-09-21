<?php
/** 
*Controlador de Ubicacion
*@author Mayra Garcia
*@version 1.0
*/
class ControladorUbicacion
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
		require('Modelo/ModeloUbicacion.php');
		require('Controlador/SanitizadorDatos.php');
		$this->modelo = new ModeloUbicacion();
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
			switch ($_GET['actividad']) 
			{
				case 'listar':
					$this->listar();
					break;
				case 'eliminar':
					$this->eliminar();
					break;
				case 'modificar':
					$this->modificar();
					break;
				case 'agregar':
					$this->agregar();
					break;
				default:
					echo 'Error: La actividad no existe';
					break;
			}
	}

	public function listar()
	{
		/**
		*Metodo que lista una Ubicacion 
		*@param no contiene 
		*@return no retorna
		*/	

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		
		$result = $this->modelo->listar($vin);

		//Revisa si se puede listar la ubicacion
		if(isset($result))
		{
			//carga la vista
			require('Vista/ListaUbicacion.php');
		}
		else
		{
			echo 'Error: la Ubicacion no existe';
		}
	}

	public function agregar()
	{
		/**
		*Agrega una Ubicación
		*@param No contiene
		*@return No retorna valor
		*/
		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$ubicacion = SanitizadorDatos::validaTexto($_POST['ubicacion']);
		$subUbicacion = SanitizadorDatos::ValidaTexto($_POST['subUbicacion']);

		$result = $this->modelo->crear($vin, $ubicacion, $subUbicacion);

		//Revisa si la ubicacion se agregó
		if(isset($result))
		{
			//carga la vista
			require('Vista/AgregarUbicacion.php');
		}
		else
		{
			echo 'Error: La ubicacion no se pudo agregar';
		}
	}

	public function modificar()
	{
		/**
		*Modifica una Ubicacion
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$vin = SanitizadorDatos::validaNumero($_POST['vin']);
		$ubicacion = SanitizadorDatos::validaTexto($_POST['ubicacion']);
		$subUbicacion = SanitizadorDatos::validaTexto($_POST['subUbicacion']);


		$result = $this->modelo->modificar($vin, $ubicacion, $subUbicacion);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
			//carga la vista
			require('Vista/ModificaUbicacion.php');
		}
		else
		{
			echo 'Error: La ubicacion no se encontro';
		}
	}

	public function eliminar()
	{
		/**
		*Elimina una Ubicacion
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
			require('Vista/EliminaUbicacion.php');
		}
		else
		{
			echo 'Error: La ubicacion ya no existe';
		}
	}
}

?>