<?php
class Abono{
  var $id;
	var $codigo;
	var $cedulaVendedor;
	var $fechaRegistro;
  var $monto;

  function __construct(){}
  
  function getId(){
    return $this->id;
  }
  
  function getCodigo(){
    return $this->codigo;
  }
  
  function getCedulaVendedor(){
    return $this->cedulaVendedor;
  }
  
  function getFechaRegistro(){
    return $this->fechaRegistro;
  }
  
  function getMonto(){
    return $this->monto;
  }
  
  function setId($parametro){
    $this->id=$parametro;
  }
  
  function setCodigo($parametro){
    $this->codigo=$parametro;
  }
  
  function setCedulaVendedor($parametro){
    $this->cedulaVendedor=$parametro;
  }
  
  function setFechaRegistro($parametro){
    $this->fechaRegistro=$parametro;
  }
  
  function setMonto($parametro){
    $this->monto=$parametro;
  }

  function updateDatos($parametro){
    $this->id=$parametro['Id'];
  	$this->codigo=$parametro['Codigo'];
  	$this->cedulaVendedor=$parametro['Cedula_Vendedor'];
  	$this->fechaRegistro=$parametro['Fecha_Registro'];
    $this->monto=$parametro['Monto'];
  }
}
?>