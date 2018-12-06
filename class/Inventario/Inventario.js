var date=new Date();
var fecha=date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
var popupElement = '<div class="btn-group btn-toggle"><button class="btn btn-warning"><i class="fa fa-warning"></i> <br>Revisar</button><button onclick="seleccionar(this)" class="btn btn-success active"><i class="fa fa-check"></i><br> OK</button></div>';

function f_getBienes(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_bienes_inv.php';
  var local=document.getElementById("sl_local").value;
  var modurl = url+ "?local="+ local;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tb_detalle_bienes").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
function seleccionarOk(objeto){
  var button =objeto.getElementsByTagName('I');
  fila=objeto.closest('tr');
  // quitar estado mod
  if (fila.className.indexOf("warning")>-1) {
    btn_mod=fila.getElementsByClassName("text-warning");
    $(btn_mod).toggleClass('text-warning');
    $(fila).toggleClass('warning');
  }
  // ------------------

  // mostrar seleccion (success)
  $(button).toggleClass('text-success');
  $(fila).toggleClass('success');
  // --------------------
}
function seleccionarMod(objeto){
  var button =objeto.getElementsByTagName('I');
  fila=objeto.closest('tr');

  // quitar estado OK
  if (fila.className.indexOf("success")>-1) {
    btn_ok=fila.getElementsByClassName('text-success');
    $(btn_ok).toggleClass('text-success');
    $(fila).toggleClass('success');
  }
  // ------------------
  // mostrar seleccion mod
  $(button).toggleClass('text-warning');
  $(fila).toggleClass('warning');
  // --------------------
}
function nuevo() {
  removeDisabled('select, .bootstrap-select,button');
  var element=document.getElementById('sl_local');
  element.scrollIntoView();
  $('#sl_local').data('selectpicker').$button.focus();

  $('#input_fecha_inv').val(fecha);
};
function DisableElement(element) {
  element=this
  $(element).attr('disable','disabled');
}
function ObtenerInvOk(table){
  var seleccion= Array();
  var selected=0;
  elemento=document.getElementById(table);
  var rows= elemento.getElementsByTagName('TR');
  //1.- recorrer las filas que tengan la class warning
  for (var i = 0; i < rows.length; i++) {
    if (rows[i].className.indexOf("success")>=0) {
      selected=selected+1;
      seleccion.push(i);
    }
  }
  var array=Array(selected);
  //3.- obtener nro y id_patrimonial de estas filas y guardarlos en la matriz
  for (var i = 0; i < seleccion.length; i++) {
    array[i]=rows[seleccion[i]].getElementsByTagName("td")[0].innerHTML;

  }

  return array;
}
function grabarInventario() {
//
  var arrayOK= Array();
  var arrayMod= Array();
  arrayOK=ObtenerInvOk('tb_bienes_inv');
  arrayMod=ObtenerEdit('tb_bienes_inv');
  for (var i = 0; i < arrayOK.length; i++) {
    alert(arrayOK[i]);
  }
  for (var j = 0; j < arrayMod.length; j++) {
    alert(arrayMod[j]);
  }
}




function ObtenerEdit(table){
  var seleccion= Array();
  var selected=0;
  elemento=document.getElementById(table);
  var rows= elemento.getElementsByTagName('TR');
  //1.- recorrer las filas que tengan la class warning
  for (var i = 0; i < rows.length; i++) {
    if (rows[i].className.indexOf("warning")>=0) {
      selected=selected+1;
      seleccion.push(i);
    }
  }
  var array=Array(selected);
  //3.- obtener nro y id_patrimonial de estas filas y guardarlos en la matriz
  for (var i = 0; i < seleccion.length; i++) {
    array[i]=rows[seleccion[i]].getElementsByTagName("td")[0].innerHTML;

  }

  return array;
}

function iniciarCentros(){
  $(".default-select2").select2();
}
function InvBien(input){
  var codigo =input.value;
  if (codigo.length==13) {
var elemento= new ibien(codigo);
elemento.getData();
elemento.ShowInfo();
    }
}
//CLASE REQUEST
function request(url){
  this.url=url;
}
// METODOS DE REQUEST
request.prototype.getUrl = function(){
  return this.url;
}
request.prototype.sethttpRequest = function(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
}
request.prototype.executeRequest_dom  = function(async,dom_object){
http.open("GET", this.url, async);
http.addEventListener('readystatechange', function() {
  if (http.readyState == 4) {
    if(http.status == 200) {
      var resultado = http.responseText;
      document.getElementById(dom_object).innerHTML = (resultado);
    }
  }
});
  http.send(null);
}





  function ibien(codigo,tipo="",marca="",modelo="",area="",asignado="") {
    this.codigo=codigo;
    this.tipo=tipo;
    this.marca=marca;
    this.modelo=modelo;
    this.area=area;
    this.asignado=asignado;
  }
  //metodos de ibien
  ibien.prototype.ShowInfo = function () {
  alert('CODIGO:' + this.codigo + " TIPO:" + this.tipo + " MARCA:" + this.marca + " MODELO:" +   this.modelo + " AREA:"+  this.area + " ASIGNADO:" + this.asignado);
};
ibien.prototype.getData = function () {
var req= new request('../get/get_bienes_inv.php');
req.sethttpRequest();
req.executeRequest_array(true, 'tb_detalle_bienes');


};
