<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Eliminar Empleado</h2>
<div id="eliminar">
  <form name="form" action="eliminarEmpleadoShowExecute.php" method="post" title="Permite Eliminar Empleados del Sistema"
        onsubmit="return confirm('Esta Seguro de Eliminar el Empleado:\n <?php echo $vendedor->getNombre();?>');">
    <fieldset id="empleado" >
      <legend>Datos del Empleado</legend>
      <br />
      <label for="cedula" class="bold">Cedula: </label><label for="cedula_texto"><?php echo $vendedor->getCedula(); ?></label>
      <br />
      <label for="nombre" class="bold">Nombre: </label><label for="nombre_texto"><?php echo $vendedor->getNombre(); ?></label>
      <br />
      <label for="cargo" class="bold">Cargo que desempeña: </label><label for="cargo_texto"><?php echo $vendedor->getCargo(); ?></label>
      <br /><br />
      <input type="hidden" value="<?php echo $vendedor->getCedula();?>" name="Cedula" />
      <input type="submit" value="Eliminar" />
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