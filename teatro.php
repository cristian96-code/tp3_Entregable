<?php


class Teatro{
    private $nombreTeatro;
    private $direccion;
    //private $objFunciones;
    private $objCine;
    private $objMusical;
    private $objObra;

    //Metodo constructor
    public function __construct($nombreTeatro, $direccion,/*$objFunciones,*/$objCine,$objMusical,$objObra){
        $this->nombreTeatro = $nombreTeatro;
        $this->direccion = $direccion;
        //$this->objFunciones = [];
        $this->objCine = $objCine;
        $this->objMusical = $objMusical;
        $this->objObra = $objObra;
    }

    //Metodos de acceso
    public function getNombreTeatro(){
        return $this->nombreTeatro;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    /*public function getObjFunciones(){
        return $this->objFunciones;
    }*/
    public function getObjCine()
    {
        return $this->objCine;
    }
    public function getObjMusical()
    {
        return $this->objMusical;
    }
    public function getObjObra()
    {
        return $this->objObra;
    }

    public function setNombreTeatro($nombreTeatro){
        $this->nombreTeatro = $nombreTeatro;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    /*public function setObjFunciones($objFunciones){
        $this->objFunciones = $objFunciones;
    }*/
    public function setObjCine($objCine)
    {
        $this->objCine = $objCine;
    }
    public function setObjMusical($objMusical)
    {
        $this->objMusical = $objMusical;
    }
    public function setObjObra($objObra)
    {
        $this->objObra = $objObra;
    }

    
    //Metodo Cambiar nombre de teatro
    public function cambiarNameT($nameTeatro){
        
        $this->setNombreTeatro($nameTeatro);
    }
    //Metodo cambiar nombre de direccion
    public function cambiarDireccionT($otradireccion){
        
        $this->setDireccion($otradireccion);
    }   

    //Metodo cambiar nombres y precios de funciones
    public function cambiarNombrePrecioF($nameFuncion,$newNombre,$newPrecio){
        $funciones= array_merge($this->getObjCine(),$this->getObjMusical(),$this->getObjObra()); 
        $verFuncion= false;
        for ($i=0;$i<count($funciones); $i++){
			$unaFuncion=$funciones[$i];
			if($unaFuncion->getnombre()==$nameFuncion && is_numeric($newPrecio)){
                $unaFuncion->setnombre($newNombre);
                $unaFuncion->setprecio($newPrecio);
				$verFuncion=true;
            }
        } 
        return $verFuncion;
    }

    public function cargarFuncionesCines($nombreFuncion,$precio,$hora,$duracion,$genero,$paisO){
        $funcionCine=new Cine($nombreFuncion,$precio,$hora,$duracion,$genero,$paisO);
        $funciones=$this->getObjCine();
        $verificar=false;
        $newHora=$hora["H"];
        $newMin=$hora["M"];
        $hrEnMin=$newHora*60;
        $unaDuracion=$hrEnMin+$newMin;
        $totalDuracion=$unaDuracion+$duracion;
        $i=0;
        while($i<count($funciones) && !$verificar){ //verifica solapa
            $funcionsis=$funciones[$i];
            $d=$funcionsis->getHoraInicio();
            $hr=$d["H"];
            $min=$d["M"];	
            $horaAminutos=$hr*60;
            $laDuracionSistema=$horaAminutos+$min;
            $dur=$funcionsis->getDuracion();
            $totalDuracionsistema=$laDuracionSistema+$dur;	
            if($totalDuracion > $laDuracionSistema && $totalDuracionsistema > $unaDuracion){
                $verificar=true;
            }
            $i++;
        }

        if($verificar==false){
            array_push($funciones,$funcionCine);
            $this->setObjCine($funciones);              
        }
    }

    public function cargarFuncionesMusicales($nombreFuncion,$precio,$hora,$duracion,$director,$cantPersonasEscena){
        $funcionMusical=new Musical($nombreFuncion,$precio,$hora,$duracion,$director,$cantPersonasEscena);
        $funciones=$this->getObjMusical();
        $verificar=false;
        $newHora=$hora["H"];
        $newMin=$hora["M"];
        $hrEnMin=$newHora*60;
        $unaDuracion=$hrEnMin+$newMin;
        $totalDuracion=$unaDuracion+$duracion;
        $i=0;
        while($i<count($funciones) && !$verificar){ //verifica solapa
            $funcionsis=$funciones[$i];
            $d=$funcionsis->getHoraInicio();
            $hr=$d["H"];
            $min=$d["M"];	
            $horaAminutos=$hr*60;
            $laDuracionSistema=$horaAminutos+$min;
            $dur=$funcionsis->getDuracion();
            $totalDuracionsistema=$laDuracionSistema+$dur;	
            if($totalDuracion > $laDuracionSistema && $totalDuracionsistema > $unaDuracion){
                $verificar=true;
            }
            $i++;
        }

        if(!$verificar){
            array_push($funciones,$funcionMusical);
            $this->setObjMusical($funciones);              
        }
    }

    public function cargarFuncionesObras($nombre,$precio,$hora,$duracion){
        $funcionObra = new Obra($nombre,$precio,$hora,$duracion);
        $funciones=$this->getObjObra();
        $verificar=false;
        $newHora=$hora["H"];
        $newMin=$hora["M"];
        $hrEnMin=$newHora*60;
        $unaDuracion=$hrEnMin+$newMin;
        $totalDuracion=$unaDuracion+$duracion;
        $i=0;
        while($i<count($funciones) && !$verificar){ //verifica solapa
            $funcionsis=$funciones[$i];
            $d=$funcionsis->getHoraInicio();
            $hr=$d["H"];
            $min=$d["M"];	
            $horaAminutos=$hr*60;
            $laDuracionSistema=$horaAminutos+$min;
            $dur=$funcionsis->getDuracion();
            $totalDuracionsistema=$laDuracionSistema+$dur;	
            if($totalDuracion > $laDuracionSistema && $totalDuracionsistema > $unaDuracion){
                $verificar=true;
            }
            $i++;
        }

        if($verificar==false){
            array_push($funciones,$funcionObra);
            $this->setObjObra($funciones);              
        }
    }


    public function verificarHoras(){
        //no me sale como hacerla :c
    }

    public Function funcionesStringObra($funcion){
        $mostrar = "";
        for($i=0 ; $i<count($funcion) ; $i++){
            $mostrar.= 
            "Nombre: ".$funcion[$i]->getNombre()."\n".
            "Precio: $".$funcion[$i]->getPrecio()."\n".
            "Hora de Inicio: ".$funcion[$i]->getHoraInicio()["H"].
            ":".$funcion[$i]->getHoraInicio()["M"]."\n".
            "Duracion: ".$funcion[$i]->getDuracion()."\n\n";
        }
        return $mostrar;
    }
    public Function funcionesStringCine($funcion){
        $mostrar = "";
        for($i=0 ; $i<count($funcion) ; $i++){
            $mostrar.= 
            "Nombre: ".$funcion[$i]->getNombre()."\n".
            "Precio: $".$funcion[$i]->getPrecio()."\n".
            "Hora de Inicio: ".$funcion[$i]->getHoraInicio()["H"].
            ":".$funcion[$i]->getHoraInicio()["M"]."\n".
            "Duracion: ".$funcion[$i]->getDuracion()."\n".
            "Genero: ".$funcion[$i]->getGenero().
            "\nPais de Origen: ".$funcion[$i]->getPaisOrigen()."\n\n";
        }
        return $mostrar;
    }
    public Function funcionesStringMusical($funcion){
        $mostrar = "";
        for($i=0 ; $i<count($funcion) ; $i++){
            $mostrar.= 
            "Nombre: ".$funcion[$i]->getNombre()."\n".
            "Precio: $".$funcion[$i]->getPrecio()."\n".
            "Hora de Inicio: ".$funcion[$i]->getHoraInicio()["H"].
            ":".$funcion[$i]->getHoraInicio()["M"]."\n".
            "Duracion: ".$funcion[$i]->getDuracion()."\n".
            "Director: ".$funcion[$i]->getDirector().
            "\nCantidad de Personas en Escena: ".$funcion[$i]->getCantPersonasEscena()."\n\n";
        }
        return $mostrar;
    }

    public function calcularCostoFunciones($funciones){
        $total=0;
        for($i=0 ; $i<count($funciones) ; $i++){
            
            $costo = $funciones[$i]->darCosto();
            $total= $total+$costo;
        }
        return "costo: ".$total."\n";
    }

    //Metodo __toString
    public function __toString(){

    return "\nNombre del teatro: ".$this->getNombreTeatro().
    "\nDireccion: ".$this->getDireccion().

    "\nFUNCIONES: \n".
    "\nCINE:\n".$this->funcionesStringCine($this->getObjCine()).
    //"\nCosto : ".$this->calcularCostoFunciones($this->getObjCine()).
    "\n------------------------------\n".

    "\nMUSICAL:\n".$this->funcionesStringMusical($this->getObjMusical()).
    //"\nCosto : ".$this->calcularCostoFunciones($this->getObjMusical()).
    "\n------------------------------\n".

    "\nOBRA:\n".$this->funcionesStringObra($this->getObjObra()).
    //"\nCosto : ".$this->calcularCostoFunciones($this->getObjObra()).
    "\n------------------------------\n";
    }
}
