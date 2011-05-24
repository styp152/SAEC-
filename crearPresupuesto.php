<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Crear Factura</h2>
<div id="crear">
  <form name="form" action="crearPresupuestoExecute.php" method="post" title="Permite Crear una Factura" onsubmit="return validarVacio(this);">
    <fieldset id="factura" >
      <legend align="center">Buscar Cliente para Crear un Presupuesto</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="Cedula" name="Cedula" onfocus="limpiar(this);" size="9" onkeypress="return permite(event , 'num')" />
      <br /><br />
      <input type="submit" value="Buscar" />
      <input type="button" value="Cancelar" onclick="ir('facturacion.php');" />
      <br />
    </fieldset>
  </form>
</div>
</div>
<?php
include('menuFacturacion.html');
include('foot.html');
?>