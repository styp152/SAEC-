<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<script type="text/javascript" src="js/autocompletar_articulo.js"></script>
<h2>Eliminar Articulo del Inventario</h2>
<div id="eliminar">
  <form name="form" action="eliminarArticuloExecute.php" method="post" title="Permite Eliminar Articulos del Inventario" onsubmit="return validarVacio(this);">
    <fieldset id="articulo" >
      <legend align="center">Buscar Articulo a Eliminar</legend>
      <br />
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" onfocus="limpiar(this);" size="21" autocomplete="off" />
      <div id="sugerencias" class="autocomplete"></div>
      <br /><br />
      <input type="submit" value="Buscar" />
      <input type="button" value="Cancelar" onclick="ir('inventario.php');" />
      <br />
    </fieldset>
  </form>
</div>
</div>
<?php
include("menuInventario.html");
include("foot.html");
?>