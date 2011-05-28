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
  
function insertarFactura($factura, $articulos, $cantidad){
  $sql='INSERT INTO Factura (Codigo, Cedula_Clientes, Cedula_Vendedor, Fecha_Registro,
    Fecha_Entrega, Tipo_Pago, nTipo_Pago, Detalles, Estado) VALUES ( \'\', \''.$factura->getCedulaCliente().
    '\', \''.$factura->getCedulaVendedor().'\', \''.$factura->getFechaRegistro().'\', \''.
    $factura->getFechaEntrega().'\', \''.$factura->getTipoPago().'\', \''.$factura->getNTipoPago().
    '\', \''.$factura->getDetalles().'\', \'Facturado\')';
  @mysql_query($sql) or die('Error Al Insertar la Factura');
  $codigo=buscarCodigoFacturaPorTodo($factura);
  $sql='INSERT INTO Articulo_Factura (ArticuloId, FacturaCodigo, Cantidad_Vendida,	Precio_Venta) VALUES (\''.
    $articulos[0]->getId().'\', \''.'1'.'\', \''.$cantidad[0].'\', \''.$articulos[0]->getPrecio().'\')';
  for($i=1;$i<count($articulos);$i++){
    $sql=$sql.', (\''.$articulos[$i]->getId().'\', \''.$codigo.'\', \''.$cantidad[$i].'\', \''.
      $articulos[$i]->getPrecio().'\')';
  }
  @mysql_query($sql) or die('Error Al Insertar la Relacion Factura-Articulo');
}

?>