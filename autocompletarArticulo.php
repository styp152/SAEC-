<?php
include_once('clases/Articulo.php');
include_once('db/searchs.php');
$texto = $_REQUEST['nombre'];
$sugerencias = array();
$articulos=buscarArticulos($texto);
$size=count($articulos);
for($i=0;$i<$size;$i++){
    $sugerencias[] = $articulos[$i]->getNombre();
}
if($size>0) {
	  echo "[ \"";
	  echo implode($sugerencias, "\", \"");
    echo "\"]";
}else {
	  echo "[]";
}
?>

<!--$result=mysql_query("SELECT Nombre FROM odontologos WHERE nombre LIKE '%".
                    $texto."%' ORDER BY nombre LIMIT 10");
$sugerencias[0] = "Chapas";
$sugerencias[1] = "Tazas";
$sugerencias[2] = "Camisas S";
$sugerencias[3] = "Pendom 1m";
$sugerencias[4] = "Bolso estampado";
$sugerencias[5] = "Camisas M";
$sugerencias[6] = "Camisas L";
if(count($sugerencias)>0) {
    echo "[ \"";
    echo implode($sugerencias, "\", \"");
    echo "\"]";
}
else {
    echo "[]";
}
    
    
	while($row=mysql_fetch_array($result)) {
		$sugerencias[] = $row[0];
	}
	if(count($sugerencias)>0) {
	  echo "[ \"";
	  echo implode($sugerencias, "\", \"");
	  echo "\"]";
	}
	else {
	  echo "[]";
	}
-->