<?php
include('session.php');
include("head.html");
include("menu.php");
?>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<link href="css/calendario.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar-es.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>

<h2>Buscar Factura</h2>
<div id="buscar">
  <form name="form" action="buscarFacturaExecute.php" method="post" title="Permite Buscar una Factura" >
    <fieldset id="buscar_codigo" >
        <legend align="center">Buscar por Codigo de Factura</legend>
        <br />
        <label for="codigo">Codigo: </label><input type="text" id="codigo" name="codigo" onfocus="limpiar(this);" size="9" onkeypress="return permite(event , 'num')" />
        <br /><br />
        <br />
    </fieldset>
    <fieldset id="buscar_cedula">
        <legend align="center">Buscar por Cedula del Cliente</legend>
        <br />
        <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" onfocus="limpiar(this);" size="9" onkeypress="return permite(event , 'num')" />
        <br /><br />
        <br />
    </fieldset>
    <fieldset id="buscar_fecha" align="center">
        <legend align="center">Buscar por Fecha </legend>
        <br />
        <label for="fecha" class="bold">Fechas:</label>
        <br /><br />
        <label for="fecha_inicio">Inicio: </label><input type="text" id="fecha_inicio" name="fecha_inicio" class="for_txtInputFecha" onfocus="limpiar(this);" size="9" value="" tabindex="2" readonly="readonly" />
        <img class="for_imgFecha" id="Imgfecha_inicio" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
        <script type="text/javascript">
            Calendar.setup({inputField:"fecha_inicio", button:"Imgfecha_inicio"});
            Calendar.setup({inputField:"fecha_inicio", eventName: "click", button:"Imgfecha_inicio"});
        </script>
        <br />
        <label for="fecha_fin">Fin: </label><input type="text" id="fecha_fin" name="fecha_fin" class="for_txtInputFecha" onfocus="limpiar(this);" size="9" value="" tabindex="2" readonly="readonly" />
        <img class="for_imgFecha" id="Imgfecha_fin" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
        <script type="text/javascript">
            Calendar.setup({inputField:"fecha_fin", button:"Imgfecha_fin"});
            Calendar.setup({inputField:"fecha_fin", eventName: "click", button:"Imgfecha_fin"});
        </script>
        <br /><br />
        <br />
    </fieldset>
    <div id="botones">
      <br />
      <input type="button" id="btnCodigo" class="btn" value="Por Codigo" title="Boton para Mostrar los datos para la busqueda por Codigo" onClick="document.getElementById('botones').style.display='none';document.getElementById('buscar_codigo').style.display='block';document.getElementById('btn').style.display='block';" />
      <br /><br />
      <input type="button" id="btnCedula" class="btn" value="Por Cedula" title="Boton para Mostrar los datos para la busqueda por Cedula" onClick="document.getElementById('botones').style.display='none';document.getElementById('buscar_cedula').style.display='block';document.getElementById('btn').style.display='block';" />
      <br /><br />
      <input type="button" id="btnFecha" class="btn" value="Por Fecha" title="Boton para Mostrar los datos para la busqueda por Fecha" onClick="document.getElementById('botones').style.display='none';document.getElementById('buscar_fecha').style.display='block';document.getElementById('btn').style.display='block';" />
      <br />  
    </div>
    <br />
    <div id="btn" align="center">
      <input type="submit" value="Buscar" />
      <input type="button" value="Cancelar" onclick="ir('buscarFactura.php');" />
    </div>
  </form>
</div>
</div>
<?php
include("menuFacturacion.php");
include("foot.html");
?>