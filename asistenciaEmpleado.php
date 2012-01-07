<?php
include('session.php');
include("head.html");
include("menu.php");
include("libreria.php");
include_once("db/searchs.php");
include_once("clases/Vendedor.php");

conectarDB();

if($_SESSION['Nivel']==2){
  $vendedores = buscarVendedores();
  $size= count($vendedores);
}

?>
<link href="css/calendario.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar-es.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>
<script type="text/javascript" src="js/validacion.js"></script>
<script type="text/javascript" defer="defer" src="js/validacion.js" ></script>
<h2>Consulta de Asistencia</h2>
<br />
<div id="registro" >
<form action="asistenciaEmpleadoExecute.php" method="post"
  title="Formulario de Consulta de la Asistencia del Vendedor" onsubmit="return validarVacio(this);" >
    <?php if($_SESSION['Nivel'] == 2):?>
      <label for="de" class="bold">De: </label>
      <select name="Cedula" id="Cedula" title="Seleciona el Vendedor a Consultar">
        <option value=""></option>
        <?php for($i=0;$i<$size;$i++):?>
        <option value="<?php echo $vendedores[$i]->getCedula() ?>"><?php echo $vendedores[$i]->getNombre().' '.$vendedores[$i]->getApellido(); ?></option>
        <?php endfor; ?>
      </select>
      <br /><br />
    <?php else: ?>
      <input type="hidden" name="Cedula" id="Cedula" value="<?php echo $_SESSION['Cedula']; ?>" />
    <?php endif; ?>
    <label>Por Mes</label>
    <br />
    <select id="mes" name="mes" title="Seleciona el mes a Consultar" onblur="if(this.value!=0) {deshabilitar(document.getElementById('fecha1')); deshabilitar(document.getElementById('fecha2'));}" >
        <option value="0"></option>
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
    </select>
    <br />
    <label>Por Rango de Días</label>
    <br />
    <label>Fecha Inicial</label>
    <input id="fecha1" size= "9" name="fecha1" class="for_txtInputFecha" type="text" value="" tabindex="2" readonly="readonly" onchange="deshabilitar(document.getElementById('mes'));" />
    <img class="for_imgFecha" id="Imgfecha1" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
    <!-- definicion de los calendario en el formulario -->
    <script type="text/javascript">
        Calendar.setup({inputField:"fecha1", button:"Imgfecha1"});
        Calendar.setup({inputField:"fecha1", eventName: "click", button:"Imgfecha1"});
    </script>
    <!-- hasta aqui definicion del calendario -->
    <br />
    <label>&nbsp;Fecha&nbsp;Final&nbsp;</label>
    <input id="fecha2" size= "9" name="fecha2" class="for_txtInputFecha" type="text" value="" tabindex="2" readonly="readonly" />
    <img class="for_imgFecha" id="Imgfecha2" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
    <!-- definicion de los calendario en el formulario -->
    <script type="text/javascript">
        Calendar.setup({inputField:"fecha2", button:"Imgfecha2"});
        Calendar.setup({inputField:"fecha2", eventName: "click", button:"Imgfecha2"});
    </script>
    <!-- hasta aqui definicion del calendario -->
    <br />
    <input type="hidden" name="Principal" value="2"/> 	
    <input type="submit" value="Consultar"/>
    <input type="reset" value="Limpiar"/>
</form>
<input type="button" title="Boton para salir a la pantalla inicial del sistema"
       value="Salir" onClick="ir('administracion.php');" />
</div>
</div>
<?php
include("menuAdministracion.php");
include("foot.html");
?>