<?php
class Gasto{
  var $id;
	var $cedulaVendedor;
	var $fechaRegistro;
  var $monto;
  var $descripcion;

  function __construct(){}
  
  function getId(){
    return $this->id;
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
  
  function getDescripcion(){
    return $this->Descripcion;
  }
  
  function setId($parametro){
    $this->id=$parametro;
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
  
  function setDescripcion($parametro){
    $this->Descripcion=$parametro;
  }

  function updateDatos($parametro){
    $this->id=$parametro['Id'];
  	$this->cedulaVendedor=$parametro['Cedula_Vendedor'];
  	$this->fechaRegistro=$parametro['Fecha_Registro'];
    $this->monto=$parametro['Monto'];
    $this->Descripcion=$parametro['Descripcion'];
  }
}
?>