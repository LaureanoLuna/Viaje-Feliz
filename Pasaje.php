<?php

class Pasaje{

    private $tipo_Viaje;// con este atributo distinguimos si es terrestre o Aereo
    private $tipo_Asiento;// indica si es de primera clase o no / si es cama o semicama
    private $costoPasaje;// tenemos el valor base del pasaje
    private $pasajeSoloIda; // atributo que contrendar si el pasaje corresponde a ser solo de ida( con el valor booleano false ) o sera de ida y vuelta ( con el valor booleano TRUE)

    public function __construct($tipoViaje, $costoPasaje)
    {
        $this->pasajeSoloIda = false;
        $this->tipo_Asiento = false; // atributo que diferencia entre el asiento Cama (con valor booleano TRUE) o asiento SemiCama ( con valor booleano FALSE ). La inicializamos con valor false
        $this->tipo_Viaje = $tipoViaje; // atributo para distinguir el tipo de viaje, ya sea Terrestre o Aereo.
        $this->costoPasaje = $costoPasaje; // Atributo que contendra el costo del pasaje
    }

    /**
     * Get the value of tipo_Viaje
     */ 
    public function getTipo_Viaje()
    {
        return $this->tipo_Viaje;
    }

    /**
     * Set the value of tipo_Viaje
     *
     * @return  self
     */ 
    public function setTipo_Viaje($tipo_Viaje)
    {
        $this->tipo_Viaje = $tipo_Viaje;

    }

    /**
     * Get the value of tipo_Asiento
     */ 
    public function getTipo_Asiento()
    {
        return $this->tipo_Asiento;
    }

    /**
     * Set the value of tipo_Asiento
     *
     * @return  self
     */ 
    public function setTipo_Asiento($tipo_Asiento)
    {
        $this->tipo_Asiento = $tipo_Asiento;

    }

    /**
     * Get the value of costoPasaje
     */ 
    public function getCostoPasaje()
    {
        return $this->costoPasaje;
    }

    /**
     * Set the value of costoPasaje
     *
     * @return  self
     */ 
    public function setCostoPasaje($costoPasaje)
    {
        $this->costoPasaje = $costoPasaje;

    }

     /**
     * Get the value of pasajeSoloIda
     */ 
    public function getPasajeSoloIda()
    {
        return $this->pasajeSoloIda;
    }

    /**
     * Set the value of pasajeSoloIda
     *
     * @return  self
     */ 
    public function setPasajeSoloIda($pasajeSoloIda)
    {
        $this->pasajeSoloIda = $pasajeSoloIda;
    }

    public function PasajePara()
    {
        if ($this->getPasajeSoloIda()){
            $pasaje = "Ida y Vuelta \n";
        }else{
            $pasaje = "Solo Ida \n";
        }
        return $pasaje;
    }

    public function tipoButaca()
    {
        if ($this->getTipo_Asiento())
        {
            $butaca = "Cama ";
        }else{
            $butaca = "Semi Cama ";
        }
        return $butaca;
    }

    public function __toString()
    {
        $str = "\nTipo Viaje: ". $this->getTipo_Viaje(). "\nTipo de Asiento: ". $this->tipoButaca(). "\nCosto del Pasaje: $". $this->getCostoPasaje(). "\nPasaje para: ". $this->PasajePara();
        return $str;
    }

   

   
}