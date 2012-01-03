<div class="left">
  <h2>Reporte</h2>  
  <ul>
     <?php if($_SESSION["Nivel"] == 2): ?>
      <li><a href="reporteVentas.php"><span>Ventas</span></a></li>
      <li><a href="reporteAbonos.php"><span>Abonos</span></a></li>
      <li><a href="reporteGastos.php"><span>Gastos</span></a></li>
      <li><a href="reportePago.php"><span>Pago Empleados</span></a></li>
    <?php endif; ?>
    <?php include('vendedor.php'); ?>
  </ul>
</div>