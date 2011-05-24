<?php
include('libreria.php');
include_once('clases/Vendedor.php');
include_once('db/searchs.php');

conectarDB();

$cedula = $_REQUEST['Cedula'];
$vendedor=buscarVendedorPorCedula($cedula);

if($vendedor->getCedula()==''){
?>
    <script type="text/javascript">
    alert('No se Encontro un Empleado con ese Numero de Cedula');
    location.href='editarEmpleado.php';
    </script>
<?php
}
include('editarEmpleadoShow.php');
?>