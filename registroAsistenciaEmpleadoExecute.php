<?php
include("session.php");
include("libreria.php");
include_once('clases/Vendedor.php');
include_once('clases/Asistencia.php');
include_once('db/searchs.php');
include_once('db/inserts.php');
include_once('db/updates.php');

conectarDB();

$clave = $_REQUEST['Clave'];
$vendedor = new Vendedor();
$vendedor = buscarVendedorPorCedulaClaveSinCifrar($_SESSION['Cedula']);

if($clave != $vendedor->getClave()){
    ?>
    <script type="text/javascript">
    alert("La Clave no es Correcta");
    location.href="registroAsistenciaEmpleado.php";
    </script>
    <?php
}
else{
    $fecha=DATE('Y/m/d');
    $correctHora = correctHora();
    $m=getM($correctHora);

    $asistencia = new Asistencia();
    $asistencia = buscarAsistencia($vendedor->getCedula(),$fecha);
    //echo 'Id = '.$asistencia->getId().'<br />';
    //echo 'Fecha = '.$asistencia->getFecha().'<br />';
    //echo 'horaEntrada = '.$asistencia->getHoraEntrada().'<br />';
    //echo 'mHoraEntrada = '.$asistencia->getMHoraEntrada().'<br />';
    //echo 'HoraSalida = '.$asistencia->getHoraSalida().'<br />';
    //echo 'mHoraSalida = '.$asistencia->getMHoraSalida().'<br />';
    //echo 'Nota = '.$asistencia->getNota().'<br />';
    if($asistencia->getHoraEntrada() == null){
        $asistencia->setFecha($fecha);
        $asistencia->setHoraEntrada($correctHora);
        $asistencia->setMHoraEntrada($m);
        $asistencia->setCedulaVendedor($_SESSION['Cedula']);
        insertarAsistencia($asistencia);
    }
    else{
        $asistencia->setHoraSalida($correctHora);
        $asistencia->setMHoraSalida($m);
        actualizarAsistencia($asistencia);
    }
}

include('registroAsistenciaEmpleadoShow.php');
?>