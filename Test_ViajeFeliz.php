<?php

include('ViajeFeliz.php');
include ('Pasaje.php');
include ('ViajeAereo.php');
include ('ViajeTerrestre.php');
include('ResponsableV.php');
include ('Pasajero.php');


// Obj Pasaje para el objto Viaje Aereo
$pasajeAereo = new Pasaje("Aereo", 1500); //Inicializamos el Objeto Pasaje
$pasajeAereo-> setPasajeSoloIda(true);// setteamos Si el pasaje es de ida y Vuelta. como ejemplo

//Obj Pasaje para el objto Viaje Terrestre
$pasajeTerrestre = new Pasaje("Terrestre", 1500);

//Obj Pasajero
$per = [new Pasajero("Laureano","Luna",38232325, 15),new Pasajero("Josefo","Giacone",26841599,10000),new Pasajero("Margarita","Muñoz",16589633,17)];//objeto Persona ya creado
$per[0]->setObjPasaje($pasajeAereo);// le setteamos la referencia del objto Pasaje en el objto Pasajero
$per[1]->setObjPasaje($pasajeAereo);// le setteamos la referencia del objto Pasaje en el objto Pasajero
$per[2]->setObjPasaje($pasajeTerrestre);// le setteamos la referencia del objto Pasaje en el objto Pasajero

//Inicializamos el objto Viaje Aereo
$objViajeAereo = new ViajeAereo(3543,"Neuquen",3,"Fly",10);
$objViajeAereo->setObjPersona($per); // setteamos la referencia al objeto Pasajero
$objViajeAereo->setObjPasaje($pasajeAereo);// setteamos la referencia al objeto Pasaje

//Inicializamos el objto Viaje Aereo
$objViajeTerrestre = new ViajeTerrestre(3543,"Neuquen",3); //Objeto viaje ya creado
$objViajeTerrestre->setObjPersona($per);// setteamos la referencia al objeto Pasajero
$objViajeTerrestre->setObjPasaje($pasajeTerrestre);// setteamos la referencia al objeto Pasaje
 
// setteamos la referencia al obj Responsable por medio de un metodo en el objeto Viaje Padre
$objViajeTerrestre->AgregarResponsable(56,"FAI-3543", "Laureano","Luna");// Agregamos el objeto ResponsableV ya creado
$objViajeAereo->AgregarResponsable(56,"FAI-3543", "Laureano","Luna");// Agregamos el objeto ResponsableV ya creado

$i = 0;//Inicializamos la variable

//Programa principal

 echo "\n♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀ \n";
