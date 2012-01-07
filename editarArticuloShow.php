<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Editar Articulo del Inventario</h2>
<div id="editar">
  <form name="form" action="editarArticuloShowExecute.php" method="post"
    title="Permite Editar Nuevos Articulos al Inventario" onsubmit="return validarVacio(this);">
    <fieldset id="articulo" >
      <legend>Datos del Articulo</legend>
      <br />
      <input type="hidden" name="Id" value="<?php echo $articulo->getId();?>" />
      
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="Nombre"
        onfocus="limpiar(this);" onkeypress="return permite(event , 'num_car')"
        value="<?php echo $articulo->getNombre();?>" />
        
      <label for="cantidad">Cantidad</label><input type="text" id="cantidad"
        name="Cantidad" size="4" onkeypress="return permite(event , 'num')"
        onfocus="limpiar(this);" value="<?php echo $articulo->getCantidad();?>"/>
        
      <label for="precio">Precio Unitario </label><input type="text" id="precio"
        name="Precio" size="4" onkeypress="return permite(event , 'num');"
        onfocus="limpiar(this);" value="<?php echo $articulo->getPrecio();?>" />Bsf
        
      <br />
      <label for="descripcion">Descripcion: </label><br /><textarea id="descripcion"
        name="Descripcion" cols="60" rows="5" limpiarT(this);">
        <?php echo $articulo->getDescripcion();?>
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
include('menuInventario.php');
include('foot.html');
?>