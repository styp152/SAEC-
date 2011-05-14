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
      <label for="cedula" class="bold">Cedula: </label><label for="cedula_texto">123456789</label>
      <br />
      <label for="nombre" class="bold">Nombre: </label><label for="nombre_texto">Pedro Perez</label>
      <br />
      <label for="cargo" class="bold">Cargo que desempeña: </label><label for="cargo_texto">Vendedor</label>
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