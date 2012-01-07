<?php
class Asistencia{
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
    return $this->idAsistencia;
  }
  
  function getFecha(){
    return $this->fecha;
  }
  
  function getHoraEntrada(){
    return $this->horaEntrada;
  }
  
  function getMHoraEntrada(){
    return $this->mhoraEntrada;
  }
  
  function getHoraSalida(){
    return $this->horaSalida;
  }
  
  function getMHoraSalida(){
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
  
  function setHoraEntrada($parametro){
    $this->horaEntrada=$parametro;
  }
  
  function setMHoraEntrada($parametro){
    $this->mhoraEntrada=$parametro;
  }
  
  function setHoraSalida($parametro){
    $this->horaSalida=$parametro;
  }
  
  function setMHoraSalida($parametro){
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