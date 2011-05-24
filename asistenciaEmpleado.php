<?php
include('session.php');
include("head.html");
include("menu.php");
// TODO Conexion a la BD para consultas de empleados
// TODO Habilitar Sesiones
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
<form action="controlAsistenciaExecute.php" method="post"
  title="Formulario de Consulta de la Asistencia del Vendedor" onsubmit="return validarVacio(this);" >
    <label>Por Mes</label>
    <br />
    <select id="mes" name="mes" title="Seleciona el mes a Consultar" >
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
    <input id="fecha1" size= "9" name="fecha1" class="for_txtInputFecha" type="text" value="" tabindex="2" readonly="readonly" />
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