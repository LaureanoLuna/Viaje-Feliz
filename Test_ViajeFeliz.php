<?php

include('ViajeFeliz.php');
include('ResponsableV.php');
include ('Pasajero.php');




$per = [new Pasajero("Laureano","Luna",38232325, 15, new Pasaje("terrestre", "true", 2000)),new Pasajero("Josefo","Giacone",26841599,16, new Pasaje("aereo","primera Clase", 10000)),new Pasajero("Margarita","Muñoz",16589633,17)];//objeto Persona ya creado


$objViaje = new ViajeFeliz(3543,"Neuquen",3,$per); //Objeto viaje ya creado
$objViaje->AgregarResponsable(56,"FAI-3543", "Laureano","Luna");// Agregamos el objeto ResponsableV ya creado
$i = 0;//Inicializamos la variable

//Programa principal

 echo "\n♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀ \n";
echo "\n..............Empresa Viaje Feliz.............\n";
echo "\n♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀ \n";
do {
    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

    echo "\n1) Ingresar un nuevo viaje \n";// Inicializamos un nuevo objeto Persona y ViajeFeliz 
    echo "\n2) Ver los datos del viaje y los Pasajeros \n";// una ves el objeto creado se pueden visualizar sus datos
    echo "\n3) Modificar los datos ya generados \n";// en esta opvion se puede tener acceso a todos los atributos para settearlos
    echo "\n4) Guardar los datos del viaje \n";// guarda el objeto Viaje Feliz en un arreglo con una clave que es el atributo codigo de viaje
    echo "\n5) Ver los viajes ya guardados \n";// visualizamos los datos de los objetos ViajeFeliz ya creados y guardados
    echo "\n6) Salir\n";

    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
    $opciones = trim(fgets(STDIN));
switch ($opciones) {
   case '1':
    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

    $destino = Interaccion("Ingrese el Destino");
    
    $codViaje = Interaccion("Codigo identificatorio de Viaje");

    $capacidadViaje = Interaccion("Capacidad de pasajeros");

   
    $objPasajero = datosPasajero();
    $objResponsable = datosResponsable();
    $objPasaje = datosPasaje($tipoViaje);

    echo "\nDatos del Empleado Resposanble del Viaje \n";
    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
   
    $nomEmpleado = Interaccion("Nombre");

    $apellidoEmpleado = Interaccion("Apellido");
   
    $idEmpleado = Interaccion("Numero Identificatorio del Empleado Responsable");

    $numLegajo =Interaccion("Numero de Legajo del Empleado");

    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

    $p = 0;

    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
    echo "\nIngresar los datos de los Pasajeros\n";

    do {
        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

        $nomPasajero =Interaccion("Nombre");

        $apellidoPasajero =Interaccion("Apellido");

        $dniPasajero =Interaccion("Numero de DNI");
  
        $numTelefono =Interaccion("Numero de Telefono");

        if ($objViaje->VerificacionPersona($dniPasajero)){
            $objPersona[$p]=new Pasajero($nomPasajero, $apellidoPasajero, $dniPasajero, $numTelefono,$objPasaje);
        }else{
            echo "\nEl pasajero ya fue ingresado al viaje\n";
        }

        echo "\n¿ Desea Ingresar otro pasajero ?\n";
        $peppol = trim(fgets(STDIN));
        $p++;

        if (count($objPersona) == $capacidadViaje){

            echo "\nya se lleno el cupo de viajes \n";
            $peppol = "no";

        }

        
    } while ($peppol == "si");

    $objViaje = new ViajeFeliz($codViaje,$destino,$capacidadViaje);
    $objViaje->AgregarResponsable($idEmpleado,$numLegajo,$nomEmpleado,$apellidoEmpleado);
       
       break;
    case '2':
        echo $objViaje;
        
        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
        $x = $objViaje->getObjPersona();
        $i = 1;
        foreach ($x as $key => $value) {
            echo $i.")".$value;
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
            $i++;
        }
        break;
    case '3':                          
            do {
                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

                echo "\nQue modificacion desea realizar \n";
                echo "\n1)Agregar mas pasajeros \n";// agrega un objeto Personal al atributo del objeto viaje
                echo "\n2)Modificar los datos de los pasajeros ya ingresados \n";// ingresa a el siguente menu para poder modificar valores especificos del objeto Persona
                echo "\n3)Borrar algun pasajero ya ingresado \n";// borra y reacomoda los elementos del atributo para que no queden huecos
                echo "\n4)Modificar los datos del responsable del viaje.\n";
                echo "\n5)Cambiar destino del viaje \n";// settea el atributo setDestino con un valor ingresado por teclado 
                echo "\n6)Cambiar la capacidad del viaje \n";// settea el atributo setCapMaxPers con un valor ingresado por teclado
                echo "\n7)Volver al menu anterior \n";// regresa al menu anterior
                $opc = trim(fgets(STDIN));

                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                
                
            switch ($opc) {
                case '1':
                   if ($objViaje->hayPasajesDisponible()) {
                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                    
                        $nomPasajeroNuevo = Interaccion("Nombre");
                
                        $apellidoPasajeroNuevo = Interaccion("Apellido");
            
                        $dniPasajeroNuevo = Interaccion("Numero de DNI");
                    
                        $numPasajeroTelefono = Interaccion("Numero de Telefono");
        
                        if ($objViaje->VerificacionPersona($dniPasajeroNuevo)){

                            $objViaje->AgregrarObjPersona($nomPasajeroNuevo,$apellidoPasajeroNuevo,$dniPasajeroNuevo, $numPasajeroTelefono);
                            echo "\nEl pasajero fue agregado con exito\n";
                        }else{

                            echo "\nEl pasajero ya fue ingresado\n";
                            
                        }
                    }else{
                    echo "\nLa capacidad maxima de pasajeros, ya se completo \n";
                    }
    
                   break;
                case '2':       
    
                   do {
                       if (count($objViaje->getObjPersona()) <> null)
                            {
                                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

                                echo "\nDato que desea modificar \n";
                                echo "\n1) Modificar nombre \n";//Permite settear el atributo con la clave correspondiente al nombre del objeto
                                echo "\n2) Modificar apellido \n";//Permite settear el atributo con la clave correspondiente al apellido del objeto
                                echo "\n3) Modificar numero de DNI \n";//Permite settear el atributo con la clave correspondiente al DNI del objeto
                                echo "\n4) Modificar numero de Telefono \n";//Permite settear el atributo con la clave correspondiente al Numero de telefono del objeto
                                echo "\n5) Volver al menu anterior \n";
                                $opcModificacion =trim(fgets(STDIN));                       
                      
                            switch ($opcModificacion) 
                                {
                                    case '1':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                          
                                        $numPasajero = Interaccion("Indique el numero del pasajero");
                           
                                        $nuevoNombre = Interaccion("Ingrese el nuevo Nombre");
                
                                        $objPasajero = $objViaje->getObjPersona()[$numPasajero - 1]; 

                                        if($objPasajero->CambiarDatos("nombre",$nuevoNombre)){
                                            echo "\n La modificacion se realiazo con exito\n";
                                        }
                                                            
                                        break;
                                    case '2':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                          
                                        $numPasajero = Interaccion("Indique el numero del pasajero");
                        
                                        $nuevoApellido =Interaccion("Ingrese el nuevo Apellido");

                                        $objPasajero = $objViaje->getObjPersona()[$numPasajero - 1]; 

                                        if($objPasajero->CambiarDatos("apellido",$nuevoApellido)){
                                            echo "\n La modificacion se realiazo con exito\n";
                                        }
                                        
                                    
                                        break;
                                    case '3':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                      
                                        $numPasajero = Interaccion("Indique el numero del pasajero");

                                        $nuevoDNI = Interaccion("Ingrese el nuevo numero de DNI");
                
                                        $objPasajero = $objViaje->getObjPersona()[$numPasajero - 1]; 

                                        if($objPasajero->CambiarDatos("DNI",$nuevoDNI)){
                                            echo "\n La modificacion se realiazo con exito\n";
                                        }
                                            
                                        break;
                                    
                                    case '4':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                      
                                        $numPasajero = Interaccion("Indique el numero del pasajero");
                           
                                        $nuevoPhonePasajero = Interaccion("Ingrese el nuevo numero de Telefono");
                
                                        $objPasajero = $objViaje->getObjPersona()[$numPasajero - 1]; 

                                        if($objPasajero->CambiarDatos("Telefono",$nuevoPhonePasajero)){
                                            echo "\n La modificacion se realiazo con exito\n";
                                        }
                                        break;
                                    case '5':
                                        $opcModificacion = 6;
                                        break;    
                                        
                                    default:
                                        echo "\nIngrese una opcion correcta\n";
                                        break; 
                                }
                            
                            }else{

                                echo "No hay Pasajeros ingresados para el viaje";
                                
                                    }
                               
                    
            } while ($opcModificacion < 6);

             
                   break;
                case '3':
                   if (count($objViaje->getObjPersona()) > 0){
                    
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                    
                    echo "\nIndique la ubicacion del pasajero   ";                    
                    $ubicacionPasajero =(trim(fgets(STDIN)) - 1);
                    
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                    
                    if ($ubicacionPasajero <= count($objViaje->getObjPersona())){

                        $objViaje->BorrarPasajero($ubicacionPasajero);

                        echo "\nSe elimino correctamente\n";

                    }else{
                        echo "\nNo se ingresaron esa cantidad de Pasajeros\n";
                    }
                   
                   }else{
                       echo "\nNo hay datos pasajeros ingresados\n";
                   }
                   break;
                case '4':
                    if ($objViaje->getResponsable() <> null){
                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                        echo "\nDato que desea modificar \n";
                                echo "\n1) Modificar nombre \n";//Permite settear el atributo con la clave correspondiente al nombre del objeto
                                echo "\n2) Modificar apellido \n";//Permite settear el atributo con la clave correspondiente al apellido del objeto
                                echo "\n3) Modificar numero de Legajo \n";//Permite settear el atributo con la clave correspondiente al DNI del objeto
                                echo "\n4) Modificar numero de Identificacion \n";//Permite settear el atributo con la clave correspondiente al Numero de telefono del objeto
                                $opcEmpleadoResponsable =trim(fgets(STDIN));

                                switch ($opcEmpleadoResponsable) {
                                    case '1':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                                        $newNombre =Interaccion("Ingrese el nuevo Nombre");

                                        $obj =$objViaje->getResponsable();
                                        $obj->setNombre($newNombre);
                                        break;
                                    case '2':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                                        $newApellido =Interaccion("Ingrese el nuevo Apellido");

                                        $obj =$objViaje->getResponsable();
                                        $obj->setApellido($newApellido);
                                        break;
                                    case '3':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                                        $newLegajo =Interaccion("Ingrese el dato del Legajo");

                                        $obj =$objViaje->getResponsable();
                                        $obj->setNumLegajo($newLegajo);
                                        
                                        break;
                                    case '4':
                                        echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                                        $newidEmpleado =Interaccion("Ingrese el dato de Identificacion");

                                        $obj =$objViaje->getResponsable();
                                        $obj->setIdEmpleado($newLegajo);
                                        
                                        break;

                                    
                                    default:
                                        echo "\nIngrese una opcion valida\n";
                                        break;
                                }
                    }else{
                        echo "\nNo se han ingresado datos del Responsable\n";
                    }
                    
                    break;
                case '5':
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                    $nuevoDestino = Interaccion("Ingrese el nuevo destiono del viaje");
                    
                    $objViaje->setDestino($nuevoDestino);

                    break;
                    
                case '6':
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";    
                    $nuevaCapacidad = Interaccion("Ingrese la nueva capacidad de pasajeros");

                    $objViaje->setCantMaxPers($nuevaCapacidad);

                    break;
                
                    case '7':
                        $opc = 7;
                        break;
                   
                default:
                   echo "\n Ingrese una opcion valida \n";
                    break;
                
            }
           } while ($opc < 7 );
    
        break;
    case '4':/**idea mia esta opcion del menu,
         el cual por medio de unas confimaciones del usuario el objeto viaje se guardan en un arreglo multidimencional
          con la clave del codigo de viaje*/
        echo "\nLos datos ingresados son los correctos\n";
        $decicion = trim(fgets(STDIN));
        if ($decicion == "si"){
            echo "\nDesea guardar los datos en el archivo\n";
            $desicion = trim(fgets(STDIN));
            if ($desicion == "si") {
               
                $cod = $objViaje->getCodigo();
                $archivoViajes[$i] = $objViaje;
                $i++;

                echo "\nLos datos fueron guardados\n";
            }
        }
        break;
    case '5': //visualizamos los objetos ViajesFeliz guardados en un arreglo multidimencional
        foreach ($archivoViajes as $key => $value) {
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
            echo $value;
            $x = $value->getObjPersona();
            $i = 1;
            foreach ($x as $key => $value) {
                echo $i.")".$value;
                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                $i++;
            }
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
        }
        break;
    case '6':
        $opciones = 6;
    default:
       echo "\nIngrese una opcion correcta del menu\n";
        break;
}
} while ($opciones < 6);


