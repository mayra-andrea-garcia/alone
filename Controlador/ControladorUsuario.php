<?php
/** 
*Controlador de Usuarios
*@author Mayra Garcia
*@version 1.0
*/

class ControladorUsuario
{
	private $modelo;
	

	function __construct()
	{
		/**
		*Se incluye el Modelo que corresponde al Controlador
		*Se incluye un Sanitizador de Datos
		*@param string
		*@throws No se generan excepciones
		*/
		require('Modelo/ModeloUsuario.php');
		require('Controlador/SanitizadorDatos.php');
		$this->modelo = new ModeloUsuario();
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
				case 'listar':
					$this->listar();
					break;
				case 'crear':
					$this->crear();
					break;
				case 'eliminar':
					$this->eliminar();
					break;
				case 'modificar':
					$this->modificar();
					break;
				default:
					echo 'Error: Esa Actividad no existe';
					break;
		    }
	}

	public function listar()
	{
		/**
		*Metodo que lista el Usuario 
		*@param no contiene 
		*@return no retorna
		*/	
		
		//Se consiguen los valores desde POST y se Sanitizan
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
		
		$result = $this->modelo->listar($numEmpleado);

		//Revisa si se puede listar el usuario 
		if(isset($result))
		{
			//carga la vista
			require('Vista/ListaUsuario.php');
		}
		else
		{
			echo 'Error: el usuario no se a insertado';
		}
	}

	public function crear()
	{
		/**
		*Crea un Usuario
		*@param No contiene
		*@return No retorna valor
		*/
		
		//Se consiguen los valores desde POST y se Sanitizan
		$nombre = SanitizadorDatos::validaTexto($_POST['nombre']);
		$email = SanitizadorDatos::validaCorreo($_POST['email']);
		$telefono = SanitizadorDatos::validaTelefono($_POST['telefono']);
		$direccion = SanitizadorDatos::validaDireccion($_POST['direccion']);
		$rfc = SanitizadorDatos::validaTexto($_POST['rfc']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		
		$result = $this->modelo->crear($nombre, $email, 
									   $telefono, $direccion, 
									   $rfc, $numEmpleado);

		//Revisa si se creo el usuario
		if(isset($result))
		{
			//carga la vista
			require('Vista/CrearUsuario.php');
		}
		else
		{
			echo 'Error: el usuario no se a insertado';
		}
	}

	public function modificar()
	{	
		/**
		*Modifica un Usuario
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$nombre = SanitizadorDatos::validaTexto($_POST['nombre']);
		$email = SanitizadorDatos::validaCorreo($_POST['email']);
		$telefono = SanitizadorDatos::validaTelefono($_POST['telefono']);
		$direccion = SanitizadorDatos::validaDireccion($_POST['direccion']);
		$rfc = SanitizadorDatos::validaTexto($_POST['rfc']);
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);

		
		$result = $this->modelo->modificar($nombre, $email, 
										   $telefono, $direccion, 
										   $rfc, $numEmpleado);

		//Revisa si se realizo la modificacion
		if(isset($result))
		{
			//carga la vista
			require('Vista/ModificaUsuario.php');
		}
		else
		{
			echo 'Error: el usuario no se a modificado';
		}
	}

	public function eliminar()
	{
		/**
		*Elimina un Usuario
		*@param No contiene
		*@return No retorna valor
		*/

		//Se consiguen los valores desde POST y se Sanitizan
		$numEmpleado = SanitizadorDatos::validaNumero($_POST['numEmpleado']);
				
		$result = $this->modelo->eliminar($numEmpleado);

		//Revisa si la Eliminacion fue Exitosa
		if(isset($result))
		{
			///carga la vista
			require('Vista/EliminaUsuario.php');
		}
		else
		{
			echo 'Error: el usuario ya se habia eliminado';
		}
	}
}

?>