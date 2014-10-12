<?php
/** 
*Patron de Diseño Singleton
*@author Mayra Garcia
*@version 1.0
*/
class SingletonBD
{
	private $manejadorBD;
	private static $instancia;
	private $insertarExitoso;
	private $eliminarExitoso;
	private $datos;

	private function __construct()
	{
		/**
		*Constructor que realiza la conexion Base de Datos
		*@param No contiene
		*@return No contiene
		*/
		require_once("basedatos_conf.inc");
		$this->manejadorBD = new mysqli($host, $username, $pass, $dbname);
		if($this->manejadorBD->connect_error)
		{
			die("Error: No me pude conectar :(");
		}
	}

  	// método singleton
    public static function singleton()
    {
    	/**
    	*Realiza el singleton
    	*@param No contiene
    	*@return $instancia object mysqli
    	*/
        if (!isset(self::$instancia)) 
        {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        } 
        return self::$instancia;
    }

   public function escaparVariable($variable)
   {	
   	/**
   	*Escapa Todas las variables para los query
   	*@param $variable string
   	*@return $varEscapada string
   	*/
   		$varEscapada = $this->manejadorBD->escape_string($variable);
   		return $varEscapada;
   } 

   public function insertar($query, $select)
   {
   	/**
   	*Inserta en la base de Datos y selecciona
   	*@param $query string
   	*@param $select string
   	*@return $datos array
   	*/
   		$this->insertarExitoso = $this->manejadorBD->query($query);
		if($this->manejadorBD->error)
		{
			print 'ERROR: EL QUERY AL INSERTAR FALLO';
			print '<br/>';
		}
		else if($this->insertarExitoso) 
		{ 
			$objectoMysqli = $this->manejadorBD->query($select);
			$this->datos = $objectoMysqli->fetch_assoc();
			return $this->datos;
		}
   }

   public function eliminar($query)
   {
   	/**
   	*Elimina el query que recibe por parametro
   	*@param $query string
   	*@return $eliminarExitoso boolean
   	*/
   		$this->eliminarExitoso = $this->manejadorBD->query($query);
		if($this->manejadorBD->error)
		{
			print 'ERROR: EL QUERY AL ELIMINAR FALLO';
			print '<br/>';
		}
		else if($this->eliminarExitoso) 
		{ 
			return $this->eliminarExitoso;
		}
   }

   public function modificar($query, $select)
   {
   	/**
   	*Modifica el query que recibe y selecciona
   	*@param $query string 
   	*@param $select string
   	*@return $datos array
   	*/
   		$this->modificarExitoso = $this->manejadorBD->query($query);
		if($this->manejadorBD->error)
		{
			print 'ERROR: EL QUERY AL MODIFICAR FALLO';
			print '<br/>';
		}
		else if($this->modificarExitoso) 
		{ 
			$objectoMysqli = $this->manejadorBD->query($select);
			$this->datos = $objectoMysqli->fetch_assoc();
			return $this->datos;
		}
   }

   public function listar($query)
   {
   	/**
   	*Lista el query que recibe
   	*@param $query string
   	*@return $datos array
   	*/
   	$objectoMysqli = $this->manejadorBD->query($query);
		if($this->manejadorBD->error)
		{
			print 'ERROR: EL QUERY AL LISTAR FALLO';
			print '<br/>';
		}
		else 
		{ 
			$objectoMysqli = $this->manejadorBD->query($query);
			$this->datos = $objectoMysqli->fetch_assoc();
			return $this->datos;
		}
   }

	// Evita que el objeto se pueda clonar
    public function __clone()
    {
    	/**
    	*Evita que este objeto sea clonado
    	*@param No contiene
    	*@return No contiene
    	*/
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}

?>