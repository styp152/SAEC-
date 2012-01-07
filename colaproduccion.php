<?php
include('session.php');
include('libreria.php');
include('clases/Factura.php');
include('clases/Cliente.php');
include('db/searchs.php');
include("head.html");
include("menu.php");
conectarDB();
$facturas = buscarFacturasProduccion();
$size = count($facturas);
?>
<script type="text/javascript" src="js/validacion.js"></script>
<h2>Cola de Produccion</h2>
<table id="tabla" >
  <tr class="first">
    <td>N° de Factura</td>
    <td>Cliente</td>
    <td>Fecha de Registro</td>
    <td>Fecha de Entrega</td>
    <td>Detalles</td>
    <td>Seleccionar</td>
  </tr>
  <?php for($i=0;$i<$size;$i++): ?>
  <tr>
    <td>OP-00<?php echo $facturas[$i]->getCodigo();?></td>
    <?php
      $cliente = new Cliente();
      $cliente->setCedula($facturas[$i]->getCedulaCliente());
      $clienteDB = buscarClientePorCedula($cliente);
    ?>
    <td><?php echo $clienteDB->getNombre();?></td>
    <td><?php echo fecha_es2in($facturas[$i]->getFechaRegistro());?></td>
    <td><?php echo fecha_es2in($facturas[$i]->getFechaEntrega());?></td>
    <td><input type="button" value="Ver" onclick="ir('verFactura.php?codigo=<?php echo $facturas[$i]->getCodigo();?>');" /></td>
    <td><input type="button" value="Listo" onclick="if(confirm('Esta Seguro que Desea Marcar la Orden como Lista?')){ir('productosListos.php?Codigo=<?php echo $facturas[$i]->getCodigo();?>');}" /></td>
  </tr>
  <?php endfor; ?>
</table>
</div>
<?php
include("menuAdministracion.php");
include("foot.html");
?>