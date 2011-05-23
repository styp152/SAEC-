<?php
class asistencia{
	var $idAsistencia;
  var $fecha;
	var $horaEntrada;
	var $mhoraEntrada;
	var $horaSalida;
	var $mhoraSalida;
	var $cedulaVendedor;
	var $nota;

  function __construct(){}

  function getId(){
    return $this->idArticulo;
  }
  
  function getFecha(){
    return $this->fecha;
  }
  
  function getEntrada(){
    return $this->horaEntrada;
  }
  
  function getMEntrada(){
    return $this->mhoraEntrada;
  }
  
  function getSalida(){
    return $this->horaSalida;
  }
  
  function getMSalida(){
    return $this->mhoraSalida;
  }
  
  function getCedulaVendedor(){
    return $this->cedulaVendedor;
  }
  
  function getNota(){
    return $this->nota;
  }
  
  function setId($parametro){
    $this->idAsistencia=$parametro;
  }
  
  function setFecha($parametro){
    $this->fecha=$parametro;
  }
  
  function setEntrada($parametro){
    $this->horaEntrada=$parametro;
  }
  
  function setMEntrada($parametro){
    $this->mhoraEntrada=$parametro;
  }
  
  function setSalida($parametro){
    $this->horaSalida=$parametro;
  }
  
  function setMSalida($parametro){
    $this->mhoraSalida=$parametro;
  }
  
  function setCedulaVendedor($parametro){
    $this->cedulaVendedor=$parametro;
  }
  
  function setNota($parametro){
    $this->nota=$parametro;
  }
  
  function updateDatos($parametro){
	$this->idAsistencia=$parametro['Id'];
  $this->fecha=$parametro['Fecha'];
	$this->horaEntrada=$parametro['Hora_Entrada'];
	$this->mhoraEntrada=$parametro['mHora_Entrada'];
	$this->horaSalida=$parametro['Hora_Salida'];
	$this->mhoraSalida=$parametro['mHora_Salida'];
  $this->cedulaVendedor=$parametro['Cedula_Vendedor'];
	$this->nota=$parametro['Nota'];
  }
  
}
?>