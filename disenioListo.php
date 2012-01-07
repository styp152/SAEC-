<?php 
include('libreria.php');
include('clases/Factura.php');
include('db/updates.php');

conectarDB();
$codigo = $_REQUEST['Codigo'];

if(actualizarEstadoDeFactura($codigo, 'Facturado')):
?>
  <script type="text/javascript">
    alert('Productos Marcados como Listo el Diseño Exitosamente');
    location.href='coladisenio.php';
  </script>
<?php
else:
?>
  <script type="text/javascript">
    alert('No se pudo Completar la Operacion Exitosamente ');
    location.href='coladisenio.php';
  </script>
<?php
endif;
?>