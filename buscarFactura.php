<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Buscar Factura</h2>
<div id="buscar">
  <form name="form" action="buscarFacturaExecute.php" method="post" title="Permite Buscar una Factura" onsubmit="return validarVacio(this);">
    <fieldset id="buscar_codigo" >
        <legend align="center">Buscar por Codigo de Factura</legend>
        <br />
        <label for="codigo">Codigo: </label><input type="text" id="codigo" name="codigo" onfocus="limpiar(this);" size="9" onkeypress="return permite(event , 'num')" />
        <br /><br />
        <br />
    </fieldset>
    <fieldset id="buscar_cedula" >
        <legend align="center">Buscar por Cedula del Cliente</legend>
        <br />
        <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" onfocus="limpiar(this);" size="9" onkeypress="return permite(event , 'num')" />
        <br /><br />
        <br />
    </fieldset>
    <fieldset id="buscar_fecha" >
        <legend align="center">Buscar por Fecha </legend>
        <br />
        <label for="fecha">Fecha</label>
        <!--  TODO: Terminar de colocar la info de aqui    -->
        <br /><br />
        <br />
    </fieldset>
    <input type="submit" value="Buscar" />
    <input type="button" value="Cancelar" onclick="ir('facturacion.php');" />
  </form>
</div>
</div>
<?php
include("menuFacturacion.html");
include("foot.html");
?>