<?php
include("head.html");
include("menu.php");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Añadir Empleado</h2>
<div id="añadir">
  <form name="form" action="añadirEmpleadoExecute.php" method="post" title="Permite Añadir Nuevos Empleados al Sistema" onsubmit="return validarVacio(this);">
    <fieldset id="empleado" >
      <legend>Datos del Empleado</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" onfocus="limpiar(this);" size="9" />
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" onfocus="limpiar(this);" size="26" />
      <br /><br />
      <label for="contrasena">Contraseña: </label><input type="password" id="contrasena" name="contrasena" onfocus="limpiar(this);" size="9" />
      <label for="contrasena">Confirmar Contraseña: </label><input type="password" id="confirmar_contrasena" name="confirmar_contrasena" onfocus="limpiar(this);" size="9" />
      <br /><br />
      <label for="cargo">Cargo que desempeña: </label><input type="text" id="cargo" name="cargo" onfocus="limpiar(this);" size="20" />
      <br /><br />
      <input type="submit" value="Ingresar" />
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