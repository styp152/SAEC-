<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Eliminar Articulo del Inventario</h2>
<div id="eliminar">
  <form name="form" action="eliminarArticuloShowExecute.php" method="post"
    title="Permite Eliminar Articulos del Inventario"
    onsubmit="return confirm('Esta Seguro de Eliminar el Articulo:\n <?php echo $articulo->getNombre();?>');">
    <fieldset id="articulo" >
      <legend>Datos del Articulo</legend>
      <br />
      <input type="hidden" value="<?php echo $articulo->getId();?>" name="Id" />
      
      <label for="nombre" class="bold">Nombre: </label>
      <label for="nombre_texto"><?php echo $articulo->getNombre();?></label>
      <br />
      <label for="cantidad" class="bold">Cantidad: </label>
      <label for="cantidad_texto"><?php echo $articulo->getCantidad();?></label>
      <br />
      <label for="descripcion" class="bold">Descripcion: </label>
      <label for="descripcion_texto"><?php echo $articulo->getDescripcion();?></label>
      <br /><br />
      <input type="submit" value="Eliminar" />
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