<?php
include('libreria.php');
include_once('clases/Articulo.php');
include_once('db/deletes.php');
conectarDB();
$id=$_REQUEST['Id'];
borrarArticulo($id);
?>
<script type="text/javascript">
alert('Ya se Elimino con Exito el Articulo');
location.href='inventario.php';
</script>