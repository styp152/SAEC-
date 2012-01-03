<div class="left">
  <h2>Administracion</h2>
  <ul>
    <?php if($_SESSION["Nivel"] == 2): ?>
      <li><a href="añadirEmpleado.php"><span>Añadir Empleado</span></a></li>
      <li><a href="editarEmpleado.php"><span>Editar Empleado</span></a></li>
      <li><a href="eliminarEmpleado.php"><span>Eliminar Empleado</span></a></li>
    <?php else: ?>
      <li><a href="editarEmpleadoExecute.php?Cedula='<?php echo $_SESSION['Cedula']; ?>'">
      <span>Editar Empleado</span></a></li>
    <?php endif ?>
    <li><a href="registroAsistenciaEmpleado.php"><span>Registro de Asistencia</span></a></li>
    <li><a href="asistenciaEmpleado.php"><span>Asistencia Empleado</span></a></li>
    <?php if($_SESSION["Nivel"] == 2): ?>
      <li><a href="colaproduccion.php"><span>Cola de Produccion</span></a></li>
      <li><a href="asignarCC.php"><span>Asignar Caja Chica del Día</span></a></li>
    <?php endif ?>
    
    <li><a href="registrarGasto.php"><span>Registro de Gasto</span></a></li>
    <?php include('vendedor.php'); ?>
  </ul>
</div>