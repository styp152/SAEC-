i=0;
j=0;
total=0;

function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789";
  var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8, 37, 39, 46];
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
  // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
  }
  // Obtener la tecla pulsada
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  if(!(permitidos.indexOf(caracter) != -1 || tecla_especial)){
    alert("Caracter No Permitido.");
  }
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
function validarVacio(formulario){
  band= true;
  for(i=0;i<formulario.length;i++){
    if(formulario.elements[i].getAttribute('disabled') ){
     continue;
    }
    if(formulario.elements[i].value=="" || formulario.elements[i].value==0  ){
      if(formulario.elements[i].id=="_ClaveNueva" || formulario.elements[i].id=="_ClaveConfirmar"){
        continue;
      }
      document.getElementById(formulario.elements[i].name).style.background='#FF4800';
      band=false;
    }
  }
  if (band==false){
    alert("Uno de los Campos Obligatorios se Encuentra Vacio");
  }
  return band;
}
function limpiar(campo){
  campo.style.background='#fff';
}
function limpiarT(campo){
  campo.value="";  
}
function ir(direccion){
  window.location=direccion;
}

function validarEspaciosBlancos(campo){
  band1=true;
  for ( i = 0; i < campo.value.length; i++ ) {
    if ( campo.value.charAt(i) != " " ) {
      band1=false;
    }
  }
  if(band1){
    campo.value="";
  }
}

function validarClaves(campo, campoConfirmacion){
  if(campo.value==campoConfirmacion.value){
    campoConfirmacion.style.background='#99FF99';
  }
  else{
    campoConfirmacion.style.background='#FF0000';
  }
}

function deshabilitar(campo){
  campo.setAttribute('disabled','disabled');
}

function habilitar(campo){
  campo.setAttribute('disabled','false');
}

function agregar(){
  c=document.getElementById('cantidad').value;
  p=document.getElementById('Precio').value;
  n=document.getElementById('NombreP').value;
  k=2;
  while(document.getElementById('table').rows[k]!=null){
    if(document.getElementById('table').rows[k].cells[1].innerHTML==n){
      alert("El Producto Seleccionado ya se encuentra en la Lista de Pedido");
      return;
    }
    k++;
  }
  if(!(c==0 || p==0 || n=='')){
    var x=document.getElementById('table').insertRow(i+2);
    x.id=i+2;
    i++;
    var v=x.insertCell(0);
    var y=x.insertCell(1);
    var z=x.insertCell(2);
    var a=x.insertCell(3);
    var btnBorrar=document.createElement('input');
    btnBorrar.setAttribute('type','button');
    btnBorrar.setAttribute('value','x');
    btnBorrar.setAttribute('onclick','remove(this.parentNode.parentNode)');
    btnBorrar.setAttribute('style','float:right;');
    v.innerHTML=document.getElementById('cantidad').value;
    y.innerHTML=document.getElementById('NombreP').value;
    z.innerHTML=document.getElementById('Precio').value;
    a.innerHTML=document.getElementById('Precio').value * document.getElementById('cantidad').value;
    a.appendChild(btnBorrar);
    var hidden=document.createElement('input');
    hidden.setAttribute('type','hidden');
    hidden.setAttribute('name','c'+j);
    hidden.setAttribute('value',document.getElementById('cantidad').value);
    x.appendChild(hidden);
    var hidden=document.createElement('input');
    hidden.setAttribute('type','hidden');
    hidden.setAttribute('name','n'+j);
    hidden.setAttribute('value',document.getElementById('NombreP').value);
    x.appendChild(hidden);
    var hidden=document.createElement('input');
    hidden.setAttribute('type','hidden');
    hidden.setAttribute('name','p'+j);
    hidden.setAttribute('value',document.getElementById('Precio').value);
    x.appendChild(hidden);
    j++;
    total+=(document.getElementById('Precio').value * document.getElementById('cantidad').value)
    document.getElementById('total').innerHTML=total;
    if(document.getElementById('resta')!=null){
      document.getElementById('resta').innerHTML=total-document.getElementById('abono').value;  
    }
    document.getElementById('NombreP').value='';
    document.getElementById('Precio').value='0';
    document.getElementById('cantidad').value='0';
  }else{
    alert('Uno de los Campos del Producto se encuentra Vacio');
  }
}

function abonar(campo){
  if((document.getElementById('total').innerHTML*0.2)-campo.value > 0){
    campo.value=0;
    alert("El Minimo de Abono es del 20% para Realizar la Facturacion");
    return;
  }
  document.getElementById('resta').innerHTML=document.getElementById('total').innerHTML-campo.value;
}


function remove(campo){
  total-=campo.cells[2].innerHTML*campo.cells[0].innerHTML;
  k=2;
  while(document.getElementById('table').rows[k]!=null){
    if(document.getElementById('table').rows[k].cells[1].innerHTML==campo.cells[1].innerHTML){
      document.getElementById('table').deleteRow(k);
    }
    k++;
  }
  document.getElementById('total').innerHTML=total;
  i--;
}

function removeall(){
  for(j=2;j<=(i+1);j++){
    document.getElementById('table').deleteRow(j);
  }
  i=0;
  total=0;
  document.getElementById('total').innerHTML=total;
}

function clickEnviar(){
  if(document.getElementById('Detalles').innerHTML=="Aqui se agregan los detalles del pedido."){
    document.getElementById('Detalles').innerHTML='';
    return;
  }
  if(document.getElementById('table').rows[2]==null){
    alert('Debes Incluir al Menos un Articulo');
    return;
  }
  document.getElementById('cantidad').setAttribute('disabled','disabled');
  document.getElementById('NombreP').setAttribute('disabled','disabled');
  document.getElementById('Precio').setAttribute('disabled','disabled');
  var hidden=document.createElement('input');
  hidden.setAttribute('type','hidden');
  hidden.setAttribute('name','cantidadj');
  hidden.setAttribute('value',j);
  document.getElementById('table').appendChild(hidden);
  return;
}

function validarNTipoEnvio(campo){
  if (campo.value=="Efectivo" || campo.value==""){
    document.getElementById('NTipo_Pago').setAttribute('disabled','disabled');
  }
  else{
    document.getElementById('NTipo_Pago').removeAttribute('disabled');
  }
}

function abonarCuenta(resta){
  abono = prompt('Introduce la Cantidad a Abonar','[ Cantidad Abonar ]');
  if(abono < 0 || abono > resta){
    alert('Introduzca una Cantidad Valida a Abonar');
    return 0;
  }
  return abono;
}