<?php
include('libreria.php');
include_once('clases/Vendedor.php');
include_once('db/deletes.php');

conectarDB();

$cedula=$_REQUEST['Cedula'];

borrarVendedor($cedula);

?>
<script type="text/javascript">
    alert('Ya se Elimino con Exito el Empleado');
    location.href='administracion.php';
</script>