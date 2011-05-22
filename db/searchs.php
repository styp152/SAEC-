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
  $sql="SELECT * FROM Articulo WHERE Nombre = $nombre";
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
  $sql="SELECT Nombre FROM Articulo WHERE Nombre LIKE $nombre";
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
?>