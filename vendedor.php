<div id="figura">
  <div id="<?php if($_SESSION["Nivel"] == "2"):?><?php echo "admin";else:echo "vendedor";endif;?>"></div>
  <?php echo $_SESSION['Nombre']; ?><br />
  <?php echo $_SESSION['Cargo'];?>
</div>
  
