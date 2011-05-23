<?php

function borrarArticulo($id){
  $sql="DELETE FROM Articulo WHERE Id=$id";
  mysql_query($sql);
}

?>