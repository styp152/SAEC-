<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Eliminar Articulo del Inventario</h2>
<div id="eliminar">
  <form name="form" action="eliminarArticuloShowExecute.php" method="post" title="Permite Eliminar Articulos del Inventario" onsubmit="return validarVacio(this);">
    <fieldset id="articulo" >
      <legend>Datos del Articulo</legend>
      <br />
      <label for="nombre" class="bold">Nombre: </label><label for="nombre_texto">Tazas</label>
      <br />
      <label for="cantidad" class="bold">Cantidad: </label><label for="cantidad_texto">3</label>
      <br />
      <label for="descripcion" class="bold">Descripcion: </label><label for="descripcion_texto">Tazas Termicas que se revelan con el calor</label>
      <br /><br />
      <input type="submit" value="Eliminar" />
      <input type="button" value="Cancelar" onclick="ir('inventario.php');" />
      <br />
      <input type="hidden" value="000" name="codigo" />
    </fieldset>
  </form>
</div>
</div>
<?php
include("menuInventario.html");
include("foot.html");
?>