<?php

function buscarUltimosArticulos($limite){
  $sql="SELECT COUNT(*) FROM Articulo";
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
  $cantidad = (int)$row[0];
  if(($cantidad-$limite) < 0){
    $limite=$cantidad;
  }
  $limite=$cantidad-$limite;
  $sql="SELECT * FROM Articulo LIMIT $limite, $cantidad ";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[] = $articulo;
  }
  return $articulos;
}

function buscarArticulo($nombre){
  $sql="SELECT * FROM Articulo WHERE Nombre = '$nombre'";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $articulo = new Articulo();
  $articulo->updateDatos($row);
  return $articulo;
}

function buscarCantidadArticuloPorId($id){
  $sql="SELECT Cantidad FROM Articulo WHERE Id = $id";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $articulo = new Articulo();
  $articulo->updateDatos($row);
  return $articulo;
}

function buscarArticulosPorCantidad($cantidad){
  $sql="SELECT * FROM Articulo WHERE Cantidad <= $cantidad";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[] = $articulo;
  }
  return $articulos;
}

function buscarArticulosPorNombre($nombre){
  $sql="SELECT Nombre,Precio,Cantidad FROM Articulo WHERE Nombre LIKE '%".$nombre."%' ORDER BY Nombre LIMIT 10";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[]=$articulo;
  }
  return $articulos;
}

function buscarArticulosPorCodigoFactura($codigo){
  $sql='SELECT ArticuloId, Precio_Venta, Cantidad_Vendida FROM Articulo_Factura WHERE FacturaCodigo = \''.$codigo.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $id[] = $row['ArticuloId'];
    $precio[] = $row['Precio_Venta'];
    $cantidad[] = $row['Cantidad_Vendida'];
  }
  $sql="SELECT * FROM Articulo";
  $result1 = mysql_query($sql);
  $i=0;
  while($row = mysql_fetch_assoc($result1)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $k=0;
    while($k!=count($id)){
      if($articulo->getId()==$id[$k]){
        $articulo->setPrecio($precio[$k]);
        $articulo->setCantidad($cantidad[$k]);
        $articulos[]=$articulo;
      }
      $k++;
    }
  }
  return $articulos;
}

function buscarArticulosPorCodigoPresupuesto($codigo){
  $sql='SELECT ArticuloId, Precio_Presupuesto, Cantidad_Pedida FROM Articulo_Presupuesto
    WHERE PresupuestoCodigo = \''.$codigo.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $id[] = $row['ArticuloId'];
    $precio[] = $row['Precio_Presupuesto'];
    $cantidad[] = $row['Cantidad_Pedida'];
  }
  $sql="SELECT * FROM Articulo";
  $result1 = mysql_query($sql);
  $i=0;
  while($row = mysql_fetch_assoc($result1)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $k=0;
    while($k!=count($id)){
      if($articulo->getId()==$id[$k]){
        $articulo->setPrecio($precio[$k]);
        $articulo->setCantidad($cantidad[$k]);
        $articulos[]=$articulo;
      }
      $k++;
    }
  }
  return $articulos;
}


function buscarArticulos(){
  $sql="SELECT * FROM Articulo";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[]=$articulo;
  }
  return $articulos;
}

function buscarVendedorPorCedula($cedula){
  $sql="SELECT * FROM Vendedor WHERE Cedula = $cedula LIMIT 1";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $vendedor = new Vendedor();
  $vendedor->updateDatos($row);
  return $vendedor;
}

function buscarVendedorPorCedulaClaveSinCifrar($cedula){
  $sql="SELECT Cedula,Nombre,Apellido,Cargo,Nivel,AES_DECRYPT(Clave,'Password') as Clave FROM Vendedor WHERE Cedula = $cedula LIMIT 1";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $vendedor = new Vendedor();
  $vendedor->updateDatos($row);
  return $vendedor;
}

function buscarVendedores(){
  $sql="SELECT * FROM Vendedor";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $vendedor = new Vendedor();
    $vendedor->updateDatos($row);
    $vendedores[]=$vendedor;
  }
  return $vendedores;
}

function buscarClientePorCedula($cliente){
  $sql='SELECT * FROM Cliente WHERE Cedula = '.$cliente->getCedula().' LIMIT 1';
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $cliente= new Cliente();
  $cliente->updateDatos($row);
  return $cliente;
}

