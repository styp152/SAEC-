<?php

function insertarArticulo($articulo){
  $sql='INSERT INTO Articulo (Id, Nombre, Precio, Descripcion, Cantidad) VALUES
  (\'\',\''.$articulo->getNombre().'\',\''.$articulo->getPrecio().'\',\''.
  $articulo->getDescripcion().'\',\''.$articulo->getCantidad().'\')';
  return @mysql_query($sql) or die('Error Al Insertar el Articulo');
}

function insertarVendedor($vendedor){
  $sql='INSERT INTO Vendedor (Cedula, AvisoRegistro, Nombre, Apellido, Cargo, Nivel, Clave) VALUES
  ('.$vendedor->getCedula().',\''.$vendedor->getAvisoRegistro().'\',\''.$vendedor->getNombre().'\',\''.$vendedor->getApellido().'\',\''.
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
  
function insertarFactura($factura, $articulos, $cantidad, $abono){
  $sql='INSERT INTO Factura (Codigo, Cedula_Clientes, Cedula_Vendedor, Fecha_Registro,
    Fecha_Entrega, Tipo_Pago, nTipo_Pago, Detalles, Estado, Abono) VALUES ( \'\', \''.$factura->getCedulaCliente().
    '\', \''.$factura->getCedulaVendedor().'\', \''.$factura->getFechaRegistro().'\', \''.
    $factura->getFechaEntrega().'\', \''.$factura->getTipoPago().'\', \''.$factura->getNTipoPago().
    '\', \''.$factura->getDetalles().'\', \'Facturado\','.$abono.')';
  @mysql_query($sql) or die('Error Al Insertar la Factura');
  $codigo=buscarCodigoFacturaPorTodo($factura);
  $sql='INSERT INTO Articulo_Factura (ArticuloId, FacturaCodigo, Cantidad_Vendida,	Precio_Venta) VALUES (\''.
    $articulos[0]->getId().'\', \''.$codigo.'\', \''.$cantidad[0].'\', \''.$articulos[0]->getPrecio().'\')';
  for($i=1;$i<count($articulos);$i++){
    $sql=$sql.', (\''.$articulos[$i]->getId().'\', \''.$codigo.'\', \''.$cantidad[$i].'\', \''.
      $articulos[$i]->getPrecio().'\')';
  }
  @mysql_query($sql) or die('Error Al Insertar la Relacion Factura-Articulo');
}

function insertarPresupuesto($presupuesto, $articulos, $cantidad){
  $sql='INSERT INTO Presupuesto (Codigo, Cedula_Cliente, Cedula_Vendedor, Fecha_Registro,
    Detalles) VALUES ( \'\', \''.$presupuesto->getCedulaCliente().'\', \''.
    $presupuesto->getCedulaVendedor().'\', \''.$presupuesto->getFechaRegistro().'\', \''.
    $presupuesto->getDetalles().'\')';
  @mysql_query($sql) or die('Error Al Insertar la Factura');
  $codigo=buscarCodigoPresupuestoPorTodo($presupuesto);
  $sql='INSERT INTO Articulo_Presupuesto (ArticuloId, PresupuestoCodigo, Cantidad_Pedida,
  Precio_Presupuesto) VALUES (\''.$articulos[0]->getId().'\', \''.$codigo.'\', \''.$cantidad[0].
  '\', \''.$articulos[0]->getPrecio().'\')';
  for($i=1;$i<count($articulos);$i++){
    $sql=$sql.', (\''.$articulos[$i]->getId().'\', \''.$codigo.'\', \''.$cantidad[$i].'\', \''.
      $articulos[$i]->getPrecio().'\')';
  }
  @mysql_query($sql) or die('Error Al Insertar la Relacion Factura-Articulo');
}

function insertarAbono($abono){
  $sql = "INSERT INTO Abono (Id, Codigo, Cedula_Vendedor, Fecha_Registro, Monto)
    VALUES ('', ".$abono->getCodigo().", '".$abono->getCedulaVendedor()."', '".
    DATE('Y/m/d')."', ".$abono->getMonto().");";
  @mysql_query($sql) or die('Error Al Insertar el Abono');
}

function insertarGasto($gasto){
  $sql = "INSERT INTO Gasto (Id, Cedula_Vendedor, Fecha_Registro, Monto, Descripcion)
    VALUES ('', '".$gasto->getCedulaVendedor()."', '".DATE('Y/m/d')."', ".$gasto->getMonto().",
    '".$gasto->getDescripcion()."');";
  @mysql_query($sql) or die('Error Al Insertar el Gasto');
}

function insertarCC($cc){
  $sql = "INSERT INTO CajaChica (Id, Fecha_Registro, Monto)
    VALUES ('', '".DATE('Y/m/d')."', ".$cc->getMonto().");";
  @mysql_query($sql) or die('Error Al Insertar la CajaChica del Dia');
}

?>