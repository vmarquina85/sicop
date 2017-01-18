function get_papeletas(limit,offset){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_pasignacionIndividual.php';
  var numero=document.getElementById("txt_numero").value;
  var origen=document.getElementById("sl_origen").value;
  var destino=document.getElementById("sl_destino").value;
  var estado=document.getElementById("sl_estado").value;
  var modurl = url+ "?limit="+ limit +"&offset=" + offset+"&numero="+ numero +"&origen="+origen+"&destino="+destino+"&estado="+estado;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tb_asignaciones").innerHTML = (resultado);
      };
    };
  });
  http.send(null);
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
function limpiar(){
  document.getElementById("sl_area_d").value="";
  document.getElementById("sl_oficina_d").value="";
  document.getElementById("sl_cargo_d").value="";
  document.getElementById("txt_dni_d").value="";
}
function obtener_personal(){
  limpiar();
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_select_personal.php';
  var destino=document.getElementById("sl_asignacionDestino").value;
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
function init_paginador(index){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_pagination.php';
  var numero=document.getElementById("txt_numero").value;
  var origen=document.getElementById("sl_origen").value;
  var destino=document.getElementById("sl_destino").value;
  var estado=document.getElementById("sl_estado").value;
  var modurl = url+ "?numero="+ numero +"&origen="+origen+"&destino="+destino+"&estado="+estado+"&pn="+index+"&page=asignacion";
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
  //  if (validarAccesso()){
  $('#mymodal').modal();
  // }else {
  limpiarFormulario('#formulario');
  // }
}
function  validarAccesso(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var encontrado=false;
  var url = '../class/config/obtenerCargo.php';
  var modurl = url;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText.trim();
        var array=[2,7,13,32,38,3,107,1384,42,51,55,56,58,59,60,64,68,61,41,71,23,87,93,96,113,134];
        for (var i = 0; i < array.length; i++) {
          if (resultado==array[i]) {
            encontrado=true;
          }
        }
      }
    }
  });
  http.send(null);
  return encontrado;
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
function actualizarMatriz(r){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  //obtengo datos del equipo en variables
  var id_estado=r[0].id_estado;
  var id_alterno=r[0].id_alterno;
  var det_obs=document.getElementById("txt_asignacionObservacion").value;
  var url = "../get/actualizarMatriz.php?id_estado="+id_estado+"&id_alterno="+id_alterno+"&Obs="+det_obs;
  http.open("GET", url, false);
  http.send(null);
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


function validar_detalle(resultado){
  var tipo_equipo=resultado[0].tipo_equipo;
  var marca=resultado[0].marca;
  var modelo=resultado[0].modelo;
  var color=resultado[0].color;
  var serie=resultado[0].serie;
  var estado=resultado[0].estado;
  var codigoPatrimonial=resultado[0].id_patrimonial;
  var observacion=document.getElementById("txt_asignacionObservacion").value;
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
function DeleteDetalle(r){
  var tabla =document.getElementById("tb_detalles");
  var selectedIndex=document.getElementById(r).rowIndex;
  tabla.deleteRow(selectedIndex);
  BorrarMatriz(selectedIndex);
}
function DeleteDetalle_all(){
var tabla =document.getElementById("tb_detalles");
  var rows= tabla.getElementsByTagName('TR').length;
for (var i = 1; i < rows; i++) {
  tabla.deleteRow(1);
  BorrarMatriz(i);
}
}

function grabarAsignacion(){
  if (confirm("¿Está Seguro que desea realizar la asignación?")){
    if (validar_asignacion()) {
      grabarDatosAsignacion();
      alert("Asignacion registrada con Exito");
    }

  }
}
function grabarDatosAsignacion(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../insert/insertDataAsignacion.php';
  //parametros a ingresar

  //origen
  var fecha=document.getElementById("txtFecha").value;
  var destino=document.getElementById("sl_asignacionDestino").value;
  //destino
  var recibe_d=document.getElementById("sl_des_Entrega").value;
  var area_d=document.getElementById("sl_area_d").value;
  var oficina_d=document.getElementById("sl_oficina_d").value;
  var cargo_d=document.getElementById("sl_cargo_d").value;
  var dni_d=document.getElementById("txt_dni_d").value;
  var modurl = url+ "?fecha="+fecha+"&destino="+destino+"&recibe="+recibe_d+"&area_d="+area_d+"&oficina_d="+oficina_d+"&cargo="+cargo_d+"&dni="+dni_d;
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
function validar_asignacion(){
  if (document.getElementById('sl_asignacionDestino').value=='*' || document.getElementById('sl_asignacionDestino').value==='') {
    alert('Seleccionar Destino');
    return false;
  }else if (document.getElementById('sl_des_Entrega').value=='*') {
    alert('Dato incompleto Destino - Recibe ');
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
    alert('Dato incompleto Destino - DNI');
    return false;
  }else if (document.getElementById('tb_detalles').rows.length===1) {
    alert('Completar detalle de Bienes');
    return false;
  }else {
    return true;
  }
}
function limpiarFormulario(formulario){
  $(formulario)[0].reset();
    document.getElementById('sl_asignacionDestino').value='*';
    document.getElementById('sl_area_d').value='*';
    document.getElementById('sl_oficina_d').value='*';
    document.getElementById('sl_cargo_d').value='*';
        document.getElementById('txt_dni_d').value='';
    DeleteDetalle_all();

}
