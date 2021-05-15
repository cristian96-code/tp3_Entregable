<?php


class Cine extends Funciones{
    private $genero;
    private $paisOrigen;

    //metodo constructor
    public function __construct($nombre,$precio,$horaInicio,$duracion,$genero,$paisOrigen){
        parent::__construct($nombre,$precio,$horaInicio,$duracion);
        $this->genero = $genero;
        $this->paisOrigen = $paisOrigen;
    }
    
    //metodos de acceso
    public function getGenero(){
        return $this->genero;
    }
    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }
    public function setPaisOrigen($paisOrigen){
        $this->paisOrigen = $paisOrigen;
    }

    //metodo dar costo
    public function darCosto(){
        $costo = parent::darCosto();
        $costoFinal = $costo+(($costo*65)/100);

        return $costoFinal;
    }

    //metodo __toString
    public function __toString(){
        return
        parent::__toString().
        "\nGenero: ".$this->getGenero().
        "\nPais de Origen: ".$this->getPaisOrigen()."\n";
    }
}
