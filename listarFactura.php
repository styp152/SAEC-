<?php
include('session.php');
include('head.html');
include('menu.php');
include('libreria.php');
$size= count($facturas);
$n_div = countPage($size);
?>
<h2>Lista de Facturas</h2>
<br />
<?php for($i=0;$i<$n_div;$i++):?>
<div id="<?php echo $i; ?>" style="<?php if($i!=0){ echo 'display:none;';} ?>" >
  <table>
    <tr class="first">
      <td>Codigo </td>
      <td>Cedula Cliente </td>
      <td>Cedula Vendedor </td>
      <td>Fecha Registro </td> 
      <td>Fecha Entrega </td>
      <td>Estatus </td>
    </tr>
    </tr>
    <?php for($j=($i*10);$j<($i+1)*10;$j++):?>
      <tr>
        <td><?php echo $facturas[$j]->getCodigo(); ?></td>
        <td><?php echo $facturas[$j]->getCedulaCliente(); ?></td>
        <td><?php echo $facturas[$j]->getCedulaVendedor(); ?></td>
        <td><?php echo $facturas[$j]->getFechaRegistro(); ?></td>
        <td><?php echo $facturas[$j]->getFechaEntrega(); ?></td>
        <td><?php echo $facturas[$j]->getEstado(); ?></td>
      </tr>
      <?php if($j+1>=$size){break;}?>
    <?php endfor;?>
  </table>
  <?php if($i+1<$n_div):?><input type="button" name="Siguiente" value="Siguiente"
  onclick="document.getElementById('<?php echo $i+1; ?>').style.display='inline';
  document.getElementById('<?php echo $i; ?>').style.display='none';" />
  <?php endif;?>
  <?php if($i!=0):?><input type="button" name="Atras" value="Atras"
  onclick="document.getElementById('<?php echo $i-1; ?>').style.display='inline';
  document.getElementById('<?php echo $i; ?>').style.display='none';" />
  <?php endif;?>
</div>
<?php endfor;?>
</div>
<?php
include("menuInventario.php");
include("foot.html");
?>
?>