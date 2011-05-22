<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Crear Factura</h2>
<div id="crear">
  <form name="form" action="crearFacturaExecute.php" method="post" title="Permite Crear una Factura" onsubmit="return validarVacio(this);">
    <fieldset id="factura" >
      <legend align="center">Buscar Cliente para Crear una Factura</legend>
      <br />
      <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" onfocus="limpiar(this);" size="9" onkeypress="return permite(event , 'num')" />
      <br /><br />
      <input type="submit" value="Buscar" />
      <input type="button" value="Cancelar" onclick="ir('facturacion.php');" />
      <br />
    </fieldset>
  </form>
</div>
</div>
<?php
include("menuFacturacion.html");
include("foot.html");
?>