<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Registre su Asistencia</h2>
<br />
<br />
<div id="registro">
  <form action="registroAsistenciaEmpleadoExecute.php" method="post" title="Formularo de Ingreso"
    onsubmit="return validarVacio(this);">
    <label>Clave </label>
    <input type="password" title="Ingrese su Clave"
      onkeypress="return permite(event , 'num')" id="Clave" name="Clave" />
    <br />
    <input id="registrar" type="submit" value="Registrar" />
    <input type="reset" value="Limpiar"/>
  </form>
  <input type="button" value="Salir" onClick="ir('administracion.php');" />
</div>
</div>
<?php
include('menuAdministracion.php');
include('foot.html');
?>