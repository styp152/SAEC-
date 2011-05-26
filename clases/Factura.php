<?php
class Factura{
	var $codigo;
	var $cedulaCliente;
	var $cedulaVendedor;
	var $fechaRegistro;
  var $fechaEntrega;
  var $tipoPago;
  var $nTipoPago;
	var $detalles;
  var $estado;

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
  
  function getFechaEntrega(){
    return $this->fechaEntrega;
  }
  
  function getTipoPago(){
    return $this->tipoPago;
  }
  
  function getNTipoPago(){
    return $this->nTipoPago;
  }
  
  function getDetalles(){
    return $this->detalles;
  }
  
  function getEstado(){
    return $this->estado;
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
  
  function setFechaEntrega($parametro){
    $this->fechaEntrega=$parametro;
  }
  
  function setTipoPago($parametro){
    $this->tipoPago=$parametro;
  }
  
  function setNTipoPago($parametro){
    $this->nTipoPago=$parametro;
  }
  
  function setDetalles($parametro){
    $this->detalles=$parametro;
  }
  
  function setEstado($parametro){
    $this->estado=$parametro;
  }

  function updateDatos($parametro){
  	$this->codigo=$parametro['Codigo'];
  	$this->cedulaCliente=$parametro['Cedula_Cliente'];
  	$this->cedulaVendedor=$parametro['Cedula_Vendedor'];
  	$this->fechaRegistro=$parametro['Fecha_Registro'];
    $this->fechaEntrega=$parametro['Fecha_Entrega'];
    $this->tipoPago=$parametro['Tipo_Pago'];
    $this->nTipoPago=$parametro['nTipo_Pago'];
  	$this->detalles=$parametro['Detalles'];
    $this->estado=$parametro['Estado'];
  }
}
?>