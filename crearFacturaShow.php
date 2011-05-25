<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<h2>Factura</h2>
<div id="factura">
    <fieldset id="factura" >
        <legend align="center">Datos del Cliente</legend>
        <br />
        <label for="fecha" class="bold">Fecha: </label><label for="fecha_texto">
            <?php echo @date("d-m-Y"); ?></label>
        <label for="cedula" class="bold">Cedula: </label><label
            for="cedula_texto"><?php echo $cliente->getCedula();?></label>
        <label for="nombre" class="bold">Nombre: </label><label for="nombre_texto">
            <?php echo $cliente->getNombre();?></label>
        <br />
        <label for="direccion" class="bold">Direccion: </label><label for="direccion_texto">
            <?php echo $cliente->getDireccion();?></label>
        <br />
        <label for="correo" class="bold">Correo Electronico: </label><label for="correo_text">
            <?php echo $cliente->getCorreo();?></label>
        <label for="telefono" class="bold">Telefono: </label><label for="telefono_texto">
            <?php echo $cliente->getTelefono();?></label>
    </fieldset>
    <fieldset>
        <legend>Datos del Pedido</legend>
        <br />
        <label for="vendedor" class="bold">Vendedor: </label><label for="vendedor_texto">Gabriel Albornoz</label>
        <label for="fecha_entrega" class="bold">Fecha de Entrega: </label><label for="fecha_entrega_texto"><?php echo @date("d-m-Y"); ?></label>
        <br />
        <label for="productos">Productos</label>
        <br />
        <table align="center">
            <tr class="first">
                <td>Cantidad </td>
                <td>Nombre </td>
                <td>Precio Unitario </td>
                <td>Total </td>
            </tr>
            <tr>
                <td>2 </td>
                <td>Tazas </td>
                <td>25 </td>
                <td>50 </td>
            </tr>
            <tr>
                <td>10</td>
                <td>Chapas </td>
                <td>10 </td>
                <td>100 </td>
            </tr>
        </table>
        <label for="detalles" class="bold">Detalles de Diseño y Produccion </label><br /><label for="detalles_texto">Aqui van los detalles del pedido.</label>
        <br /><br />
        <input type="button" value="Imprimir" /></a>
        <input type="button" value="Editar" /></a>
        <input type="button" value="Cancelar" onclick="ir('facturacion.php');" />
    </fieldset>
  </form>
</div>
</div>
<?php
include('menuFacturacion.php');
include('foot.html');
// debo poder incluir productos, con sus cantidades, y mostrar el precio unitario de ese producto, fecha de entrega, y un textarea, para Detalles de Diseño y Produccion
?>

