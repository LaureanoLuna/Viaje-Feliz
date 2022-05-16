<?php

/* De los viajes terrestres se conoce la comodidad del asiento, si es semicama o cama. */

class ViajeTerrestre extends ViajeFeliz{

   

    public function __construct($codViaje, $lugarDestino, $limitPers)
    {
        parent::__construct($codViaje, $lugarDestino, $limitPers);
                
    }

    public function __toString()
    {
        $str = parent::__toString();
        return $str;
    } 

    

    public function venderPasaje($objPasajero)
    {
        $objPasaje = parent::getObjPasaje();
        $valorAsiento = $objPasaje->getCostoPasaje();
       
        if ($objPasaje->getTipo_Asiento()){
             $valorAsiento *= 1.25;
             $objPasaje->setCostoPasaje($valorAsiento);
        }
        if ($objPasaje->getPasajeSoloIda())
        {
            $valorAsiento *= 1.50;
            $objPasaje->setCostoPasaje($valorAsiento);
        }
        parent::venderPasaje($objPasaje);
        return $valorAsiento;
    }



}
?>