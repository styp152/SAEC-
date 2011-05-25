<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<div id="primero">
    <h4>Pagina 1</h4>
    <table id="asistencia" border="1" >    
        <tr>
            <td>Fecha</td>
            <td colspan="2">Turno Mañana</td>
            <td colspan="2">Turno Tarde</td>
            <td>Notas</td>
        </tr>
        <?php $k=0;$contador[1]="segundo";$contador[2]="tercero"; $contador[0]="primero";$count=-5; ?>
        <?php for($j = 0; $j < $size; $j++):?>
            <?php if($k==11 or $k==22):?>
                <?php $count=(($k-11)/11); ?>
                </table>
                <div style="float:right;">
                    <?php if((($k-11)/11)>0): ?>
                        <input id="<?php echo ($k-11)/11; ?>" type="button" value="Atras" onclick="document.getElementById('<?php echo $contador[(($k-11)/11)]; ?>').style.display='none';document.getElementById('<?php echo $contador[(($k-11)/11)-1]; ?>').style.display='inline';" />
                    <?php endif; ?>
                        <input id="<?php echo ($k-11)/11; ?>" type="button" value="Siguiente" onclick="document.getElementById('<?php echo $contador[(($k-11)/11)]; ?>').style.display='none'; document.getElementById('<?php echo $contador[(($k-11)/11)+1]; ?>').style.display='inline'; " />
                </div>
            </div>
            <div id="<?php echo $contador[(($k-11)/11)+1]; ?>" style="display: none;" >
                <h4>Pagina <?php echo (($k-11)/11)+2; ?></h4>
                <table border="1" width="100%" style="text-align:center;" >
                    <tr>
                        <td>Fecha</td>
                        <td colspan="2">Turno Mañana</td>
                        <td colspan="2">Turno Tarde</td>
                        <td>Notas</td>
                    </tr>
            <?php endif; ?>
                    <tr>
                        <td><?php echo fecha_es2in($asistencias[$j]->getFecha()); ?></td>
                        <td><?php echo substr($asistencias[$j]->getHoraEntrada(),0,5).' '.$asistencias[$j]->getMHoraEntrada(); ?></td>
                        <td><?php echo substr($asistencias[$j]->getHoraSalida(),0,5).' '.$asistencias[$j]->getMHoraSalida(); ?></td>
                        <?php if($asistencias[$j+1] == null): $fechaSiguiente=''; else: $fechaSiguiente = $asistencias[$j+1]->getFecha(); endif ?>
                        <?php if($asistencias[$j]->getFecha()==$fechaSiguiente): ?>
                            <td><?php echo substr($asistencias[$j+1]->getHoraEntrada(),0,5).' '.$asistencias[$j]->getMHoraEntrada(); ?></td>
                            <td><?php echo substr($asistencias[$j+1]->getHoraSalida(),0,5).' '.$asistencias[$j]->getMHoraSalida(); ?></td>
                        <?php $j++; else: ?>
                            <td>--:--</td><td>--:--</td>
                        <?php endif; ?>
                        <?php if($asistencias[$j]->getNota()==null): ?>
                            <td><a href="#">NO</a></td>
                        <?php else:?>
                            <td><a href="#">SI</a></td>
                        <?php endif; ?>
                    </tr>
                    <?php $k++; ?>
                    <?php endfor; ?>
                </table>
                <div style="float:right;"><?php if($count!=-5): ?><input id="<?php echo $count; ?>" type="button" value="Atras" onclick="document.getElementById('<?php echo $contador[$count+1]; ?>').style.display='none';document.getElementById('<?php echo $contador[($count)]; ?>').style.display='inline';" /><?php endif; ?></div>
            </div>
            <div style="float:left;">
            <input type="button" value="Imprimir" onClick="window.location='imprimirAsistencia.php?Cedula=<?php echo $cedula;?>&fecha1=<?php echo $fecha1;?>&fecha2=<?php echo $fecha2;?>';" />
            <input type="button" title="Boton para ir Atras a la pantalla inicial del sistema de control de asistencia" value="Cancelar" onClick="self.location.href='asistenciaEmpleado.php'" />
            </div>
</div>
                
</div>
<?php
include('menuAdministracion.php');
include('foot.html');
?>