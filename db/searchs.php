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
  $sql="SELECT * FROM Articulo WHERE Cantidad = $cantidad";
  $result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result)){
    $articulo = new Articulo();
    $articulo->updateDatos($row);
    $articulos[] = $articulo;
  }
  return $articulos;
}

function buscarArticulosPorNombre($nombre){
  $sql="SELECT Nombre,Precio FROM Articulo WHERE Nombre LIKE '%".$nombre."%' ORDER BY Nombre LIMIT 10";
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

function buscarFacturaPorCodigo($codigo){
  $sql='SELECT * FROM Factura WHERE Codigo=\''.$codigo.'\'';
  $result = mysql_query($sql);
  $factura = new Factura();
  $factura->updateDatos(mysql_fetch_assoc($result));
  return $factura;
}

?>