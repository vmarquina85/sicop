function get_papeletas(limit,offset){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_pdesplazamiento.php';
  var numero=document.getElementById("txt_numero").value;
  var origen=document.getElementById("sl_origen").value;
  var destino=document.getElementById("sl_destino").value;
  var estado=document.getElementById("sl_estado").value;
  var motivo=document.getElementById("sl_movtipo").value;

  var modurl = url+ "?limit="+ limit +"&offset=" + offset+"&numero="+ numero +"&origen="+origen+"&destino="+destino+"&estado="+estado+"&motivo="+motivo;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tb_pdesplazamiento").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}

function init_paginador(index){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_pagination.php';
  var numero=document.getElementById("txt_numero").value;
  var origen=document.getElementById("sl_origen").value;
  var destino=document.getElementById("sl_destino").value;
  var estado=document.getElementById("sl_estado").value;
  var motivo=document.getElementById("sl_movtipo").value;
  var modurl = url+ "?numero="+ numero +"&origen="+origen+"&destino="+destino+"&estado="+estado+"&motivo="+motivo+"&pn="+index+"&page=desplazamiento";
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("paginator").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}

function search(index){
  if (index<1) {
    index=1;
  }
  get_papeletas(20,(20*(index-1)));
  init_paginador(index);
}
function vertodos(){
  //reniiciando selects
  $('#sl_origen').val("*");
  $('#sl_destino').val("*");
  $('#sl_estado').val("*");
  //limpiando imputs
  $('#txt_numero').val("");
  search(1);
}
function  nuevoRegistro(){
  $('#mymodal').modal();
  limpiarFormulario('#formulario');
}
function llenarPersonalDestino(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var idpersonal= document.getElementById("sl_des_Entrega").value;
  var url = "../get/datosPersonalDestino.php?idpersonal="+idpersonal;
  http.open("GET", url, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("datosDestino").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
function obtener_personal(){
  limpiar();
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_select_personal.php';
  var destino=document.getElementById("sl_TrasladoDestino").value;
  var modurl = url+ "?destino="+destino;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("sl_des_Entrega").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
function limpiar(){
  document.getElementById("sl_area_d").value="";
  document.getElementById("sl_oficina_d").value="";
  document.getElementById("sl_cargo_d").value="";
  document.getElementById("txt_dni_d").value="";
}
function obtenerCodigo() {
  var codigo=document.getElementById("sl_tipobien").value ;
  return codigo.substr(0,8);
}
function setCodigo(){
  $('#txt_cod_1').val(obtenerCodigo());
  $('#txt_cod_2').val("");
  $('#txt_cod_2').focus();
}
function ValidaSoloNumeros() {
  if ((event.keyCode < 48) || (event.keyCode > 57)) {
    event.returnValue = false;
  }
}
function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}
function agregar_detalle(){
  var codigoPatrimonial=document.getElementById("txt_cod_1").value+"-"+document.getElementById("txt_cod_2").value;
  if (codigoPatrimonial.length!=9 && codigoPatrimonial.length!=1) {
    var result=obtener_detalle();
    var encontrado=RecorrerDetalle(result);
    if (encontrado===true) {
      alert('El bien ya esta agregado.');
    }else{

      validar_detalle(result);
      actualizarMatriz(result);
    }
  }else{
    alert('Ingresar Codigo Patrimonal Valido.');
  }
}
function actualizarMatriz(r){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  //obtengo datos del equipo en variables
  var id_estado=r[0].id_estado;
  var id_alterno=r[0].id_alterno;
  var det_obs=document.getElementById("txt_transladoObservacion").value;
  var url = "../get/actualizarMatriz.php?id_estado="+id_estado+"&id_alterno="+id_alterno+"&Obs="+det_obs;
  http.open("GET", url, false);
  http.send(null);
}
function obtener_detalle(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var resultado;
  var TipoBien=document.getElementById("sl_tipobien").value;
  var codigoPatrimonial=document.getElementById("txt_cod_1").value+"-"+document.getElementById("txt_cod_2").value;
  var url = "../get/get_detalleBien.php?id_patrimonial="+codigoPatrimonial;
  http.open("GET", url, false);
  // Obtener Datos
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var res = JSON.parse(http.responseText);
        resultado= res;
      }
    }
  });

  http.send(null);
  return resultado;
}
function validar_detalle(resultado){
  var tipo_equipo=resultado[0].tipo_equipo;
  var marca=resultado[0].marca;
  var modelo=resultado[0].modelo;
  var color=resultado[0].color;
  var serie=resultado[0].serie;
  var estado=resultado[0].estado;
  var codigoPatrimonial=resultado[0].id_patrimonial;
  var observacion=document.getElementById("txt_transladoObservacion").value;
  var papeletaDetalle= $("#tb_detalles");
  var sta = resultado[0].est_bien;
  var fun = resultado[0].id_asignado;
  var alt = resultado[0].id_alterno;
  var papeleta = resultado[0].papeleta;
  var id_personal =document.getElementById('sl_entrega_o').value;
  if (sta == 'B') {
    alert("Bien se encuentra de Baja.");
  }else if (sta == 'E') {
    alert("Bien se encuentra Eliminado.");
  }else if (fun != id_personal){
    alert("Bien asignado a otro Usuario.");
  }else if (papeleta=='S') {
      alert("Bien con papeleta pendiente.");
  }else{
    indice=pad(document.getElementById('tb_detalles').rows.length,3);
    papeletaDetalle.append("<tr id='"+indice+"' style='font-size: 10px;background:#ffffff;'><td>"+codigoPatrimonial+"</td><td>"+tipo_equipo+"</td><td>"+marca+"</td><td>"+modelo+"</td><td>"+color+"</td><td>"+serie+"</td><td>"+estado+"</td><td>"+observacion+"</td><td><a href=\"javascript:DeleteDetalle('"+indice+"');\"><i class='fa fa-times'></i></td></tr>");
  }
}
function RecorrerDetalle(result){
  var encontrado= false;
  var papeletaDetalle= document.getElementById('tb_detalles');

  for (var i = 1; i <papeletaDetalle.rows.length; i++) {
    for (var j = 0; j <1; j++) {
      if (result[0].id_patrimonial==papeletaDetalle.rows[i].cells[j].innerHTML) {
        encontrado = true ;
      }else{
        encontrado=false;
      }
    }
  }
  return encontrado;
}
function validar_translado(){
  if (document.getElementById('sl_TrasladoDestino').value=='*' || document.getElementById('sl_TrasladoDestino').value==='') {
    alert('Seleccionar Destino');
    return false;
  }else if (document.getElementById('sl_des_Entrega').value=='*') {
    alert('Dato incompleto Destino - Recibe ');
    return false;
  }else if (document.getElementById('sl_motivo').value=='*') {
    alert('Dato incompleto Destino - Motivo ');
    return false;
  }else if (document.getElementById('sl_area_d').value=='*') {
    alert('Dato incompleto Destino - Area ');
    return false;
  }else if (document.getElementById('sl_oficina_d').value=='*') {
    alert('Dato incompleto Destino - oficina ');
    return false;
  }else if (document.getElementById('sl_cargo_d').value=='*') {
    alert('Dato incompleto Destino - Cargo ');
    return false;
  }else if (document.getElementById('sl_cargo_d').value==='') {
    alert('Dato incompleto Destino - DNI ');
    return false;
  }else if (document.getElementById('sl_tipo').value==='*') {
    alert('Dato incompleto - Motivo');
    return false;
  }else if ($("#sl_TrasladoDestino option:selected").text()==document.getElementById('txt_origin').value && document.getElementById('sl_tipo')!=1) {
    alert('Origen y Destino denotan un tipo de papeleta "INTERNO", revisar');
    return false;
  }else if ($("#sl_TrasladoDestino option:selected").text()!=document.getElementById('txt_origin').value && document.getElementById('sl_tipo')==1) {
    alert('Origen y Destino NO denotan un tipo de papeleta "INTERNO", revisar');
    return false;
  }else {
    return true;
  }
}

