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
  $vendedor->getCargo().'\',\''.$vendedor->getNivel().'\', AES_ENCRYPT(\''.$vendedor->getClave().'\',\'Password\'))';
  return @mysql_query($sql) or die('Error Al Insertar el Empleado');
}

function insertarCliente($cliente){
  $sql='INSERT INTO Cliente (Cedula, Nacionalidad, Nombre, Telefono, Direccion, Correo) VALUES
  ('.$cliente->getCedula().',\''.$cliente->getNacionalidad().'\',\''.$cliente->getNombre().'\',\''.
  $cliente->getTelefono().'\',\''.$cliente->getDireccion().'\', \''.$cliente->getCorreo().'\')';
  return @mysql_query($sql) or die('Error Al Insertar el Cliente');
}

function insertarAsistencia($asistencia){
  $sql='INSERT INTO Asistencia (Hora_Entrada, mHora_Entrada, Hora_Salida, mHora_Salida, Fecha, Cedula_Vendedor, Nota)
  VALUES (\''.$asistencia->getHoraEntrada().'\', \''.$asistencia->getMHoraEntrada().'\', \''.$asistencia->getHoraSalida().'\',
  \''.$asistencia->getMHoraSalida().'\', \''.$asistencia->getFecha().'\', \''.$asistencia->getCedulaVendedor().'\',
  \''.$asistencia->getNota().'\')';
  return @mysql_query($sql) or die('Error Al Insertar la Asistencia');
  }

?>