echo "\n..............Empresa Viaje Feliz.............\n";
echo "\n♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀♂ ♀ \n";
do {
    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

    echo "\n1) Ingresar un nuevo viaje \n";// Inicializamos un nuevo objeto Persona y ViajeFeliz 
    echo "\n2) Vender Pasaje \n"; // inicializamos al objeto Pasajero y al objto Pasaje
    echo "\n3) Ver los datos del viaje y los Pasajeros \n";// una ves el objeto creado se pueden visualizar sus datos
    echo "\n4) Modificar los datos ya generados \n";// en esta opvion se puede tener acceso a todos los atributos para settearlos
    echo "\n5) Guardar los datos del viaje \n";// guarda el objeto Viaje Feliz en un arreglo con una clave que es el atributo codigo de viaje
    echo "\n6) Ver los viajes ya guardados \n";// visualizamos los datos de los objetos ViajeFeliz ya creados y guardados
    echo "\n7) Salir\n";

    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
    $opciones = trim(fgets(STDIN));
switch ($opciones) {
   case '1':

            $difViaje = TipoViaje()."\n3)Salir";

            switch ($difViaje) {
            
                case '1': //Generamos el Objeto de Viaje Terrestre

                                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

                                $destino = Interaccion("Ingrese el Destino");
                                
                                $codViaje = Interaccion("Codigo identificatorio de Viaje");
                            
                                $capacidadViaje = Interaccion("Capacidad de pasajeros");
                            
                                $objViaje = new ViajeTerrestre($codViaje,$destino,$capacidadViaje);
                            
                            
                            
                                //Generamos el obj Responsable del Viaje
                                echo "\nDatos del Empleado Resposanble del Viaje \n";
                                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                            
                                $nomEmpleado = Interaccion("Nombre");
                            
                                $apellidoEmpleado = Interaccion("Apellido");
                            
                                $idEmpleado = Interaccion("Numero Identificatorio del Empleado Responsable");
                            
                                $numLegajo =Interaccion("Numero de Legajo del Empleado");
                            
                                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                            
                                
                                $objViaje->AgregarResponsable($idEmpleado,$numLegajo,$nomEmpleado,$apellidoEmpleado);
                        
                        
                            
                            $objViajeTerrestre = $objViaje;
                        break;
                            
                        case '2': // Generamos el Objeto del Viaje Aereo
                                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

                                $destino = Interaccion("Ingrese el Destino");
                                
                                $codViaje = Interaccion("Codigo identificatorio de Viaje");

                                $nombreAerolinea = Interaccion("Ingrese el nombre de la Aerolinea a utilizar");

                                $numVuelo = Interaccion("Ingrese el numero de vuelo");
                            
                                $capacidadViaje = Interaccion("Capacidad de pasajeros");

                                $objViaje = new ViajeAereo($codViaje,$destino,$capacidadViaje,$nombreAerolinea,$numVuelo);        
                            
                                //Generamos el obj Responsable del Viaje
                                echo "\nDatos del Empleado Resposanble del Viaje \n";
                                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                            
                                $nomEmpleado = Interaccion("Nombre");
                            
                                $apellidoEmpleado = Interaccion("Apellido");
                            
                                $idEmpleado = Interaccion("Numero Identificatorio del Empleado Responsable");
                            
                                $numLegajo =Interaccion("Numero de Legajo del Empleado");
                            
                                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                            
                                
                                $objViaje->AgregarResponsable($idEmpleado,$numLegajo,$nomEmpleado,$apellidoEmpleado);
                        
                       

                        break;
                        case'3':
                          

                            default:
                            echo "Ingrese una opcion correcta\n";
                            break;
                            
                }   

        case '2':

        $opciViaje = TipoViaje();
        
        switch ($opciViaje) {
            case '1':
                $peppol = "si";
                while ($peppol == "si"){
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                        
                    $objPasaje = datosPasaje("Terrestre");
                    $objViajeTerrestre->setObjPasaje($objPasaje);
                    $objPasajero = datosPasajero();

                    if($objViajeTerrestre->VerificacionPersona($objPasajero->getPersona()["DNI"]) || $objViajeTerrestre->getObjPersona() == null){

                        if ($objViajeTerrestre-> hayPasajesDisponible() || $objViajeTerrestre-> hayPasajesDisponible() == null ){ 

                          

                            $objViajeTerrestre->venderPasaje($objPasajero);
                            

                        }else
                            {
                                echo "\nNo hay pasajes disponibles. \n";
                            }
                    }else{
                        echo "\nEl pasajero ya fue ingresado al viaje\n";
                    }
                
                    echo "\n¿ Desea Ingresar otro pasajero ?\n";
                    $peppol = trim(fgets(STDIN));
                            
                }
                
             break;

            case '2':
                $peppol = "si";
                while ($peppol == "si"){
                       echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                                
                       $objPasaje = datosPasaje("Aereo");
                       $tieneEscalas = Interaccion("Con escalas? si / no");
                       if ($tieneEscalas == "si"){
                           $objViajeAereo->setTieneEscalas(true);
                           $numEscalas = Interaccion("Cuantas Escalas tiene el vuelo?");
                           $objViajeAereo->setEscalasVuelo($numEscalas);
                       }
                        $objViajeAereo->setObjPasaje($objPasaje);
                         $objPasajero = datosPasajero();

                             if($objViajeAereo->VerificacionPersona($objPasajero->getPersona()["DNI"]) || $objViajeAereo->getObjPersona() == null){

                                if ($objViajeAereo-> hayPasajesDisponible() || $objViajeAereo-> hayPasajesDisponible() == null ){ 

                                    $objViajeAereo->venderPasaje($objPasajero);
                             
                                }else
                                     {
                                         echo "\nNo hay pasajes disponibles. \n";
                                     }
                                }else{
                                    echo "\nEl pasajero ya fue ingresado al viaje\n";
                                }
                            
                        echo "\n¿ Desea Ingresar otro pasajero ?\n";
                        $peppol = trim(fgets(STDIN));                                
                    } 
                break;
           
           default:
               echo "Ingrese una Opcion Correcta \n";
               break;
       }
  


   
    case '3':
      $tipoViaje = TipoViaje();
        if ($tipoViaje == 1){
            echo $objViajeTerrestre;
            
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
            if($objViajeTerrestre->getObjPersona() <> null){
                    $x = $objViajeTerrestre->getObjPersona();
                $i = 1;
                foreach ($x as $key => $value) {
                    echo $i.")".$value;
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                    $i++;
                }
            }else{
                echo "No hay Pasajeros Ingresados";
            }
      }elseif ($tipoViaje == 2){
            echo $objViajeAereo;
            
            echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
            if($objViajeAereo->getObjPersona() <> null){
                    $x = $objViajeAereo->getObjPersona();
                $i = 1;
                foreach ($x as $key => $value) {
                    echo $i.")".$value;
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                    $i++;
                }
            }else{
                echo "No hay Pasajeros Ingresados";
            }
      }
        break;
    case '4':     
        if (TipoViaje() == 1){
            $objViaje = $objViajeTerrestre;
        }else{
            $objViaje = $objViajeAereo;
        }
            do {
                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";

                echo "\nQue modificacion desea realizar \n";
                echo "\n1)Modificar los datos de los pasajeros ya ingresados \n";// ingresa a el siguente menu para poder modificar valores especificos del objeto Persona
                echo "\n2)Borrar algun pasajero ya ingresado \n";// borra y reacomoda los elementos del atributo para que no queden huecos
                echo "\n3)Modificar los datos del responsable del viaje.\n";
                echo "\n4)Cambiar destino del viaje \n";// settea el atributo setDestino con un valor ingresado por teclado 
                echo "\n5)Cambiar la capacidad del viaje \n";// settea el atributo setCapMaxPers con un valor ingresado por teclado
                echo "\n6)Volver al menu anterior \n";// regresa al menu anterior
                $opc = trim(fgets(STDIN));

                echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                
                
                
            switch ($opc) {
                case '1':
                       
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
                case '2':
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
                case '3':
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
                case '4':
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";
                    $nuevoDestino = Interaccion("Ingrese el nuevo destiono del viaje");
                    
                    $objViaje->setDestino($nuevoDestino);

                    break;
                    
                case '5':
                    echo "\n○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•○•\n";    
                    $nuevaCapacidad = Interaccion("Ingrese la nueva capacidad de pasajeros");

                    $objViaje->setCantMaxPers($nuevaCapacidad);

                    break;
                
                case '6':
                        $opc = 7;
                        break;
                   
                default:
                   echo "\n Ingrese una opcion valida \n";
                    break;
                
            }
           } while ($opc < 6 );
    
        break;
    case '5':/**idea mia esta opcion del menu,
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
    case '6': //visualizamos los objetos ViajesFeliz guardados en un arreglo multidimencional
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
    case '7':
        $opciones = 7;
    default:
       echo "\nIngrese una opcion correcta del menu\n";
        break;
}
} while ($opciones < 7);


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
       
       if ($tipoAsiento == "Cama" || $tipoAsiento == "Primera Clase")
       {
           $objPasaje->setTipo_Asiento(true);
       }

       return $objPasaje;
    }

   
   

   
    





