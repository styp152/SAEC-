<?php
include('session.php');
include('libreria.php');
include('db/updates.php');
include('db/searchs.php');
require_once('clases/Vendedor.php');

conectarDB();

$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);

if($_SESSION["Nivel"] != 2){
    $vendedorExistente = new Vendedor();
    $vendedorExistente = buscarVendedorPorCedulaClaveSinCifrar($vendedor->getCedula());
    $claveActual = $_REQUEST['ClaveActual'];
    if($vendedorExistente->getClave() != $claveActual){
        ?>
        <script type="text/javascript">
            alert("Contraseña inválida"); 
            location.href="editarEmpleadoExecute.php?Cedula='<?php echo $vendedor->getCedula();?>'";
        </script>    
        <?php
    }
    if($_REQUEST['_ClaveNueva'] != $_REQUEST['_ClaveConfirmar']){
        ?>
        <script type="text/javascript">
            alert("Contraseña Nueva no coincide"); 
            location.href="editarEmpleadoExecute.php?Cedula='<?php echo $vendedor->getCedula();?>'";
        </script>    
        <?php
    }
    if($_REQUEST['_ClaveNueva'] != ''){
        $vendedor->setClave($_REQUEST['_ClaveNueva']);
    }else{
        $vendedor->setClave($vendedorExistente->getClave);
    }
    actualizarVendedorDesdeEmpleado($vendedor);
}else{
    actualizarVendedorDesdeAdministrador($vendedor);    
}
?>
<script type="text/javascript">
    alert('Ya se Actualizo con Exito el Empleado');
    location.href='administracion.php';
</script>