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
    if(formulario.elements[i].value=="" || formulario.elements[i].value==0  ){
      document.getElementById(formulario.elements[i].name).style.background='#FF0033';
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