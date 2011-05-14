<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Editar Empleado</h2>
<div id="editar">
  <form name="form" action="editarEmpleadoShowExecute.php" method="post" title="Permite Editar Empleados del Sistema" onsubmit="return validarVacio(this);">
    <fieldset id="empleado" >
      <legend>Datos del Empleado</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" value="12345678" size="9" onfocus="limpiar(this);" onkeypress="return permite(event , 'num')" />
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" value="Pedro Perez" size="27" onfocus="limpiar(this);"/>
      <br />
      <label for="contrasena_actual">Contraseña Actual:</label><input type="password" id="contrasena_actual" name="contrasena_actual" onfocus="limpiar(this);" size="9" />
      <br />
      <label for="contrasena_nueva">Contraseña Nueva:</label><input type="password" id="contrasena_nueva" name="contrasena_nueva" onfocus="limpiar(this);" size="9" />
      <label for="confirmar_contrasena"> Confirmar Contraseña:</label><input type="password" id="confirmar_contrasena" name="confirmar_contrasena" onfocus="limpiar(this);" size="9" />
      <br />
      <label for="cargo">Cargo que desempeña: </label><input type="text" id="cargo" name="cargo" value="Vendedor" size="20" onfocus="limpiar(this);"/>
      <br /><br />
      <input type="submit" value="Actualizar" />
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