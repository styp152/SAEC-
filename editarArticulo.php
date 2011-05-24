<?php
include("head.html");
include("menu.php");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<script type="text/javascript" src="js/autocompletar_articulo.js"></script>
<h2>Editar Articulo del Inventario</h2>
<div id="editar">
  <form name="form" action="editarArticuloExecute.php" method="post" title="Permite Editar Articulos del Inventario" onsubmit="return validarVacio(this);">
    <fieldset id="articulo" >
      <legend align="center">Buscar Articulo a Editar</legend>
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