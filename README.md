

SE UTILIZO POSTMAN PARA PROBAR LOS MODULOS

#ESPECIFICACIONES PROYECTO TALLER DE VEHICULOS:

Se Implementarón 4 modulos:

1.-Usuario <br/>
2.-Ubicacion <br/>
3.-Vehiculo <br/>
4.-Inventario <br/>

El usuario se trata del empleado que se encargara de capturar los datos que necesite en cada uno de los
otros 3 modulos. 

La ubicacion se trata de lo que el usuario capturará para determinar la ubicacion del vehiculo, proporcionando tambien
el numero de identificacion 'VIN' el cual es utilizado para los 4 modulos ya que es un numero unico que cada vehiculo tendrá cuando llegue al taller.

El vehiculo contiene las caracteristicas del vehiculo para que puedan ser utilizados por los otros 3 modulos.

El inventario es el modulo mas complejo, al concentrar los otros 3 y mostrar la informacion de todos los modulos.

El sistema permite la siguientes funciones en los 4 modulos, manejando los datos de forma correspondiente al modulo:

Creacion
Consulta
Modificacion
Eliminacion

A continuacion se muestra los URL por cada modulo y los parametros que recibe
para poder probar el sistema:

#MODULOS

VEHICULO:

A) crear:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=vehiculo&actividad=crear <br/>
variables: vin(string), marca(string), tipo(string), modelo(string)

B) listar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=vehiculo&actividad=listar <br/>
variables: vin(string)

c) modificar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=vehiculo&actividad=modificar <br/>
variables:vin(string), marca(string), tipo(string), modelo(string)

D) eliminar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=vehiculo&actividad=eliminar <br/>
variables: vin(string)

------------------------------------------------------------------------------------------------------------------------

USUARIO

A) crear:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=usuario&actividad=crear <br/>
variables: nombre(string), email(string), telefono(string), 
	   direccion(string), rfc(string), numEmpleado(string)

B) listar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=usuario&actividad=listar <br/>
variables: numEmpleado(string)

c) modificar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=usuario&actividad=modificar <br/>
variables: nombre(string), email(string), telefono(string), 
	   direccion(string), rfc(string), numEmpleado(string)

D) eliminar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=usuario&actividad=eliminar <br/>
variables: numEmpleado(string)

------------------------------------------------------------------------------------------------------------------------

UBICACION

A) agregar: 
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=ubicacion&actividad=agregar <br/>
variables: vin(string), ubicacion(string), subUbicacion(string)

B) listar:

URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=ubicacion&actividad=listar <br/>
variables: vin(string)

C) modificar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=ubicacion&actividad=modificar <br/>
variables: vin(string), ubicacion(string), subUbicacion(string)

D) eliminar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=ubicacion&actividad=eliminar <br/>
variables: vin(string)

------------------------------------------------------------------------------------------------------------------------

INVENTARIO

A) agregar
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=inventario&actividad=agregar <br/>
variables: vin(string), kilometraje(string), combustible(string),
           golpe(string), severidad(string), piezaGolpeada(string)

B) listar
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=inventario&actividad=listar <br/>
variables: vin(string), numEmpleado(string)

C) modificar:
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=inventario&actividad=modificar <br/>
variables:vin(string), kilometraje(string), combustible(string),
           golpe(string), severidad(string), piezaGolpeada(string) 

D) eliminar: 
URL: http://alone-mayra.comli.com/TallerVehiculos/index.php/?control=inventario&actividad=eliminar <br/>
variables:vin(string)
 
#DESARROLLADOR

Mayra Andrea Garcia Martinez
