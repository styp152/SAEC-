<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Eliminar Empleado</h2>
<div id="eliminar">
  <form name="form" action="eliminarEmpleadoExecute.php" method="post" title="Permite Eliminar Empleados del Sistema" onsubmit="return validarVacio(this);">
    <fieldset id="empleado" >
      <legend>Buscar Empleado a Eliminar</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" onfocus="limpiar(this);" onkeypress="return permite(event , 'num')" />
      <br />
      <br />
      <input type="submit" value="Buscar" />
      <input type="button" value="Cancelar" onclick="ir('administracion.php');" />
      <br />
    </fieldset>
  </form>
</div>
</div>
<?php
include("menuAdministracion.html");
include("foot.html");
?>