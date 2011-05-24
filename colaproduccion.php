<?php
include('session.php');
include("head.html");
include("menu.php");
?>
<script type="text/javascript" src="js/validacion.js"></script>
<h2>Cola de Produccion</h2>
<table id="tabla" >
  <tr class="first">
    <td>N° de Factura</td>
    <td>Cliente</td>
    <td>Cantidad de Productos</td> 
    <td>Fecha de Entrega</td>
    <td>Detalles</td>
    <td>Seleccionar</td>
  </tr>
  <tr id="1" >
    <td>345212</td>
    <td>Pedro Perez</td>
    <td>5</td>
    <td>25/05</td>
    <td><input type="button" name="ver" value="Ver" onclick="location.href='detallesProduccion.php';" /></td>
    <td><input type="button" name="ver" value="Listo" onclick="document.getElementById('tabla').deleteRow(this.parentNode.parentNode.id);" /></td>
  </tr> 
  <tr id="2">
    <td>231232</td>
    <td>Margarita Martinez</td>
    <td>50</td>
    <td>01/06</td>
    <td><input type="button" name="ver" value="Ver" onclick="location.href='detallesProduccion.php';" /></td>
    <td><input type="button" name="ver" value="Listo" onclick="document.getElementById('tabla').deleteRow(this.parentNode.parentNode.id);" /></td>
  </tr> 
  <tr id="3">
    <td>23423443</td>
    <td>Petronila Rodriguez</td>
    <td>24</td>
    <td>05/06</td>
    <td><input type="button" name="ver" value="Ver" onclick="location.href='detallesProduccion.php';" /></td>
    <td><input type="button" name="ver" value="Listo" onclick="document.getElementById('tabla').deleteRow(this.parentNode.parentNode.id);" /></td>
  </tr>
  <tr id="4" >
    <td>123123123</td>
    <td>Josefina Vergara</td>
    <td>20</td>
    <td>12/06</td>
    <td><input type="button" name="ver" value="Ver" onclick="location.href='detallesProduccion.php';" /></td>
    <td><input type="button" name="ver" value="Listo" onclick="document.getElementById('tabla').deleteRow(this.parentNode.parentNode.id);" /></td>
  </tr>
</table>
</div>
<?php
include("menuAdministracion.php");
include("foot.html");
?>