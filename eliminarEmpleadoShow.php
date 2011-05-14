<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Eliminar Empleado</h2>
<div id="eliminar">
  <form name="form" action="eliminarEmpleadoShowExecute.php" method="post" title="Permite Eliminar Empleados del Sistema" onsubmit="return validarVacio(this);">
    <fieldset id="empleado" >
      <legend>Datos del Empleado</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" value="12345678" readonly="true" size="9" />
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" value="Pedro Perez" readonly="true" size="27" />
      <br />
      <label for="cargo">Cargo que desempeña: </label><input type="text" id="cargo" name="cargo" value="Vendedor" readonly="true" size="20"/>
      <br /><br />
      <input type="submit" value="Eliminar" />
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