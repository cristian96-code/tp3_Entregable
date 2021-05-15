<?php


class Musical extends Funciones{
    private $director;
    private $cantPersonasEscena;

    //metodo constructor
    public function __construct($nombre,$precio,$horaInicio,$duracion,$director,$cantPersonasEscena){
        parent::__construct($nombre,$precio,$horaInicio,$duracion);
        $this->director = $director;
        $this->cantPersonasEscena = $cantPersonasEscena;
    }

    //metodo de acceso
    public function getDirector(){
        return $this->director;
    }
    public function getCantPersonasEscena(){
        return $this->cantPersonasEscena;
    }

    public function setDirector($director){
        $this->director = $director;
    }
    public function setCantPersonasEscena($cantPersonasEscena){
        $this->cantPersonasEscena = $cantPersonasEscena;
    }

     //metodo dar costo
     public function darCosto(){
        $costo = parent::darCosto();
        $costoFinal = $costo+(($costo*12)/100);

        return $costoFinal;
    }

    //metodo __toString
    public function __toString(){
        return
        parent::__toString().
        "\nDirector: ".$this->getDirector().
        "\nCantidad de Personas en Escena: ".$this->getCantPersonasEscena()."\n";
    }
}