function limpiarFormulario(formulario){
  $(formulario)[0].reset();
  document.getElementById('sl_TrasladoDestino').value='*';
  document.getElementById('sl_area_d').value='*';
  document.getElementById('sl_oficina_d').value='*';
  document.getElementById('sl_cargo_d').value='*';
  document.getElementById('txt_dni_d').value='';
  DeleteDetalle_all();

}
function grabarTranslado(){
  if (confirm("¿Está Seguro que desea realizar el Translado?")){
    //if (validar_asignacion()) {
    if (validar_translado()) {
      //  grabarDatosAsignacion();
      grabarDatosTranslado();
      alert("Translado registrado con Exito");
    }

  }
}
function grabarDatosTranslado(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../insert/insertDataTranslado.php';
  //parametros a ingresar
  //origen
  var fecha=document.getElementById("txtFecha").value;
  var destino=document.getElementById("sl_TrasladoDestino").value;
  //destino
  var motivo =document.getElementById('sl_motivo').value
  var mov_tipo = document.getElementById('sl_tipo').value;
  var recibe_d=document.getElementById("sl_des_Entrega").value;
  var area_d=document.getElementById("sl_area_d").value;
  var oficina_d=document.getElementById("sl_oficina_d").value;
  var cargo_d=document.getElementById("sl_cargo_d").value;
  var dni_d=document.getElementById("txt_dni_d").value;
  var modurl = url+ "?fecha="+fecha+"&destino="+destino+"&recibe="+recibe_d+"&area_d="+area_d+"&oficina_d="+oficina_d+"&cargo="+cargo_d+"&dni="+dni_d+"&mov_tipo="+mov_tipo+"&motivo="+motivo;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText.trim();
        document.getElementById("txtOrden").value = resultado;
      }
    }
  });
  http.send(null);
};
function DeleteDetalle_all(){
  var tabla =document.getElementById("tb_detalles");
  var rows= tabla.getElementsByTagName('TR').length;
  for (var i = 1; i < rows; i++) {
    tabla.deleteRow(1);
    BorrarMatriz(i);
  }
}
function DeleteDetalle(r){
  var tabla =document.getElementById("tb_detalles");
  var selectedIndex=document.getElementById(r).rowIndex;
  tabla.deleteRow(selectedIndex);
  BorrarMatriz(selectedIndex);
}
function BorrarMatriz(index){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  //obtengo datos del equipo en variables
  var url = "../get/deleteMatriz.php?index="+index;
  http.open("GET", url, false);
  http.send(null);
}
function validar_mov_tipo(){
  var destino= $('#sl_TrasladoDestino option:selected').text();
  var origen=document.getElementById('txt_origin').value;
  if (destino.trim()==origen.trim()) {
    document.getElementById('sl_tipo').value=1;
  }else{
    document.getElementById('sl_tipo').value=2;
  }
}
