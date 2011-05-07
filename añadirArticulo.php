<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Añadir Articulo al Inventario</h2>
<div id="añadir">
  <form name="form" action="añadirArticuloExecute.php" method="post" title="Permite Añadir Nuevos Articulos al Inventario" onsubmit="return validarVacio(this);">
    <fieldset id="articulo" >
      <legend>Datos del Articulo</legend>
      <br />
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" onfocus="limpiar(this);" />
      <label for="cantidad">Cantidad</label><input type="text" id="cantidad" name="cantidad" size="4" onkeypress="return permite(event , 'num')" onfocus="limpiar(this);" />
      <label for="precio">Precio Unitario </label><input type="text" id="precio" name="precio" size="4" onkeypress="return permite(event , 'num');" onfocus="limpiar(this);" />Bsf
      <br />
      <label for="descripcion">Descripcion: </label><br /><textarea id="descripcion" name="descripcion" cols="60" rows="5" onfocus="limpiar(this); limpiarT(this);">
      Aqui Agregar una Pequeña Descripcion del Articulo
      </textarea>
      <br />
    </fieldset>
    <input type="submit" value="Ingresar" />
    <input type="reset" value="Borrar" /><br /> <!-- Cambiar por el Boton Cancelar TODO -->
  </form>
</div>
</div>
<?php
include("menuInventario.html");
include("foot.html");
?>