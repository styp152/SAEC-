<?php
class Vendedor{
	private $cedula;
	private $nombre;
	private $apellido;
	private $cargo;
	private $nivel;
	private $clave;

  function __construct(){}
  
  function getCedula(){
    return $this->cedula;
  }
  
  function getNombre(){
    return $this->nombre;
  }
  
  function getApellido(){
    return $this->apellido;
  }
  
  function getCargo(){
    return $this->cargo;
  }
  
  function getNivel(){
    return $this->nivel;
  }
  
  function getClave(){
    return $this->clave;
  }
  
  function setCedula($parametro){
    $this->cedula=$parametro;
  }
  
  function setNombre($parametro){
    $this->nombre=$parametro;
  }
  
  function setApellido($parametro){
    $this->apellido=$parametro;
  }
  
  function setCargo($parametro){
    $this->cargo=$parametro;
  }
  
  function setNivel($parametro){
    $this->nivel=$parametro;
  }

  function setClave($parametro){
    $this->clave=$parametro;
  }
  
  function updateDatos($parametro){
  	$this->cedula=$parametro['Cedula'];
  	$this->nombre=$parametro['Nombre'];
  	$this->apellido=$parametro['Apellido'];
  	$this->cargo=$parametro['Cargo'];
  	$this->nivel=$parametro['Nivel'];
	$this->clave=$parametro['Clave'];
  }
}
?>