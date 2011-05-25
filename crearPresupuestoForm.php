<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<link href="css/calendario.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar-es.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>
<script type="text/javascript" src="js/validacion.js"></script>
<h2>Crear Presupuesto</h2>
<div id="crear">
  <form name="form" action="crearPresupuestoFormExecute.php" method="post"
      title="Permite Crear un Presupuesto" onsubmit="return validarVacio(this);">
    <fieldset id="factura" >
      <legend align="center">Datos del Cliente</legend>
      <br />
      <label for="Nombre">Nombre: </label><input type="text" id="Nombre" name="Nombre"
        onfocus="limpiar(this);" size="40" value="<?php echo $cliente->getNombre();?>" />
      <br /><br />
      <label for="Cedula">Cedula: </label><input type="text" id="Cedula" name="Cedula"
        onfocus="limpiar(this);" size="9" value="<?php echo $cedula;?>" readonly="true" />
      <label for="Telefono">Telefono: </label><input type="text" id="Telefono" name="Telefono"
        onfocus="limpiar(this);" size="7" value="<?php echo $cliente->getTelefono();?>" />
      <br /><br />
      <label for="Direccion">Direccion: </label><input type="text" id="Direccion"
        name="Direccion" onfocus="limpiar(this);" size="40" value="<?php echo $cliente->getDireccion();?>" />
      <br /><br />
      <label for="Correo">Email: </label><input type="text" id="Correo" name="Correo"
        onfocus="limpiar(this);" size="40" value="<?php echo $cliente->getCorreo();?>" />
      <br />
      <br />
    </fieldset>
    <fieldset>
        <legend align="center">Datos del Pedido</legend>
        <label for="productos">Productos</label>
        <br />
        <table>
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
        <input type="button" value="Agregar" />
        <!-- TODO: Codificar los productos y boton agregar  -->
        <br />
        <label for="vendedor">Detalles de Diseño y Produccion </label><br /><textarea id="detalles" name="detalles" cols="60" rows="5" onfocus="limpiar(this); limpiarT(this);">
        Aqui se agregan los detalles del pedido.
        </textarea>
        <br />
        <br />
        <input type="submit" value="Facturar" />
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