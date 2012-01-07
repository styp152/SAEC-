<div id="menu">
    <ul>
        <li><a href="index.php"><span>Inicio</span></a></li>
        <?php $log=$_SESSION['log']; if($log == "1"): ?>
            <li><a href="facturacion.php"><span>Facturacion</span></a></li>
            <li><a href="inventario.php"><span>Inventario</span></a></li>
            <li><a href="administracion.php"><span>Administracion</span></a></li>
            <li><a href="reportes.php"><span>Reportes</span></a></li>
            <li><a href="colaproduccion.php"><span>Cola de Producción</span></a></li>
            <li><a href="cerrarSession.php"><span>Salir</span></a></li>
        <?php endif; ?>
    </ul>
</div>
<div id="content"> 
  <div class="right">