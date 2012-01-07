<?php
include('session.php');
include('libreria.php');
include('clases/Factura.php');
include('clases/Cliente.php');
include('db/searchs.php');
include("head.html");
include("menu.php");
conectarDB();
$facturas = buscarFacturasDisenio();
$size = count($facturas);
?>
<script type="text/javascript" src="js/validacion.js"></script>
<h2>Cola de Diseño</h2>
<table id="tabla" >
  <tr class="first">
    <td>N° de Factura</td>
    <td>Cliente</td>
    <td>Fecha de Registro</td>
    <td>Fecha de Entrega</td>
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
    <td>
        <img src="images/ver.png" height="16px" width="16px" alt="Ver Factura"
        onclick="ir('verFactura.php?codigo=<?=$facturas[$i]->getCodigo();?>');" />
        <img src="images/ok.png" height="16px" width="16px" alt="Listo el Diseño"
        onclick="if(confirm('Esta Seguro que Desea Marcar el Diseño de la Orden como Listo?')){
        ir('disenioListo.php?Codigo=<?php echo $facturas[$i]->getCodigo();?>');}" />
        <img src="images/sms.png" height="16px" width="16px" alt="Enviar SMS"
        onclick="text=sms();if(text!=0){ir('enviarSMS.php?Codigo=<?php
        echo $facturas[$i]->getCodigo();?>&text='+text);}" >
        <a href="mailto:<?=$clienteDB->getCorreo()?>">
          <img src="images/email.png" height="16px" width="16px" alt="Enviar Correo" />
        </a>
    </td>
  </tr>
  <?php endfor; ?>
</table>
</div>
<?php
include("menuAdministracion.php");
include("foot.html");
?>