function buscarAsistencia($cedula,$fecha){
  $sql="SELECT Asistencia.Id, Asistencia.Fecha, Asistencia.Hora_Entrada, Asistencia.mHora_Entrada, Asistencia.Hora_Salida,
  Asistencia.mHora_Salida, Asistencia.Nota FROM Vendedor,Asistencia WHERE Vendedor.Cedula='$cedula' and Asistencia.Cedula_Vendedor='$cedula'
   and Asistencia.Fecha='$fecha' and Asistencia.Hora_Salida='00:00:00'";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  $asistencia = new Asistencia();
  $asistencia->updateDatos($row);
  return $asistencia;
}

function buscarAsistenciasEntreFechas($cedula,$fecha1,$fecha2){
  $sql="SELECT Asistencia.Id, Asistencia.Fecha, Asistencia.Hora_Entrada, Asistencia.mHora_Entrada, Asistencia.Hora_Salida,
  Asistencia.mHora_Salida, Asistencia.Nota FROM Vendedor,Asistencia WHERE Vendedor.Cedula='$cedula' and Asistencia.Cedula_Vendedor='$cedula'
   and Asistencia.Fecha>='$fecha1' and Asistencia.Fecha<='$fecha2'";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $asistencia = new Asistencia();
    $asistencia->updateDatos($row);
    $asistencias[]=$asistencia;
  }
  return $asistencias;
}

function buscarCodigoFacturaPorTodo($factura){
  $sql='SELECT Codigo FROM Factura WHERE Cedula_Clientes=\''.$factura->getCedulaCliente()
    .'\' and Cedula_Vendedor=\''.$factura->getCedulaVendedor().'\' and
    Fecha_Registro=\''.$factura->getFechaRegistro().'\' and Fecha_Entrega=\''.$factura->getFechaEntrega().
    '\' and Tipo_Pago=\''.$factura->getTipoPago().'\' and nTipo_Pago=\''.$factura->getNTipoPago().'\' and
    Detalles=\''.$factura->getDetalles().'\' and Estado=\'Facturado\'';
  $result = mysql_query($sql);
  $row=mysql_fetch_assoc($result);
  return $row['Codigo'];
}

function buscarCodigoPresupuestoPorTodo($presupuesto){
  $sql='SELECT Codigo FROM Presupuesto WHERE Cedula_Cliente=\''.$presupuesto->getCedulaCliente()
    .'\' and Cedula_Vendedor=\''.$presupuesto->getCedulaVendedor().'\' and
    Fecha_Registro=\''.$presupuesto->getFechaRegistro().'\' and Detalles=\''.$presupuesto->getDetalles().'\'';
  $result = mysql_query($sql);
  $row=mysql_fetch_assoc($result);
  return $row['Codigo'];
}

function buscarPresupuestoPorCodigo($codigo){
  $sql='SELECT * FROM Presupuesto WHERE Codigo=\''.$codigo.'\'';
  $result = mysql_query($sql);
  $presupuesto = new Presupuesto();
  $presupuesto->updateDatos(mysql_fetch_assoc($result));
  return $presupuesto;
}

function buscarFacturaPorCodigo($codigo){
  $sql='SELECT * FROM Factura WHERE Codigo=\''.$codigo.'\'';
  $result = mysql_query($sql);
  $factura = new Factura();
  $factura->updateDatos(mysql_fetch_assoc($result));
  return $factura;
}

function buscarFacturasPorDiaSinAnular($fecha){
  $sql='SELECT * FROM Factura WHERE Fecha_Registro=\''.$fecha.'\' and Estado!=\'Anulada\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $factura = new Factura();
    $factura->updateDatos($row);
    $facturas[]=$factura;
  }
  return $facturas;
}

function buscarFacturasPorDiaConAnular($fecha){
  $sql='SELECT * FROM Factura WHERE Fecha_Registro=\''.$fecha.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $factura = new Factura();
    $factura->updateDatos($row);
    $facturas[]=$factura;
  }
  return $facturas;
}

function buscarPresupuestosPorDia($fecha){
  $sql='SELECT * FROM Presupuesto WHERE Fecha_Registro=\''.$fecha.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $presupuesto = new Presupuesto();
    $presupuesto->updateDatos($row);
    $presupuestos[]=$presupuesto;
  }
  return $presupuestos;
}

function buscarFacturasPorRangoDias($fecha_inicio, $fecha_fin){
  $sql='SELECT * FROM Factura WHERE Fecha_Registro>=\''.$fecha_inicio.'\' and Fecha_Registro<=\''.$fecha_fin.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $factura = new Factura();
    $factura->updateDatos($row);
    $facturas[]=$factura;
  }
  return $facturas;
}

function buscarPresupuestosPorRangoDias($fecha_inicio, $fecha_fin){
  $sql='SELECT * FROM Presupuesto WHERE Fecha_Registro>=\''.$fecha_inicio.'\' and Fecha_Registro<=\''.$fecha_fin.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $presupuesto = new Presupuesto();
    $presupuesto->updateDatos($row);
    $presupuestos[]=$presupuesto;
  }
  return $presupuestos;
}

