<?php

function borrarArticulo($id){
  $sql="DELETE FROM Articulo WHERE Id=$id";
  mysql_query($sql);
}

function borrarVendedor($cedula){
  $sql="DELETE FROM Vendedor WHERE Cedula=$cedula";
  mysql_query($sql);
}

function borrarAbonos($codigo){
  $sql = "DELETE FROM Abono WHERE Codigo=$codigo";
  mysql_query($sql);
}

?>