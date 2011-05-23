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

?>