function buscarFacturasPorNombreCliente($nombre){
  $sql="SELECT Cedula FROM Cliente WHERE Nombre LIKE '%".$nombre."%'";
  $result = mysql_query($sql);
  $count=0;
  while($row = mysql_fetch_assoc($result)){
    $cliente= new Cliente();
    $cliente->updateDatos($row);
    $clientes[]=$cliente;
    $count++;
  }
  for($i=0;$i<$count;$i++){
    $sql='SELECT * FROM Factura WHERE Cedula_Clientes=\''.$clientes[$i]->getCedula().'\'';
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
      $factura = new Factura();
      $factura->updateDatos($row);
      $facturas[]=$factura;
    }
  }
  return $facturas;
}

function buscarFacturasPorCedulaCliente($cedula){
  $sql='SELECT * FROM Factura WHERE Cedula_Clientes=\''.$cedula.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $factura = new Factura();
    $factura->updateDatos($row);
    $facturas[]=$factura;
  }
  return $facturas;
}

function buscarPresupuestosPorCedulaCliente($cedula){
  $sql='SELECT * FROM Presupuesto WHERE Cedula_Cliente=\''.$cedula.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $presupuesto = new Presupuesto();
    $presupuesto->updateDatos($row);
    $presupuestos[]=$presupuesto;
  }
  return $presupuestos;
}

function buscarFacturasProduccion(){
  $sql = "SELECT * FROM Factura WHERE Estado='Facturado' ORDER BY Fecha_Entrega ASC";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $factura = new Factura();
    $factura->updateDatos($row);
    $facturas[]=$factura;
  }
  return $facturas;
}

function buscarFacturasDisenio(){
  $sql = "SELECT * FROM Factura WHERE Estado='Disenio' ORDER BY Fecha_Entrega ASC";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $factura = new Factura();
    $factura->updateDatos($row);
    $facturas[]=$factura;
  }
  return $facturas;
}

function buscarFacturasEntrega(){
  $sql = "SELECT * FROM Factura WHERE Estado='Para Entregar' ORDER BY Fecha_Entrega ASC";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $factura = new Factura();
    $factura->updateDatos($row);
    $facturas[]=$factura;
  }
  return $facturas;
}

function buscarAbonosPorDia($fecha){
  $sql = "SELECT * FROM Abono WHERE Fecha_Registro='".$fecha."' ORDER BY Cedula_Vendedor ASC";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $abono = new Abono();
    $abono->updateDatos($row);
    $abonos[]=$abono;
  }
  return $abonos;
}

function buscarAbonosPorRangoDias($fecha_inicio, $fecha_fin){
  $sql = "SELECT * FROM Abono WHERE Fecha_Registro>'".$fecha_inicio."' and Fecha_Registro<'".$fecha_fin."' ORDER BY Fecha_Registro ASC";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $abono = new Abono();
    $abono->updateDatos($row);
    $abonos[]=$abono;
  }
  return $abonos;
}

function buscarMontoCC($fecha){
  $sql = "SELECT Monto FROM CajaChica WHERE Fecha_Registro='".$fecha."'";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  return $row['Monto'];
}

function buscarGastosPorDia($fecha){
  $sql = "SELECT * FROM Gasto WHERE Fecha_Registro='".$fecha."' ORDER BY Cedula_Vendedor ASC";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $gasto = new Gasto();
    $gasto->updateDatos($row);
    $gastos[]=$gasto;
  }
  return $gastos;
}

function buscarCodigoSiguiente(){
  $sql = "SELECT Codigo FROM Factura ORDER BY Codigo DESC LIMIT 0,1";
  $result = mysql_query($sql);
  $row=mysql_fetch_assoc($result);
  return ($row['Codigo']+1);
}

function buscarGastosPorRangoDias($fecha_inicio, $fecha_fin){
  $sql = "SELECT * FROM Gasto WHERE Fecha_Registro>'".$fecha_inicio."' and Fecha_Registro<'".$fecha_fin."'  ORDER BY Fecha_Registro ASC";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $gasto = new Gasto();
    $gasto->updateDatos($row);
    $gastos[]=$gasto;
  }
  return $gastos;
}

function buscarConfiguracionPorCampo($campo){
  $sql='SELECT * FROM Configuracion WHERE Campo=\''.$campo.'\'';
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $config = new Configuracion();
    $config->updateDatos($row);
    $configs[]=$config;
  }
  return $configs;
}

?>