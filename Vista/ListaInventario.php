<?php
	print 'El inventario contiene: ';
	print '<br/>';
	var_dump($this->modelo->datos);
	print '<br/>';
	print 'El usuario que lo capturó: ';
	print '<br/>';
	var_dump($this->modeloUsuario->datos);
	print '<br/>';
	print 'La ubicacion Actual: ';
	print '<br/>';
	var_dump($this->modeloUbicacion->datos);
	print '<br/>';
	print 'Caracteristicas del vehiculo: ';
	print '<br/>';
	var_dump($this->modeloVehiculo->datos);
?>
