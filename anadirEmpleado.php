<?php
include('session.php');
include("head.html");
include("menu.php");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Añadir Empleado</h2>
<div id="añadir">
  <form name="form" action="anadirEmpleadoExecute.php" method="post" title="Permite Añadir Nuevos Empleados al Sistema" onsubmit="return validarVacio(this);">
    <fieldset id="empleado" >
      <legend>Datos del Empleado</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="Cedula" name="Cedula" onfocus="limpiar(this);" size="9" onblur="validarEspaciosBlancos(this);" onkeypress="return permite(event , 'num')" />
      <br /><br />
      <label for="nombre">Nombre: </label><input type="text" id="Nombre" name="Nombre" onfocus="limpiar(this);" size="15" />
      <label for="nombre">Apellido: </label><input type="text" id="Apellido" name="Apellido" onfocus="limpiar(this);" size="15" />
      <br /><br />
      <label for="contrasena">Contraseña: </label><input type="password" id="Clave" name="Clave" onfocus="limpiar(this);" size="9" />
      <label for="contrasena">Confirmar Contraseña: </label><input type="password" id="ClaveConfirmacion" name="ClaveConfirmacion" onfocus="limpiar(this);" onchange="validarClaves(document.getElementById('Clave'),this);" size="9" />
      <br /><br />
      <label for="cargo">Cargo que desempeña: </label><input type="text" id="Cargo" name="Cargo" onfocus="limpiar(this);" size="20" />
      <label for="nivel">Nivel: </label><select name="Nivel" id="Nivel"><option value="2">Administrador</option><option value="1" selected="selected">Empleado</option></select>
      <br /><br />
      <label for="CostoHora">Costo de la Hora: </label><input type="text" id="CostoHora" name="CostoHora" size="10" onfocus="limpiar(this);"/>
      <br /><br />
      <label for="nivel">Aviso por Mensaje al Registrar en el Sistema: </label>Si<input type="radio" name="AvisoRegistro" value="1" id="AvisoRegistroS" />
      No<input type="radio" name="AvisoRegistro" value="0" id="AvisoRegistroN" />
      <br /><br />
      <input type="submit" value="Ingresar" />
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