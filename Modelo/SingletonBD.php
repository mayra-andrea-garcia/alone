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
<<<<<<< HEAD
   
   	$this->eliminarExitoso = $this->manejadorBD->query($query);
=======
   	/**
   	*Elimina el query que recibe por parametro
   	*@param $query string
   	*@return $eliminarExitoso boolean
   	*/
   		$this->eliminarExitoso = $this->manejadorBD->query($query);
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		if($this->manejadorBD->error)
		{
			print 'ERROR: EL QUERY AL ELIMINAR FALLO';
			print '<br/>';
<<<<<<< HEAD
      return $this->eliminarExitoso;
		}
		else
		{ 
			return $this->eliminarExitoso;
		}
    
   }
    /**
    *Elimina el query que recibe por parametro
    *@param $query string
    *@return $eliminarExitoso boolean
    */

   public function modificar($query, $select)
   {
   	$this->modificarExitoso = $this->manejadorBD->query($query);
=======
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
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
		if($this->manejadorBD->error)
		{
			print 'ERROR: EL QUERY AL MODIFICAR FALLO';
			print '<br/>';
		}
		else if($this->modificarExitoso) 
		{ 
			$objectoMysqli = $this->manejadorBD->query($select);
<<<<<<< HEAD
      $this->datos = $objectoMysqli->fetch_assoc();
      return $this->datos;
		}
   }
   /**
    *Modifica el query que recibe y selecciona
    *@param $query string 
    *@param $select string
    *@return $datos array
    */

   public function listar($query)
   {
   	
   	$objectoMysqli = $this->manejadorBD->query($query);
=======
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
<<<<<<< HEAD
   	$objectoMysqli = $this->manejadorBD->query($query);
=======
   		$objectoMysqli = $this->manejadorBD->query($query);
>>>>>>> 1e8c7f46df4299193a86d17f17aa84a1c1decc3d
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
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
<<<<<<< HEAD
   /**
    *Lista el query que recibe
    *@param $query string
    *@return $datos array
    */
=======
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6

	// Evita que el objeto se pueda clonar
    public function __clone()
    {
<<<<<<< HEAD
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
      /**
      *Evita que este objeto sea clonado
      *@param No contiene
      *@return No contiene
      */
=======
    	/**
    	*Evita que este objeto sea clonado
    	*@param No contiene
    	*@return No contiene
    	*/
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
>>>>>>> 219de2d412cbc92ad4d8cbcfd7c14da91f6760f6
}

?>