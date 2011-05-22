var peticion = null;
var elementoSeleccionado = -1;
var sugerencias = null;
var cacheSugerencias = {};

function inicializa_xhr() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest(); 
  } else if (window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP"); 
  } 
}

function colocarValor(valor) {
   document.getElementById("nombre").value = valor;
   borraLista();
}

Array.prototype.formateaLista = function() {
  var codigoHtml = "";

  codigoHtml = "<ul style=\"list-style: none; margin: 0; padding: 0; font-size:.85em;\">";
  for(var i=0; i<this.length; i++) {
    if(i == elementoSeleccionado) {
      codigoHtml += "<li style=\"font-weight:bold; color:#333; background-color: #ffe594; padding: .1em; border-bottom: 1px dotted #ffe594; cursor:pointer;\"><a href=\"#\" onClick=\"colocarValor('"+this[i]+"')\">"+this[i]+"</a></li>";
    }
    else {
      codigoHtml += "<li style=\"padding: .1em; border-bottom: 1px dotted #ffe594; cursor:pointer;\"><a href=\"#\" onClick=\"colocarValor('"+this[i]+"')\">"+this[i]+"</a></li>";
    }
  }
  codigoHtml += "</ul>";

  return codigoHtml;
};

function autocompleta() {
    var elEvento = arguments[0] || window.event;
    var tecla = elEvento.keyCode;
  if(tecla == 40) { // Flecha Abajo
    if(elementoSeleccionado+1 < sugerencias.length) {
      elementoSeleccionado++;
    }
    muestraSugerencias();
  }
  else if(tecla == 38) { // Flecha Arriba
    if(elementoSeleccionado > 0) {
      elementoSeleccionado--;
    }
    muestraSugerencias();
  }
  else if(tecla == 13) { // ENTER o Intro
    seleccionaElemento();
  }
  else {
    var texto = document.getElementById("nombre").value;
    
    // Si es la tecla de borrado y el texto es vacío, ocultar la lista
    if(tecla == 8 && texto == "") {
      borraLista();
      return;
    }
   
    if(cacheSugerencias[texto] == null) {
      peticion = inicializa_xhr();
      
      peticion.onreadystatechange = function() { 
        if(peticion.readyState == 4) {
          if(peticion.status == 200) {
            sugerencias = eval('('+peticion.responseText+')');
            if(sugerencias.length == 0) {
              sinResultados();
            }
            else {
              cacheSugerencias[texto] = sugerencias;
              actualizaSugerencias();
            }
          }
        }
      };
      peticion.open('POST', 'autocompletarArticulo.php?nocache='+Math.random(), true);
      peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      peticion.send('nombre='+encodeURIComponent(texto));
    }
    else {
      sugerencias = cacheSugerencias[texto];
      actualizaSugerencias();
    }
  }
}


function sinResultados() {
  document.getElementById("sugerencias").innerHTML = "No existen articulos con ese nombre";
  document.getElementById("sugerencias").style.display = "block";
}

function actualizaSugerencias() {
  elementoSeleccionado = -1;
  muestraSugerencias();
}

function seleccionaElemento() {
  if(sugerencias[elementoSeleccionado]) {
    document.getElementById("nombre").value = sugerencias[elementoSeleccionado];
    borraLista();
  }
}

function muestraSugerencias() {
  var zonaSugerencias = document.getElementById("sugerencias");
  
  zonaSugerencias.innerHTML = sugerencias.formateaLista();
  zonaSugerencias.style.display = 'block';  
}

function borraLista() {
  document.getElementById("sugerencias").innerHTML = "";
  document.getElementById("sugerencias").style.display = "none";
}

window.onload = function() {
  document.getElementById("nombre").onkeyup = autocompleta;
}
