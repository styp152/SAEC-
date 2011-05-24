<?php session_start();
header("Cache-Control: must-revalidate");
header("Expires: ".gmdate ("D, d M Y H:i:s", time() + 60*60*24*30)." GMT");
include('head.html');
include('menu.php');
?>

<?php $log=$_SESSION['log']; if($log == "1"): ?>
  <script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
  <?php include("login.html"); ?>
<?php else: ?>
  <h2>Bienvenido a la Intranet del Estudio Creativo Mérida</h2>
<?php endif; ?>
</div>
<div class="left"></div>
<?php
include('foot.html');
?>
