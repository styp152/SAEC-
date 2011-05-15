<?php
include("head.html");
include("menu.html");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Buscar Articulo del Inventario</h2>
<div id="buscar">
    <fieldset id="articulo" >
    <legend>Datos del Articulo</legend>
    <br />
    <label for="nombre" class="bold">Nombre: </label><label for="nombre_texto">Taza</label>
    <br />
    <label for="cantidad" class="bold">Cantidad: </label><label for="cantidad_texto">25</label>
    <br />
    <label for="precio" class="bold">Precio Unitario: </label><label for="precio_texto">50</label>
    <br />
    <label for="descripcion" class="bold">Descripcion: </label><label for="descripcion_texto">Tazas Termicas que se revelan con el calor</label>
    <br /><br />
    <a href="editarArticuloExecute.php?nombre=Taza" class="linklikebutton"><input type="button" value="Editar" /></a>
    <a href="eliminarArticuloShowExecute.php?codigo=000" class="linklikebutton" ><input type="button" value="Eliminar" /></a>
    <!--    TODO: Preguntarle al usuario que realmente desea eliminar -->
    <input type="button" value="Cancelar" onclick="ir('inventario.php');" />
    <br />
    </fieldset>
</div>
</div>
<?php
include("menuInventario.html");
include("foot.html");
?>