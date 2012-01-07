<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<link href="css/calendario.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/validacion.js"></script>
<h2>Editar Cliente</h2>
<div id="crear">
  <form name="form" action="editarClienteFormExecute.php" method="post"
      title="Permite Crear una Factura" onsubmit="return validarVacio(this);">
    <fieldset id="factura" >
      <legend align="center">Datos del Cliente</legend>
      <br />
      <label for="Nombre">Nombre: </label><input type="text" id="Nombre"
        name="Nombre" onfocus="limpiar(this);" size="40" value="<?php echo $cliente->getNombre();?>" />
      <br /><br />
      <label for="Cedula">Cedula o RIF:</label><input type="text" id="Nacionalidad" name="Nacionalidad" onfocus="limpiar(this);" size="1" onkeypress="return permite(event , 'car')" value="<?php echo $n;?>" readonly="true" /><input type="text" id="Cedula" name="Cedula"
        onfocus="limpiar(this);" size="9" value="<?php echo $cedula;?>" readonly="true" />
      <label for="Telefono">Telefono: </label><input type="text" id="Telefono"
        name="Telefono" onfocus="limpiar(this);" size="10" value="<?php echo $cliente->getTelefono();?>" />
      <br /><br />
      <label for="Direccion">Direccion: </label><input type="text" id="Direccion"
        name="Direccion" onfocus="limpiar(this);" size="40" value="<?php echo $cliente->getDireccion();?>" />
      <br /><br />
      <label for="Correo">Email: </label><input type="text" id="Correo" name="Correo"
        onfocus="limpiar(this);" size="40" value="<?php echo $cliente->getCorreo();?>" />
      <br />
      <br />
    <input type="submit" value="Actualizar" onclick="clickEnviar();" />
    <input type="button" value="Cancelar" onclick="ir('facturacion.php');" />
    </fieldset>
  </form>  
</div>
</div>
<?php
include('menuAdministracion.php');
include('foot.html');
// debo poder incluir productos, con sus cantidades, y mostrar el precio unitario de ese producto, fecha de entrega, y un textarea, para Detalles de Diseño y Produccion
?>