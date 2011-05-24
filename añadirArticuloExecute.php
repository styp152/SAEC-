<?php
include('libreria.php');
include('db/inserts.php');
include('db/searchs.php');
require_once('clases/Articulo.php');
conectarDB();
$articulo= new Articulo();
$articulo->updateDatos($_REQUEST);
if ($articulo->getNombre()=='') {
  throw new Exception('Datos de Articulo Vacios');
}
try{
  $articuloExistente = new Articulo();
  $articuloExistente = buscarArticulo($articulo->getNombre());
  if($articuloExistente->getNombre() == ''){
    insertarArticulo($articulo);  
  }else{
    ?>
    <script type="text/javascript">
    alert('Este articulo ya existe');
    location.href='añadirArticulo.php';
    </script>    
    <?php
  }
  
}
catch(Exception $e){
  echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>
<script type="text/javascript">
alert('Ya se Registro con Exito el Articulo');
location.href='inventario.php';
</script>
