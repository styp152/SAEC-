<?php
    header('Content-type:text/html;charset=iso-8859-1');
    //$texto = $_REQUEST['nombre']; Aqui se obtiene el parametro para hacer las busquedas en la base de datos
    $sugerencias = array();
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
?>