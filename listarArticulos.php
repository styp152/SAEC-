<?php
include('head.html');
include('menu.html');
include('libreria.php');
require_once('clases/Articulo.php');
include('db/searchs.php');
conectarDB();
$articulos=buscarArticulos();
$size= count($articulos);
$n_div = countPage($size);
?>
<h2>Lista de Articulos en el Inventario</h2>
<br />
<?php for($i=0;$i<$n_div;$i++):?>
<div id="<?php echo $i; ?>" style="<?php if($i!=0){ echo 'display:none;';} ?>" >
  <table>
    <tr class="first">
      <td>Codigo </td>
      <td>Nombre </td>
      <td>Descripcion </td>
      <td>Cantidad </td> 
      <td>Precio Unitario Bsf</td>
    </tr>
    <?php for($j=($i*10);$j<($i+1)*10;$j++):?>
      <tr>
        <td><?php echo $articulos[$j]->getId(); ?></td>
        <td><?php echo $articulos[$j]->getNombre(); ?></td>
        <td><?php echo $articulos[$j]->getDescripcion(); ?></td>
        <td><?php echo $articulos[$j]->getCantidad(); ?></td>
        <td><?php echo $articulos[$j]->getPrecio(); ?></td>
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
<!--Paginar la Lista de Articulos TODO-->
<?php
include("menuInventario.html");
include("foot.html");
?>