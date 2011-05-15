<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Editar Articulo del Inventario</h2>
<div id="editar">
  <form name="form" action="editarArticuloShowExecute.php" method="post" title="Permite Editar Nuevos Articulos al Inventario" onsubmit="return validarVacio(this);">
    <fieldset id="articulo" >
      <legend>Datos del Articulo</legend>
      <br />
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" onfocus="limpiar(this);" value="Taza" />
      <label for="cantidad">Cantidad</label><input type="text" id="cantidad" name="cantidad" size="4" onkeypress="return permite(event , 'num')" onfocus="limpiar(this);" value="25"/>
      <label for="precio">Precio Unitario </label><input type="text" id="precio" name="precio" size="4" onkeypress="return permite(event , 'num');" onfocus="limpiar(this);" value="50" />Bsf
      <br />
      <label for="descripcion">Descripcion: </label><br /><textarea id="descripcion" name="descripcion" cols="60" rows="5" limpiarT(this);">Tazas Termicas que se revelan con el calor
      </textarea>
      <br /><br />
      <input type="submit" value="Actualizar" />
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