function Interaccion($tipoSolicitud)
{
                       
    echo "\n".$tipoSolicitud . ": ";                   
    $valorRetorno = trim(fgets(STDIN));
    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
    return $valorRetorno;
}

function TipoViaje()
{
    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
    echo "\n Elelija el modo de viajar a Destino: \n";
    echo "1) Por medio Terrestre \n";
    echo "2) Por medio Aereo \n";
    $eleccion = trim(fgets(STDIN));

    return $eleccion;
}

function datosPasajero()
    {
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
            echo "\nIngresar los datos de los Pasajeros\n";
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

            $nomPasajero =Interaccion("Nombre");

            $apellidoPasajero =Interaccion("Apellido");

            $dniPasajero =Interaccion("Numero de DNI");
        
            $numTelefono =Interaccion("Numero de Telefono");
            echo "\n¿ Desea Ingresar otro pasajero ?\n";
            
            $objPasajero = new Pasajero($nomPasajero,$apellidoPasajero, $dniPasajero, $numTelefono);

        return $objPasajero;
    }

function datosResponsable()
    {       
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
            echo "\nDatos del Empleado Resposanble del Viaje \n";
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
        
            $nomEmpleado = Interaccion("Nombre");

            $apellidoEmpleado = Interaccion("Apellido");
        
            $idEmpleado = Interaccion("Numero Identificatorio del Empleado Responsable");

            $numLegajo =Interaccion("Numero de Legajo del Empleado");

            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

            $objResponsable = new ResponsableV($idEmpleado,$numLegajo,$nomEmpleado,$apellidoEmpleado);

        return $objResponsable;
    }

    function datosPasaje($tipoViaje)
    {
       $costoPasaje = Interaccion("Ingrese el valor del Pasaje");
       $tipoAsiento = Interaccion("Ingrese el tipo de Asiento");
       $pasajeIda = Interaccion("Ingrese si el Pasaje es: \n 1)Ida \n 2)Ida y Vuelta");
       $objPasaje = new Pasaje($tipoViaje, $costoPasaje);
       $objPasaje->setTipo_Viaje($tipoViaje);
       if ($pasajeIda == 2)
       {
            $objPasaje->setPasajeSoloIda(true);
       }
       
       if ($tipoAsiento == "Semi Cama" || $tipoAsiento == "Primera Clase")
       {
           $objPasaje->setTipo_Asiento(true);
       }

       return $objPasaje;
    }

   
    function CompletamosViaje ($objViaje,$objResponsable, $objPasajero, $objPasaje)
    {
       $objViaje->setObjPersona($objPasajero);
       $objViaje->setResponsable($objResponsable);
       $objViaje->setObjPasaje($objPasaje);
    }

    
    $viaje = TipoViaje();
    switch ($viaje) {
        case '1':

                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

                $destino = Interaccion("Ingrese el Destino");
                
                $codViaje = Interaccion("Codigo identificatorio de Viaje");

                $capacidadViaje = Interaccion("Capacidad de pasajeros");

                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";  

                $objViajeTerrestre = new ViajeTerrestre($cosViaje, $destino, $capacidadViaje);
                $objPasajero = datosPasajero();
                $objResponsable = datosResponsable();
                $objPasaje = datosPasaje("Terrestre");
                CompletamosViaje($objViajeTerrestre,$objResponsable,$objPasajero,$objPasaje);

                $objViajeTerrestre->venderPasaje($objPasajero);
            
            break;
        
        default:
            # code...
            break;
    }





