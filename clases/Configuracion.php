<?php
class Configuracion{
  var $id;
	var $campo;
  var $valor;

  function __construct(){}
  
  function getId(){
    return $this->id;
  }
  
  function getCampo(){
    return $this->campo;
  }
  
  function getValor(){
    return $this->valor;
  }
  
  function setId($parametro){
    $this->id=$parametro;
  }
  
  function setCampo($parametro){
    $this->campo=$parametro;
  }
  
  function setValor($parametro){
    $this->valor=$parametro;
  }

  function updateDatos($parametro){
    $this->id=$parametro['Id'];
  	$this->campo=$parametro['Campo'];
    $this->valor=$parametro['Valor'];
  }
}
?>