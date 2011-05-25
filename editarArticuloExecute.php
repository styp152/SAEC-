<?php
include('libreria.php');
include_once('clases/Articulo.php');
include_once('db/searchs.php');
conectarDB();
$nombre=$_REQUEST['nombre'];
$articulo=buscarArticulo($nombre);
if($articulo->getNombre()==''){
?>
<script type="text/javascript">
alert('No se Encontro Articulo con ese Nombre');
location.href='editarArticulo.php';
</script>
<?php
}
include('editarArticuloShow.php');
?>