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
      <label for="cedula">Cedula: </label><input type="text" id="Cedula" name="Cedula" onfocus="limpiar(this);" size="9" onblur="validarEspaciosBlancos(this);" />
      <br /><br />
      <label for="nombre">Nombre: </label><input type="text" id="Nombre" name="Nombre" onfocus="limpiar(this);" size="15" />
      <label for="nombre">Apellido: </label><input type="text" id="Apellido" name="Apellido" onfocus="limpiar(this);" size="15" />
      <br /><br />
      <label for="contrasena">Contraseña: </label><input type="password" id="Clave" name="Clave" onfocus="limpiar(this);" size="9" />
      <label for="contrasena">Confirmar Contraseña: </label><input type="password" id="ClaveConfirmacion" name="ClaveConfirmacion" onfocus="limpiar(this);" size="9" />
      <br /><br />
      <label for="cargo">Cargo que desempeña: </label><input type="text" id="Cargo" name="Cargo" onfocus="limpiar(this);" size="20" />
      <label for="nivel">Nivel: </label><select name="Nivel" id="Nivel"><option value="1">Administrador</option><option value="2" selected="selected">Empleado</option></select>
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