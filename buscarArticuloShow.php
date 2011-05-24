<?php
include("head.html");
include("menu.php");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Buscar Articulo del Inventario</h2>
<div id="buscar">
    <fieldset id="articulo" >
    <legend>Datos del Articulo</legend>
    <br />
    <label for="nombre" class="bold">Nombre: </label>
    <label for="nombre_texto"><?php echo $articulo->getNombre();?></label>
    <br />
    <label for="cantidad" class="bold">Cantidad: </label>
    <label for="cantidad_texto"><?php echo $articulo->getCantidad();?></label>
    <br />
    <label for="precio" class="bold">Precio Unitario: </label>
    <label for="precio_texto"><?php echo $articulo->getPrecio();?></label>
    <br />
    <label for="descripcion" class="bold">Descripcion: </label>
    <label for="descripcion_texto"><?php echo $articulo->getDescripcion();?></label>
    <br /><br />
    <a href="editarArticuloExecute.php?nombre=<?php echo $articulo->getNombre();?>"
        class="linklikebutton"><input type="button" value="Editar" /></a>
    <form name="form" action="eliminarArticuloShowExecute.php" method="post"
        title="Permite Eliminar Articulos del Inventario"
        onsubmit="return confirm('Esta Seguro de Eliminar el Articulo:\n <?php echo $articulo->getNombre();?>');">
        <input type="hidden" name="Id" value="<?php echo $articulo->getId();?>" />
        <input type="submit" value="Eliminar" />
    </form>
    <input type="button" value="Cancelar" onclick="ir('inventario.php');" />
    <br />
    </fieldset>
</div>
</div>
<?php
include("menuInventario.html");
include("foot.html");
?>