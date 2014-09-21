<?php
/** 
*Sanitizador de Parametros
*@author Mayra Garcia
*@version 1.0
*/
class SanitizadorDatos
{

	static function validaCorreo($correo)
	{
		/**
		*Funcion Estatica que valida correo
		*@param $numeroAValidar String
		*@return $numeroSanitizado String
		*/
		$patron = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
		if(isset($correo) && (preg_match($patron, $correo)))
		{
			return $correo; 
		}
		else
		{
			print 'Error: El correo no es valido';
			print '<br/>';
		}
	}  

	static function validaTexto($texto)
	{
		/**
		*Funcion Estatica que valida texto
		*@param $numeroAValidar String
		*@return $numeroSanitizado String
		*/
		$aceptados = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*$/";
		if(isset($texto) && (preg_match($aceptados, $texto)))
		{
			return $texto; 
		}
		else if(isset($texto))
		{
			print 'Error: La cadena que introduces no es texto';
			print '<br/>';
		}
		else
		{
		}
	}

	static function validaDireccion($direccion)
	{
		/**
		*Funcion Estatica que valida Direccion
		*@param $numeroAValidar String
		*@return $numeroSanitizado String
		*/
		$texto = '0123456789 #a..zA..Z';
		if(isset($direccion) && (strlen($direccion) == strspn($direccion, $texto)))
		{
		 	return $direccion;
		}
		else if(isset($direccion))
		{
			print 'Error: La cadena que introduces no es una direccion valida';
			print '<br/>';
		}
		else
		{
			print 'Error: Nos has proporcionado nada';
			print '<br/>';
		}
	} 


	static function validaTelefono($telefono)
	{
		/**
		*Funcion Estatica que valida Telefono
		*@param $numeroAValidar String
		*@return $numeroSanitizado String
		*/
		$digitos = '0123456789- ';
		if(isset($telefono) && (strlen($telefono) == strspn($telefono, $digitos)))
		{
			if(strlen($telefono) >= 4 && strlen($telefono) <= 20)
			{
				return $telefono;
			}
			else
			{
				print 'Error: Recuerda que un numero de telefono tiene al menos 4 digitos y maximo 20';
				print '<br/>';
			} 
		}
		else if(isset($telefono))
		{
			print 'Error: La cadena que introduces no es numero';
			print '<br/>';
		}
		else
		{
			print 'Error: Nos has proporcionado nada';
			print '<br/>';
		}
	} 

	static function validaNumero($numero)
	{
		/**
		*Funcion Estatica que valida Numero
		*@param $numeroAValidar String
		*@return $numeroSanitizado String
		*/
		$digitos = '0123456789';
		if(isset($numero) && (strlen($numero) == strspn($numero, $digitos)))
		{
			return $numero; 
		}
		else if(isset($numero))
		{
			print 'Error: La cadena que introduces no es numero';
			print '<br/>';
		}
		else
		{
			print 'Error: Nos has proporcionado nada';
			print '<br/>';
		}
	} 
}

?>
