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

function buscarArticulosPorNombre($nombre){
  $sql="SELECT Nombre FROM Articulo WHERE Nombre LIKE '%".$nombre."%' ORDER BY Nombre LIMIT 10";
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

function buscarClientePorCedula($cliente){
  $sql='SELECT * FROM Cliente WHERE Cedula = '.$cliente->getCedula().' LIMIT 1';
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $cliente->updateDatos($row);
  return $cliente;
}

?>