class Detalle {

function obtener_detalle(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var resultado;
  var TipoBien=document.getElementById("sl_tipobien").value;
  var codigoPatrimonial=document.getElementById("txt_cod_1").value+"-"+document.getElementById("txt_cod_2").value;
  var observacion=document.getElementById("txt_asignacionObservacion").value;
  var papeletaDetalle= $("#tb_detalles");
  var url = "../get/get_detallePapeleta.php?id_patrimonial="+codigoPatrimonial;
  http.open("GET", url, false);

  // Obtener Datos
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var res = JSON.parse(http.responseText);
        resultado= res;
      }
    };
  });

  http.send(null);
  return resultado;
}
function validar_detalle(resultado){
  if (resultado.length!=0) {

    var tipo_equipo=resultado[0].tipo_equipo;
    var marca=resultado[0].marca;
    var modelo=resultado[0].modelo;
    var color=resultado[0].color;
    var serie=resultado[0].serie;
    var estado=resultado[0].estado;

    var sta = resultado[0].est_bien;
    var fun = resultado[0].id_asignado;
    var alt = resultado[0].id_alterno;
    var id_personal =document.getElementById('sl_entrega_o').value;

    if (sta == 'B') {
      alert("Bien se encuentra de Baja.");
    }else if (sta == 'E') {
      alert("Bien se encuentra Eliminado.");
    }else if (fun != id_personal){
     alert("Bien asignado a otro Usuario.");
   }else{
     indice=pad(document.getElementById('tb_detalles').rows.length,3);
     papeletaDetalle.append("<tr id='"+indice+"' style='font-size: 10px;background:#ffffff;'><td>"+codigoPatrimonial+"</td><td>"+tipo_equipo+"</td><td>"+marca+"</td><td>"+modelo+"</td><td>"+color+"</td><td>"+serie+"</td><td>"+estado+"</td><td>"+observacion+"</td><td><a href=\"javascript:DeleteDetalle('"+indice+"');\"><i class='fa fa-times'></i></td></tr>");
   }
 }else{
  alert("Por favor ingresar un Codigo Patrimonial valido");
}
}

function agregar_detalle(){
 var result=obtener_detalle();
 validar_detalle(result);
};

function DeleteDetalle(r){
  var tabla =document.getElementById("tb_detalles");
  var selectedIndex=document.getElementById(r).rowIndex;
  tabla.deleteRow(selectedIndex);
}
}
