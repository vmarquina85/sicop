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
function consultar(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_historial.php';
  var idpatrimonial=document.getElementById("txt_cod_1").value+"-"+document.getElementById("txt_cod_2").value;
  var modurl = url+ "?idpat="+ idpatrimonial;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("detalleConsulta").innerHTML = (resultado);
        obtenerAsignado();
      }
    }
  });
  http.send(null);
}
function iniciarSelect(){
  $(".default-select2").select2({
      placeholder: "Seleccionar Tipo de Bien"
  })
}
function obtenerAsignado(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_asignadoxbien.php';
  var idpatrimonial=document.getElementById("txt_cod_1").value+"-"+document.getElementById("txt_cod_2").value;
  var modurl = url+ "?idpat="+ idpatrimonial;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("datosAsignado").innerHTML = (resultado);

      }
    }
  });
  http.send(null);
}
