<?php
/** 
*Clase de Envios de Correos
*@author Mayra Garcia
*@version 1.0
*/
class EnviarCorreo
{
	private $mail;
	/**
	*Se incluye la clase PHP mailer para el envio de correos
	*@param No recibe
	*@throws No se generan excepciones
	*/
	function __construct()
	{
		require_once("PHPMailerAutoload.php");
		$this->mail = new PHPMailer();
	}

	function enviarCorreo($correo, $nombreUsuario, $correoAdmin)
	{
		/**
		*Se Envia el correo con los parametros deseados
		*@return $enviado Boolean
		*@param $correo String
		*@param $nombreUsuario String
		*@param $correoAdmin String
		*@throws No se generan excepciones
		*/

		//Definir que vamos a usar SMTP
		$this->mail->IsSMTP();
		$this->mail->SMTPDebug  = 0;
		$this->mail->Host       = 'smtp.gmail.com';
		$this->mail->Port       = 587;
		$this->mail->SMTPSecure = 'tls';
		$this->mail->SMTPAuth   = true;
		$this->mail->Username   = "mayra.andrea.garcia@gmail.com";
		$this->mail->Password   = "Andrea_2066";
		$this->mail->SetFrom('mayra.andrea.garcia@gmail.com', 'Mayra Garcia');
		$this->mail->AddReplyTo('mayra.andrea.garcia@gmail.com','Mayra Garcia');
		$this->mail->AddAddress("$correo", "$nombreUsuario");
		$this->mail->addCC("$correoAdmin");
		$this->mail->Subject = 'BIENVENIDO AL TALLER DE VEHICULOS';
		$this->mail->MsgHTML("Hola $nombreUsuario <br/> <br/>".
			            "Te han registrado en el taller de vehiculos <br/>".
			            "Intenta loguearte en la siguiente pagina: <br/>".
			            "<a href= 'http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=login&actividad=login'> INICIA SESION AQUI </a>".
			            "<br/> <br/> Saludos");
		$this->mail->altBody = "Hola $nombreUsuario: ";
		
		$enviado = $this->mail->Send();

		return $enviado;
	}

}

?>