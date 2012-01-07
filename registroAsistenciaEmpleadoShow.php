<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Registro de Asistencia</h2>
<table align="center" border="0" style=' text-align: center; font-size:medium;'>
    <tr>
        <td class="bold">Hora de Entrada</td>
        <td class="bold">Hora de Salida</td>
    </tr>
    <tr>
        <td><?php echo $asistencia->getHoraEntrada().' '.$asistencia->getMHoraEntrada(); ?> </td><td>
            <?php if ($asistencia->getHoraSalida()=='00:00:00'): ?>
                -------
            <?php else: ?>
              	<?php echo $asistencia->getHoraSalida().' '.$asistencia->getMHoraSalida(); ?>
            <?php endif ?>
        </td>
    </tr>
</table>
<div align="center"><input type="button" value="Ok" onclick="ir('administracion.php');" /></div>


</div>
<?php
include('menuAdministracion.php');
include('foot.html');
?>