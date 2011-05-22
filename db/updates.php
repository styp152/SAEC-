<?php

function actualizarCantidadArticulo($id,$cantidad){
  $sql="UPDATE Articulo SET Cantidad=$cantidad WHERE Id=$id";
  mysql_query($sql);
}

?>