<?php
class CajaChica{
  var $id;
	var $fechaRegistro;
  var $monto;

  function __construct(){}
  
  function getId(){
    return $this->id;
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
  
  function setFechaRegistro($parametro){
    $this->fechaRegistro=$parametro;
  }
  
  function setMonto($parametro){
    $this->monto=$parametro;
  }

  function updateDatos($parametro){
    $this->id=$parametro['Id'];
  	$this->fechaRegistro=$parametro['Fecha_Registro'];
    $this->monto=$parametro['Monto'];
  }
}
?>