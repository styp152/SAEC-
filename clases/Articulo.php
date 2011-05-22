<?php
class Articulo{
	private $idArticulo;
	private $nombre;
	private $precio;
	private $descripcion;
	private $cantidad;

  function __construct(){}
  
  function getId(){
    return $this->idArticulo;
  }
  
  function getNombre(){
    return $this->nombre;
  }
  
  function getPrecio(){
    return $this->precio;
  }
  
  function getDescripcion(){
    return $this->descripcion;
  }
  
  function getCantidad(){
    return $this->cantidad;
  }
  
  function setId($parametro){
    $this->idArticulo=$parametro;
  }
  
  function setNombre($parametro){
    $this->nombre=$parametro;
  }
  
  function setPrecio($parametro){
    $this->precio=$parametro;
  }
  
  function setDescripcion($parametro){
    $this->descripcion=$parametro;
  }
  
  function setCantidad($parametro){
    $this->cantidad=$parametro;
  }

  function updateDatos($parametro){
  	$this->idArticulo=$parametro['Id'];
  	$this->nombre=$parametro['Nombre'];
  	$this->precio=$parametro['Precio'];
  	$this->descripcion=$parametro['Descripcion'];
  	$this->cantidad=$parametro['Cantidad'];
  }
}

?>