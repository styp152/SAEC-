<?php
    
    // TODO Conectar a la Base de datos

    $cedula = $_REQUEST['cedula'];
    $nombre = $_REQUEST['nombre'];
    $direccion = $_REQUEST['direccion'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['tlf_codigo'] + $_REQUEST['tlf_numero'];;

    $fecha = $_REQUEST['fecha'];
    $detalles = $_REQUEST['detalles'];
    
    // TODO: Pedir elementos de los productos    
    //$cantidad = $_REQUEST['cantidad'];
    //$precio = $_REQUEST['precio'];
    //$descripcion = $_REQUEST['descripcion'];

    // TODO hacer el procesamiento
    
    include('crearPresupuestoShow.php');
?>