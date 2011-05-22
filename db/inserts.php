<?php

function insertarArticulo($articulo){
  $sql='INSERT INTO Articulo (Id, Nombre, Precio, Descripcion, Cantidad) VALUES
  (\'\',\''.$articulo->getNombre().'\',\''.$articulo->getPrecio().'\',\''.
  $articulo->getDescripcion().'\',\''.$articulo->getCantidad().'\')';
  echo $sql;
}

?>