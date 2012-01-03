<?php
//phpinfo();

$usuario = 'styp152';
$password = '210689';
$numero = '04167710885';
$texto = urlencode("Estudio Creativo Merida de Jesus Gabriel Albornoz Informa que su pedido se encuentra listo para Retirar www.CreativoMerida.com");

$url = 'http://expresalo.com.ve/expresalo/sendsms/enviar/'.$usuario.'/'.$password.'/'.$numero.'/'.$texto;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);

$respuesta = curl_exec($ch);

echo $respuesta;

?>