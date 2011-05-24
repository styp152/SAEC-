<?php

function insertarArticulo($articulo){
  $sql='INSERT INTO Articulo (Id, Nombre, Precio, Descripcion, Cantidad) VALUES
  (\'\',\''.$articulo->getNombre().'\',\''.$articulo->getPrecio().'\',\''.
  $articulo->getDescripcion().'\',\''.$articulo->getCantidad().'\')';
  return @mysql_query($sql) or die('Error Al Insertar el Articulo');
}

function insertarVendedor($vendedor){
  $sql='INSERT INTO Vendedor (Cedula, Nombre, Apellido, Cargo, Nivel, Clave) VALUES
  ('.$vendedor->getCedula().',\''.$vendedor->getNombre().'\',\''.$vendedor->getApellido().'\',\''.
  $vendedor->getCargo().'\',\''.$vendedor->getNivel().'\', AES_ENCRYPT(\'text\',\''.$vendedor->getClave().'\'))';
  return @mysql_query($sql) or die('Error Al Insertar el Empleado');
}

?>