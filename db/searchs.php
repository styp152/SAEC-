<?php

function buscarUltimosArticulos($limite){
  $sql="SELECT COUNT(*) FROM Articulo";
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
  $cantidad = (int)$row[0];
  if(($cantidad-$limite) < 0){
    $limite=$cantidad;
  }
  $limite=$cantidad-$limite;
  $sql="SELECT * FROM Articulo LIMIT $limite, $cantidad ";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[] = $articulo;
  }
  return $articulos;
}

function buscarArticulo($nombre){
  $sql="SELECT * FROM Articulo WHERE Nombre = '$nombre'";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $articulo = new Articulo();
  $articulo->updateDatos($row);
  return $articulo;
}

function buscarCantidadArticuloPorId($id){
  $sql="SELECT Cantidad FROM Articulo WHERE Id = $id";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $articulo = new Articulo();
  $articulo->updateDatos($row);
  return $articulo;
}

function buscarArticulosPorCantidad($cantidad){
  $sql="SELECT * FROM Articulo WHERE Cantidad = $cantidad";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[] = $articulo;
  }
  return $articulos;
}

function buscarArticulosPorNombre($nombre){
  $sql="SELECT Nombre,Precio FROM Articulo WHERE Nombre LIKE '%".$nombre."%' ORDER BY Nombre LIMIT 10";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[]=$articulo;
  }
  return $articulos;
}

function buscarArticulos(){
  $sql="SELECT * FROM Articulo";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[]=$articulo;
  }
  return $articulos;
}

function buscarVendedorPorCedula($cedula){
  $sql="SELECT * FROM Vendedor WHERE Cedula = $cedula LIMIT 1";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $vendedor = new Vendedor();
  $vendedor->updateDatos($row);
  return $vendedor;
}

function buscarVendedorPorCedulaClaveSinCifrar($cedula){
  $sql="SELECT Cedula,Nombre,Apellido,Cargo,Nivel,AES_DECRYPT(Clave,'Password') as Clave FROM Vendedor WHERE Cedula = $cedula LIMIT 1";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $vendedor = new Vendedor();
  $vendedor->updateDatos($row);
  return $vendedor;
}

function buscarVendedores(){
  $sql="SELECT * FROM Vendedor";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $vendedor = new Vendedor();
    $vendedor->updateDatos($row);
    $vendedores[]=$vendedor;
  }
  return $vendedores;
}

function buscarClientePorCedula($cliente){
  $sql='SELECT * FROM Cliente WHERE Cedula = '.$cliente->getCedula().' LIMIT 1';
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $cliente= new Cliente();
  $cliente->updateDatos($row);
  return $cliente;
}

function buscarAsistencia($cedula,$fecha){
  $sql="SELECT Asistencia.Id, Asistencia.Fecha, Asistencia.Hora_Entrada, Asistencia.mHora_Entrada, Asistencia.Hora_Salida,
  Asistencia.mHora_Salida, Asistencia.Nota FROM Vendedor,Asistencia WHERE Vendedor.Cedula='$cedula' and Asistencia.Cedula_Vendedor='$cedula'
   and Asistencia.Fecha='$fecha' and Asistencia.Hora_Salida='00:00:00'";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $asistencia = new Asistencia();
  $asistencia->updateDatos($row);
  return $asistencia;
}

function buscarAsistenciasEntreFechas($cedula,$fecha1,$fecha2){
  $sql="SELECT Asistencia.Id, Asistencia.Fecha, Asistencia.Hora_Entrada, Asistencia.mHora_Entrada, Asistencia.Hora_Salida,
  Asistencia.mHora_Salida, Asistencia.Nota FROM Vendedor,Asistencia WHERE Vendedor.Cedula='$cedula' and Asistencia.Cedula_Vendedor='$cedula'
   and Asistencia.Fecha>='$fecha1' and Asistencia.Fecha<='$fecha2'";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $asistencia = new Asistencia();
    $asistencia->updateDatos($row);
    $asistencias[]=$asistencia;
  }
  return $asistencias;
}

?>