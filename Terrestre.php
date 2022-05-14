<?php

/* De los viajes terrestres se conoce la comodidad del asiento, si es semicama o cama. */

class Terrestre extends ViajeFeliz{

   

    public function __construct($codViaje, $lugarDestino, $limitPers, $dataObjPesona, $cateAsiento)
    {
        parent::__construct($codViaje, $lugarDestino, $limitPers, $dataObjPesona, $cateAsiento);
                
    }

    // metodo   



}
?>