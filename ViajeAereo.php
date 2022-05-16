<?php

/* De los viajes aéreos se conoce: 
    * el número del vuelo, 
    * la categoría del asiento (primera clase o no),
    * nombre de la aerolínea, 
    * la cantidad de escalas del vuelo en caso de tenerlas */

class ViajeAereo extends ViajeFeliz{

    private $nombAerolinea;
    private $escalasVuelo;
    private $tieneEscalas;
    private $numeroVuelo;
    

    public function __construct($codViaje, $lugarDestino, $limitPers,$nombAerolinea, $numVuelo)
    {
        parent :: __construct($codViaje, $lugarDestino, $limitPers);

        $this->nombAerolinea = $nombAerolinea;
        $this->escalasVuelo = 0;
        $this->tieneEscalas = false;
        $this->numeroVuelo = $numVuelo;
    }

    /**
     * Get the value of nombAerolinea
     */ 
    public function getNombAerolinea()
    {
        return $this->nombAerolinea;
    }

    /**
     * Set the value of nombAerolinea
     *
     * @return  self
     */ 
    public function setNombAerolinea($nombAerolinea)
    {
        $this->nombAerolinea = $nombAerolinea;
        
    }

    /**
     * Get the value of escalasVuelo
     */ 
    public function getEscalasVuelo()
    {
        return $this->escalasVuelo;
    }

    /**
     * Set the value of escalasVuelo
     *
     * @return  self
     */ 
    public function setEscalasVuelo($escalasVuelo)
    {
        $this->escalasVuelo = $escalasVuelo;

    }

    /**
     * Get the value of numeroVuelo
     */ 
    public function getNumeroVuelo()
    {
        return $this->numeroVuelo;
    }

    /**
     * Set the value of numeroVuelo
     *
     * @return  self
     */ 
    public function setNumeroVuelo($numeroVuelo)
    {
        $this->numeroVuelo = $numeroVuelo;

       
    }

     /**
     * Get the value of tieneEscalas
     */ 
    public function getTieneEscalas()
    {
        return $this->tieneEscalas;
    }

    /**
     * Set the value of tieneEscalas
     *
     * @return  self
     */ 
    public function setTieneEscalas($tieneEscalas)
    {
        $this->tieneEscalas = $tieneEscalas;

        return $this;
    }

    public function __toString()
    {
        $str = parent :: __toString();
        $str.= 
        "\nEl vuelo N° ".$this->getNumeroVuelo().
        "\nNombre de la Aerolinea: ". $this->getNombAerolinea().
        "\nCantidad de escalas es: ". $this->getEscalasVuelo();        
        return $str;
    }

    public function venderPasaje($objPasajero)
    {
        $objPasaje = parent::getObjPasaje();
        $valorAsiento = $objPasaje->getCostoPasaje();
        if ($objPasaje->getTipo_Asiento() && !$this->getTieneEscalas())
        {
            $valorAsiento *= 1.40;
            $objPasaje->setCostoPasaje($valorAsiento);
        }
        if ($objPasaje->getTipo_Asiento() && $this->getTieneEscalas())
        {
            $valorAsiento *= 1.60;
            $objPasaje->setCostoPasaje($valorAsiento);
        }
        if ($objPasaje->getPasajeSoloIda())
        {
            $valorAsiento *= 1.50;
            $objPasaje->setCostoPasaje($valorAsiento);
        }
        parent::venderPasaje($objPasajero);
        return $valorAsiento;
    }

    

   
}

?>