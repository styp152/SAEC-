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
<script type="text/javascript" src="js/autocompletar_articulo.js"></script>
<script type="text/javascript" src="js/autocompletar_articulos.js"></script>
<h2>Crear Factura</h2>
<div id="crear">
  <form name="form" action="crearFacturaFormExecute.php" method="post"
      title="Permite Crear una Factura" onsubmit="return validarVacio(this);">
    <fieldset id="factura" >
      <legend align="center">Datos del Cliente</legend>
      <br />
      <label for="Nombre">Nombre: </label><input type="text" id="Nombre"
        name="Nombre" onfocus="limpiar(this);" size="40" value="<?php echo $cliente->getNombre();?>" />
      <br /><br />
      <label for="Cedula">Cedula: </label><input type="text" id="Cedula" name="Cedula"
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
    </fieldset>
    <fieldset>
        <legend align="center">Datos del Pedido</legend>
        <label for="productos">Productos</label>
        <br />
        <table id="table" >
            <tr class="first">
                <td>Cantidad </td>
                <td>Nombre </td>
                <td>Precio Unitario </td>
                <td>Total </td>
            </tr>
            <tr id="1" >
                <td><input type="text" id="cantidad" style="width:24px;"
                  name="cantidad" value="0" size="1"
                  onkeypress="return permite(event , 'num');"</td></td>
                <td>
                  <label for="Nombre">Nombre: </label><input type="text" id="NombreP"
                    name="NombreP" autocomplete="off" onfocus="limpiar(this);" size="21" />
                  <div id="sugerencias" class="autocomplete"></div>
                </td>
                <td><label for="Precio">Precio: </label><input type="text" id="Precio" style="width:24px;"
                    name="Precio" autocomplete="off" onfocus="limpiar(this);" size="1" /></td>
                <td>100 </td>
            </tr>
        </table>
        <input type="button" value="Agregar" onclick="
          var x=document.getElementById('table').insertRow(2);
          var v=x.insertCell(0);
          var y=x.insertCell(1);
          var z=x.insertCell(2);
          var a=x.insertCell(3);
          v.innerHTML=document.getElementById('cantidad').value;
          y.innerHTML=document.getElementById('NombreP').value;
          document.getElementById('NombreP').value='';
          z.innerHTML=document.getElementById('Precio').value;
          a.innerHTML=document.getElementById('Precio').value * document.getElementById('cantidad').value;
          document.getElementById('Precio').value='';
          document.getElementById('cantidad').value='';" />
        <!-- TODO: Codificar los productos y boton agregar  -->
        <br />
        <label for="detalles">Detalles de Diseño y Produccion </label><br /><textarea id="detalles" name="detalles" cols="60" rows="5" onfocus="limpiar(this); limpiarT(this);">
        Aqui se agregan los detalles del pedido.
        </textarea>
        <br />
        <label for="fecha_entrega">Fecha de Entrega: </label><input type="text" id="fecha_entrega" name="fecha_entrega" class="for_txtInputFecha" onfocus="limpiar(this);" size="9" value="" tabindex="2"  /> <!--Aqui debe ir readonly="readonly", se lo quite para poder probar algunas cosas TODO -->
        <img class="for_imgFecha" id="Imgfecha_entrega" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
        <script type="text/javascript">
            Calendar.setup({inputField:"fecha_entrega", button:"Imgfecha_entrega"});
            Calendar.setup({inputField:"fecha_entrega", eventName: "click", button:"Imgfecha_entrega"});
        </script>
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

