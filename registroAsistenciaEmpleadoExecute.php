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

$usuario = 'styp152';
$password = '210689';
$texto = urlencode('El Empleado '.$vendedor->getApellido().' '.$vendedor->getNombre().'Acaba de Registrar su Entrada a las '.DATE('h-m-s'));
$url = 'http://expresalo.com.ve/expresalo/sendsms/enviar/'.$usuario.'/'.$password.'/04167710885/'.$texto;
echo $url;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


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
    if($asistencia->getHoraEntrada() == null){
        $asistencia->setFecha($fecha);
        $asistencia->setHoraEntrada($correctHora);
        $asistencia->setMHoraEntrada($m);
        $asistencia->setCedulaVendedor($_SESSION['Cedula']);
        insertarAsistencia($asistencia);
        if($vendedor->getAvisoRegistro()==1){
            $respuesta = curl_exec($ch);
            if($respuesta[0]==1){
                $cantidad = substr($respuesta, strpos($respuesta, '>')+1, strpos($respuesta, '<', 6)-strpos($respuesta, '>')-1);
                if($cantidad<=10){?>
                <script type="text/javascript">
                  alert('Restan <?php echo $cantidad;?> Mensajes, Contacte con el Proveedor');
                </script>
                <?php }
            }
        }
    }
    else{
        echo 'HoraSalida = '.$asistencia->getHoraSalida().'<br />';
        //$asistencia->setHoraSalida($correctHora);
        $asistencia->setHoraSalida($correctHora);
        $asistencia->setMHoraSalida($m);
        actualizarAsistencia($asistencia);
    }
}

include('registroAsistenciaEmpleadoShow.php');
?>