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
      <label for="Telefono">Telefono: </label><input type="text" id="Telefono" onkeypress="return permite(event , 'num')"
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
        <label for="productos">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              Productos</label>
        <input type="button" value="Borrar Todos" onclick="removeall();" style="float:right;" />
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
                name="cantidad" value="0" size="1" onfocus="limpiar(this);"
                onkeypress="return permite(event , 'num');"</td></td>
              <td>
                <label for="Nombre">Nombre: </label><input type="text" id="NombreP"
                name="NombreP" autocomplete="off" onfocus="limpiar(this);" size="21" />
                <div id="sugerencias" class="autocomplete"></div>
              </td>
              <td><label for="Precio">Precio: </label><input type="text" id="Precio" style="width:24px;"
                  name="Precio" autocomplete="off" onfocus="limpiar(this);" size="1" value="0" /></td>
              <td><input type="button" value="Agregar" onclick="agregar();" />
              </td>
            </tr>
        </table>
        </table>
        <table align="right" style="width:30%;">
          <tr>
            <td class="bold">Total</td>
            <td id="total" class="bold">0</td>
          </tr>
          <tr>
            <td>Abono</td>
            <td class="bold"><input type="text" id="abono" style="width:34px;"
              name="abono" autocomplete="off" onfocus="limpiar(this);" size="1"
              onblur="abonar(this);" value="0" title="El minimo del abono es de 20%"
              onkeypress="return permite(event , 'num');" /></td>
          </tr>
          <tr>
            <td class="bold">Resta</td>
            <td id="resta" class="bold">0</td>
          </tr>
        </table>
        <br />
        <br />
        <br />
        <br />
        <br />
        <label for="Detalles">Detalles de Diseño y Produccion </label><br />
        <textarea id="Detalles" name="Detalles" cols="60" rows="5" onfocus="limpiar(this);
        limpiarT(this);">Aqui se agregan los detalles del pedido.</textarea>
        <br />
        <br />
        <label for="Tipo_Pago">Tipo de Pago</label>
        <select id="Tipo_Pago" name="Tipo_Pago" onchange="validarNTipoEnvio(this);" onfocus="limpiarS(this);" >
					<option value="" > - - </option>
					<option >Efectivo</option>      							
					<option >Deposito</option>
					<option >Transferencia</option>
					<option >Cheque</option>
				</select>
        <label for="NTipo_Pago">Numero: </label><input type="text" id="NTipo_Pago"
        name="NTipo_Pago" onfocus="limpiar(this);" size="10" disabled="disabled" />
        <br />
        <label for="Fecha_Entrega">Fecha de Entrega: </label><input type="text" id="Fecha_Entrega"
          name="Fecha_Entrega" class="for_txtInputFecha" onfocus="limpiar(this);" size="9"
          value="" tabindex="2" readonly="readonly"  />
        <img class="for_imgFecha" id="ImgFecha_Entrega" src="calendario/calendario.png"
             title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
        <script type="text/javascript">
            Calendar.setup({inputField:"Fecha_Entrega", button:"ImgFecha_Entrega"});
            Calendar.setup({inputField:"Fecha_Entrega", eventName: "click", button:"ImgFecha_Entrega"});
        </script>
        <br />
        <br />
        <input type="submit" value="Facturar" onclick="clickEnviar();" />
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

