<?php
include('libreria.php');
include('db/updates.php');
include('db/searchs.php');
require_once('clases/Vendedor.php');

conectarDB();

$vendedor= new Vendedor();
$vendedor->updateDatos($_REQUEST);

if($_SESSION["Nivel"] != 2){
    $cedula = $_REQUEST['Cedula'];
    $vendedorExistente = new Vendedor();
    $vendedorExistente = buscarVendedorPorCedulaClaveSinCifrar($cedula);
    $claveActual = $_REQUEST['ClaveActual'];
    settype($claveActual, "string");
    
    echo $vendedorExistente->getClave()." y la actual es ".$claveActual;
    
    
    if($vendedorExistente->getClave() == $claveActual){
        ?>
        <script type="text/javascript">
            alert('Contraseña inválida'); 
            location.href='editarEmpleado.php?Cedula='.$vendedor->getCedula().'';
        </script>    
        <?php
    }
    if($_REQUEST['_ClaveNueva'] != $_REQUEST['_ClaveConfirmar']){
        ?>
        <script type="text/javascript">
            alert('Contraseña Nueva no coincide'); 
            location.href='editarEmpleadoExecute.php?Cedula='.$vendedor->getCedula().'';
        </script>    
        <?php
    }
    if($_REQUEST['_ClaveNueva'] != ''){
        $vendedor->setClave($_REQUEST['_ClaveNueva']);
    }
    actualizarVendedorSinCifrar($vendedor);
}else{
    actualizarVendedorCifrado($vendedor);    
}
?>
<script type="text/javascript">
//alert('Ya se Actualizo con Exito el Empleado');
//location.href='administracion.php';
</script>