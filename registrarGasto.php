<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Registro de Gasto</h2>
<form action="registrarGastoExecute.php" method="post" title="Formulario de Registro de Gastos" onsubmit="return validarVacio(this);" >
  <fieldset id="empleado" >
    <legend>Datos del gasto</legend>
    <br />
    <label for="Monto">Monto:</label><input type="text" id="Monto" name="Monto" onkeypress="return permite(event , 'num')" />
    <br />
    <br />
    Descripción
    <br />
    <textarea id="Descripcion" name="Descripcion" cols="35" rows="3" onkeypress="return permite(event , 'num_car')" >
    </textarea>
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
