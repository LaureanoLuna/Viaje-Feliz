<?php 

/** Clase Persona , tiene un atributo el cual es un arreglo con las claves: nombre, apellido, DNI.
 * correspondiendo a los datos ingresados para identificar al objeto Persona
 */
class Pasajero{

    private $persona;
   
  
        /**Implementamos el metodo Constructor del objeto
         * @param string $nomPers
         * @param string $apellidoPers
         * @param atring $dniPersona
         * 
         */

    public function __construct($nomPers, $apellidoPers, $dniPersona, $numTelefono,)
    {
        $this->persona["nombre"] = $nomPers;
        $this->persona["apellido"] = $apellidoPers;
        $this->persona["DNI"] = $dniPersona;
        $this->persona["Telefono"] = $numTelefono;
        $this->objPasaje = null;
    }

        //Implementamos los metodos de acceso a los atributos
       
        // Getters y Setters
    /**
     * Get the value of persona
     */ 
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set the value of persona
     *
     * @return  self
     */ 
    public function setPersona($persona)
    {
      $this->persona = $persona;        
    }

     /**
     * Get the value of objPasaje
     */ 
    public function getObjPasaje()
    {
        return $this->objPasaje;
    }

    /**
     * Set the value of objPasaje
     *
     * @return  self
     */ 
    public function setObjPasaje($objPasaje)
    {
        $this->objPasaje = $objPasaje;
      
    }

    /**
     * Metodo que permite settear el atributo array del objeto, en un indice espesifico ingresado por parametro.
     * 
     * @param int $clave
     * @param string/int $nuevoDato
     */

    public function CambiarDatos($clave,$nuevoDato)
    {
        $bool = false;
        $arrayPersona = $this->getPersona();
        foreach ($arrayPersona as $key=>$value) {
            
           
            if ($clave == $key){
               
                $arrayPersona[$key] = $nuevoDato;
                $bool = true;
            }
        }
        $this->setPersona($arrayPersona);
        return $bool;
    }

    /**Metodo implemetado para poder mostrar los datos de dicho objeto */
    public function __toString()
    {
        return " Nombre: ".($this->getPersona()["nombre"])."\n Apellido: ".($this->getPersona()["apellido"]."\n Numero de DNI: ".($this->getPersona()["DNI"])."\nNumero de Telefono: ".($this->getPersona()["Telefono"]))."\n". $this->getObjPasaje(). "\n";
    }

    /**Metodo implementado que retorna un mensaje en cuyo caso fallara la creacion del objeto */
     public function __destruct()
    {
        echo "\nLos datos son invalidos. \n";
    } 



   
}
?>