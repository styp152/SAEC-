<?php
include('session.php');
include('libreria.php');
require_once('clases/Configuracion.php');
include('db/updates.php');

conectarDB();

$config = new Configuracion();
$config->updateDatos($_REQUEST);

if(actualizarConfig($config->getCampo(), $config->getValor())){
?>
  <script type="text/javascript">
    alert('Registro Actualizado Correctamente');
  </script> 
<?php
}else{
?>
  <script type="text/javascript">
    alert('Error Actualizando Registro');
  </script> 
<?php  
}
?>
<script type="text/javascript">
  location.href="facturacion.php";
</script>

