<?php

include_once "funciones.php";
include_once "cine.php";
include_once "musical.php";
include_once "obraTeatro.php";
include_once "teatro.php";

$Funciones1 = new Cine("La Fierecilla Domada",500,["H"=>"09","M"=>"00"],60,"accion","chino");
$Funciones2 = new Cine("Hamlet",250,["H"=>"10","M"=>"00"],90,"comedia","eeuu");
$Funciones3 = new Musical("Don Juan Tenorio", 350,["H"=>"11","M"=>"30"],30,"Quentin Tarantino",5);
$Funciones4 = new Obra("Fuente Ovejuna",400,["H"=>"12","M"=>"30"],120);

$colCines = [$Funciones1,$Funciones2];
$colMusicales = [$Funciones3];
$colObras = [$Funciones4];
$teatro = new Teatro("EREMITA CHO","Gral. Roca 1050",$colCines,$colMusicales,$colObras);

//Cambio nombre del teatro
$newTeatro = "new nombre";
$teatro->cambiarNameT($newTeatro);

//cambio direccion del teatro
$newDireccion = "new Direccion";
$teatro->cambiarDireccionT($newDireccion);

//cambio de nombre y precios de las funciones
$nameActual = "Hamlet";
// Cambio de nombres y precios de funciones
$newNombre = "new nombre";
$newPrecio = 0;

//verifica que el precio sea numerico
$modificar=$teatro->cambiarNombrePrecioF($nameActual,$newNombre,$newPrecio);

//carga funciones nuevas
$nombreFuncion = "new funcion";
$precio = 4000;
$h = 12;
$m = 31;
$hora=["H"=>$h,"M"=>$m];
$duracion = 0;
$director = "new director";
$cantPersonasEscena = 0;
$teatro->cargarFuncionesMusicales($nombreFuncion,$precio,$hora,$duracion,$director,$cantPersonasEscena);	

$nombreFuncion1 = "new funcion1";
$precio1 = 2000;
$h1 = 14;
$m1 = 31;
$hora1=["H"=>$h1,"M"=>$m1];
$duracion1 = 0;
$teatro->cargarFuncionesObras($nombreFuncion1,$precio1,$hora1,$duracion1);

$nombreFuncion0 = "new funcion0";
$precio0 = 1000;
$h0 = 9;
$m0 = 30;
$hora0=["H"=>$h0,"M"=>$m0];
$duracion0 = 0;
$genero = "new genero";
$paisOrigen = "new origen";
$teatro->cargarFuncionesCines($nombreFuncion0,$precio0,$hora0,$duracion0,$genero,$paisOrigen);

echo $teatro. "\n";
