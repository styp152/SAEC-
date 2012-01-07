<?php
include('libreria.php');
include('db/updates.php');
require_once('clases/Articulo.php');
conectarDB();
$articulo= new Articulo();
$articulo->updateDatos($_REQUEST);
actualizarArticulo($articulo);
?>
<script type="text/javascript">
alert('Ya se Actualizo con Exito el Articulo');
location.href='inventario.php';
</script>