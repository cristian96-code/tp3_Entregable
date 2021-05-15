<?php

class Obra extends Funciones{
    public function __construct($nombre,$precio,$horaInicio,$duracion){
        parent::__construct($nombre,$precio,$horaInicio,$duracion);
    }

     //metodo dar costo
     public function darCosto(){
        $costo = parent::darCosto();
        $costoFinal = $costo+(($costo*45)/100);

        return $costoFinal;
    }
}
