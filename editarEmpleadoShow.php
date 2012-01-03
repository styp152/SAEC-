<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Editar Empleado</h2>
<div id="editar">
  <form name="form" action="editarEmpleadoShowExecute.php" method="post" title="Permite Editar Empleados del Sistema" onsubmit="return validarVacio(this);">
    <fieldset id="empleado" >
      <legend>Datos del Empleado</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="Cedula" name="Cedula" value="<?php echo $vendedor->getCedula();?>" size="9" onfocus="limpiar(this);" readonly="readonly" />
      <br />
      <label for="nombre">Nombre: </label><input type="text" id="Nombre" name="Nombre" value="<?php echo $vendedor->getNombre();?>" size="15" onfocus="limpiar(this);"/>
      <label for="nombre">Apellido: </label><input type="text" id="Apellido" name="Apellido" value="<?php echo $vendedor->getApellido();?>" size="15" onfocus="limpiar(this);"/>
      <br />
      <!-- TODO: Esto no debe mostrarse a los administradores      -->
      <?php if($_SESSION["Nivel"] != 2): ?>
      <label for="clave_actual">Contraseña Actual:</label><input type="password" id="ClaveActual" name="ClaveActual" onfocus="limpiar(this);" size="9" />
      <br />
      <!--El id tiene un _ al empezar para indicar que no es campo oblicagorio -->
      <label for="clave_nueva">Contraseña Nueva:</label><input type="password" id="_ClaveNueva" name="_ClaveNueva" onfocus="limpiar(this);" size="9" />
      <label for="clave_confirmar">Confirmar Contraseña:</label><input type="password" id="_ClaveConfirmar" name="_ClaveConfirmar" onfocus="limpiar(this);" size="9" onchange="validarClaves(document.getElementById('_ClaveNueva'),this);" />
      <br />
      <?php endif ?>
      <label for="cargo">Cargo que desempeña: </label><input type="text" id="Cargo" name="Cargo" value="<?php echo $vendedor->getCargo();?>" size="20" onfocus="limpiar(this);"/>
      <!-- TODO: Esto solo debe mostrarse a los empleados que son administradores      -->
      <?php if($_SESSION["Nivel"] == 2): ?>
      <label for="nivel">Nivel: </label>
      <select name="Nivel" id="Nivel">
        <?php if($vendedor->getNivel() == 2): ?>
          <option value="2" selected="selected">Administrador</option>
          <option value="1">Empleado</option>
        <?php else: ?>
          <option value="2">Administrador</option>
          <option value="1" selected="selected">Empleado</option>
        <?php endif ?>
      </select>
      <br /><br />
      <label for="nivel">Aviso por Mensaje al Registrar en el Sistema: </label>Si<input type="radio" name="AvisoRegistro" <?php if($vendedor->getAvisoRegistro()==1){?>checked="checked"<?php }?> value="1" id="AvisoRegistroS" />
      No<input type="radio" name="AvisoRegistro" value="0" <?php if($vendedor->getAvisoRegistro()==0){?>checked="checked"<?php }?>  id="AvisoRegistroN" />
      <?php else: ?>
        <input type="hidden" id="Nivel" name="Nivel" value="<?php echo $vendedor->getNivel(); ?>" />
      <?php endif ?>
      <input type="hidden" id="Clave" name="Clave" value="<?php echo $vendedor->getClave(); ?>" />
      <br /><br />
      <input type="submit" value="Actualizar" />
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