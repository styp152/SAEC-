<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Crear Presupuesto</h2>
<div id="crear">
  <form name="form" action="crearPresupuestoExecute.php" method="post" title="Permite Crear una Factura" onsubmit="return validarVacio(this);">
    <fieldset id="factura" >
      <legend align="center">Buscar Cliente para Crear un Presupuesto</legend>
      <br />
      <label for="cedula">Cedula o RIF: </label><input type="text" id="Nacionalidad" name="Nacionalidad" onfocus="limpiar(this);" size="1" onkeypress="return permite(event , 'car')" />
<input type="text" id="Cedula" name="Cedula" onfocus="limpiar(this);" size="9" onkeypress="return permite(event , 'num')" />
      <br /><br />
      <input type="submit" value="Buscar" />
      <input type="button" value="Cancelar" onclick="ir('facturacion.php');" />
      <br />
    </fieldset>
  </form>
</div>
</div>
<?php
include('menuFacturacion.php');
include('foot.html');
?>