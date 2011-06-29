<?php session_start();
header("Cache-Control: must-revalidate");
header("Expires: ".gmdate ("D, d M Y H:i:s", time() + 60*60*24*30)." GMT");
include('head.html');
include('menu.php');
?>

<?php $log=$_SESSION['log']; if($log != "1"): ?>
  <script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
  <div id="registro">
    <?php include("login.html"); ?>
  </div>
<?php else: ?>
  <script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
  <h2>Bienvenido a la Intranet del Estudio Creativo Mérida</h2>
  <h2>Registro de Asistencia</h2>
  <br />
  <br />
  <div id="registro">
    <form action="registroAsistenciaEmpleadoExecute.php" method="post" title="Formularo de Ingreso"
      onsubmit="return validarVacio(this);">
      <label>Clave </label>
      <input type="password" title="Ingrese su Clave"
        onkeypress="return permite(event , 'num')" id="Clave" name="Clave" />
      <br />
      <input id="registrar" type="submit" value="Registrar" />
      <input type="reset" value="Limpiar"/>
    </form>
  </div>
<?php endif; ?>
</div>
<div class="left"><ul><?php include('vendedor.php'); ?></ul></div>
<?php
include('foot.html');
?>
