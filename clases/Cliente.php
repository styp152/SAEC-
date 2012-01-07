<?php
class Cliente{
	private $cedula;
  private $nacionalidad;
	private $nombre;
	private $telefono;
	private $direccion;
	private $correo;

  function __construct(){}
  
  function getCedula(){
    return $this->cedula;
  }
  
  function getNacionalidad(){
    return $this->nacionalidad;
  }
  
  function getNombre(){
    return $this->nombre;
  }
  
  function getTelefono(){
    return $this->telefono;
  }
  
  function getDireccion(){
    return $this->direccion;
  }
  
  function getCorreo(){
    return $this->correo;
  }
  
  function setCedula($parametro){
    $this->cedula=$parametro;
  }
  
  function setNacionalidad($parametro){
    $this->nacionalidad=$parametro;
  }
  
  function setNombre($parametro){
    $this->nombre=$parametro;
  }
  
  function setTelefono($parametro){
    $this->telefono=$parametro;
  }
  
  function setDireccion($parametro){
    $this->direccion=$parametro;
  }
  
  function setCorreo($parametro){
    $this->correo=$parametro;
  }

  function updateDatos($parametro){
  	$this->cedula=$parametro['Cedula'];
    $this->nacionalidad=$parametro['Nacionalidad'];
  	$this->nombre=$parametro['Nombre'];
  	$this->telefono=$parametro['Telefono'];
  	$this->direccion=$parametro['Direccion'];
  	$this->correo=$parametro['Correo'];
  }
}

?>