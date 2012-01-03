<?php

function actualizarCantidadArticulo($id,$cantidad){
  $sql="UPDATE Articulo SET Cantidad=$cantidad WHERE Id=$id";
  mysql_query($sql);
}

function actualizarArticulo($articulo){
  $sql="UPDATE Articulo SET Nombre='".$articulo->getNombre()."', Precio=".$articulo->getPrecio().
    ", Descripcion='".$articulo->getDescripcion()."', Cantidad=".$articulo->getCantidad().
    " WHERE Id=".$articulo->getId();
  mysql_query($sql);
}

function actualizarVendedorDesdeAdministrador($vendedor){
  $sql="UPDATE Vendedor SET AvisoRegistro=".$vendedor->getAvisoRegistro().", Nombre='".$vendedor->getNombre()."', Apellido='".$vendedor->getApellido().
    "', Cargo='".$vendedor->getCargo()."', Nivel=".$vendedor->getNivel().
    " WHERE Cedula=".$vendedor->getCedula();
  mysql_query($sql);
}

function actualizarVendedorDesdeEmpleado($vendedor){
  $sql="UPDATE Vendedor SET AvisoRegistro=".$vendedor->getAvisoRegistro().", Nombre='".$vendedor->getNombre()."', Apellido='".$vendedor->getApellido().
    "', Cargo='".$vendedor->getCargo()."', Clave = AES_ENCRYPT('".$vendedor->getClave()."','Password')
     WHERE Cedula=".$vendedor->getCedula();
  mysql_query($sql);
}

function actualizarCliente($cliente){
  $sql='UPDATE Cliente SET Nacionalidad=\''.$cliente->getNacionalidad().'\', Nombre=\''.$cliente->getNombre().
    '\', Telefono=\''.$cliente->getTelefono().'\', Direccion=\''.$cliente->getDireccion().
    '\', Correo=\''.$cliente->getCorreo().'\' WHERE Cedula='.$cliente->getCedula();
  return mysql_query($sql)or die("Error al Actualizar un Cliente");
}

function actualizarAsistencia($asistencia){
  $sql='UPDATE Asistencia SET Hora_Salida=\''.$asistencia->getHoraSalida().'\', mHora_Salida=\''.$asistencia->getMHoraSalida().'\'
   WHERE Id='.$asistencia->getId();
  return mysql_query($sql)or die("Error al Registrar la Asistencia");
}

function actualizarEstadoDeFactura($codigo, $estado){
  $sql='UPDATE Factura SET Estado=\''.$estado.'\' WHERE Codigo='.$codigo;
  return mysql_query($sql)or die("Error al Actualizar la Factura");
}

function actualizarAbonoFactura($codigo, $abono){
  $sql='UPDATE Factura SET Abono=\''.$abono.'\' WHERE Codigo='.$codigo;
  return mysql_query($sql)or die("Error al Actualizar la Factura");
}

function actualizarCC($monto){
  $sql = "UPDATE CajaChica SET Monto=".$monto." WHERE Fecha_Registro =".DATE('Y-m-d');
  @mysql_query($sql) or die('Error Al Actualizar la CajaChica del Dia');
}

?>