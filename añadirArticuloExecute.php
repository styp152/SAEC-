<?php
include('libreria.php');
include('db/inserts.php');
require_once('clases/Articulo.php');
conectarDB();
$articulo= new Articulo();
$articulo->updateDatos($_REQUEST);
insertarArticulo($articulo);
?>
