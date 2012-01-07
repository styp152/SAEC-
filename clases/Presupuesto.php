<?php
class Presupuesto{
	var $codigo;
	var $cedulaCliente;
	var $cedulaVendedor;
	var $fechaRegistro;
	var $detalles;

  function __construct(){}
  
  function getCodigo(){
    return $this->codigo;
  }
  
  function getCedulaCliente(){
    return $this->cedulaCliente;
  }
  
  function getCedulaVendedor(){
    return $this->cedulaVendedor;
  }
  
  function getFechaRegistro(){
    return $this->fechaRegistro;
  }
  
  function getDetalles(){
    return $this->detalles;
  }
  
  function setCodigo($parametro){
    $this->codigo=$parametro;
  }
  
  function setCedulaCliente($parametro){
    $this->cedulaCliente=$parametro;
  }
  
  function setCedulaVendedor($parametro){
    $this->cedulaVendedor=$parametro;
  }
  
  function setFechaRegistro($parametro){
    $this->fechaRegistro=$parametro;
  }
  
  function setDetalles($parametro){
    $this->detalles=$parametro;
  }

  function updateDatos($parametro){
  	$this->codigo=$parametro['Codigo'];
  	$this->cedulaCliente=$parametro['Cedula_Cliente'];
  	$this->cedulaVendedor=$parametro['Cedula_Vendedor'];
  	$this->fechaRegistro=$parametro['Fecha_Registro'];
  	$this->detalles=$parametro['Detalles'];
  }
}
?>