<?php
include('session.php');
include('head.html');
include('menu.php');
include('libreria.php');
include('db/searchs.php');
conectarDB();
$monto = buscarMontoCC(DATE('Y-m-d'));
?>
<h2>Caja Chica del Dia</h2>
<form action="asignarCCExecute.php" method="post" title="Formulario de Registro de Gastos" onsubmit="return validarVacio(this);" >
  <fieldset id="empleado" >
    <legend>Monto de la Caja Chica del Día</legend>
    <br />
    <label for="Monto">Monto:</label><input type="text" id="Monto" name="Monto"
          onkeypress="return permite(event , 'num')" value="<?php echo $monto;?>" />
    <br />
    <br />
    <input type="submit" value="Guardar" />
    <input type="button" value="Cancelar" onclick="window.location='administracion.php'" />
    <br />
    <br />
  </fieldset>
</form>
</div>
<?php
include('menuAdministracion.php');
include('foot.html');
?>