<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Editar Empleado</h2>
<div id="editar">
  <form name="form" action="editarEmpleadoExecute.php" method="post" title="Permite Editar Empleados del Sistema" onsubmit="return validarVacio(this);">
    <fieldset id="empleado" >
      <legend>Buscar Empleado a Editar</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="Cedula" name="Cedula" onfocus="limpiar(this);" onkeypress="return permite(event , 'num')" autocomplete="off" />
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
include('menuAdministracion.php');
include('foot.html');
?>