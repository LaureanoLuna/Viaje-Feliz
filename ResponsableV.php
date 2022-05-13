<?php

class ResponsableV{

    private $idEmpleado;
    private $numLegajo;
    private $nombre;
    private $apellido;

    public function __construct($idEmpleado, $numLegajo, $nomEmpleado, $apellidoEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
        $this->numLegajo = $numLegajo;
        $this->nombre = $nomEmpleado;
        $this-> apellido = $apellidoEmpleado;
    }

    //Metodos de accese a los atributos

    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    public function getNumLegajo()
    {
        return $this->numLegajo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
        return $this;
    }
    
    public function setNumLegajo($numLegajo)
    {
        $this->numLegajo = $numLegajo;
        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function __toString()
    {
        $str = "\nDatos del Responsable de Viaje: \n
                Nombre: ".$this->getNombre()."\n
                Apellido: ". $this->getApellido()."\n
                Legajo: ". $this->getNumLegajo()."\n
                Numero Identificatorio del Empleado: ". $this->getIdEmpleado()."\n\n";

        return $str;
    }
}

?>