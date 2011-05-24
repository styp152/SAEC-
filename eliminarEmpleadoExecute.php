<?php
include('libreria.php');
include_once('clases/Vendedor.php');
include_once('db/searchs.php');

conectarDB();

$cedula=$_REQUEST['Cedula'];
$vendedor=buscarVendedorPorCedula($cedula);
if($vendedor->getCedula()==''){
    ?>
    <script type="text/javascript">
    alert('No se Encontro Empleado con esa Cedula');
    location.href='eliminarEmpleado.php';
    </script>
    <?php
}
include('eliminarEmpleadoShow.php');
?>