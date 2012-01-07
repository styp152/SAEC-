<?php
include('session.php');
include('libreria.php');
include('db/updates.php');
require_once('clases/Cliente.php');
conectarDB();
$cliente = new Cliente();
$cliente->updateDatos($_REQUEST);
actualizarCliente($cliente);
?>
<script>
alert('El CLiente a sido Actualizado Correctamente');
location.href='administracion.php';
</script>