function bienesPendientes(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_bienesxusuarioP.php';
  var modurl = url;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tab_pendientes").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
function bienesAsignados(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_bienesxusuarioA.php';
  var modurl = url;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tab_asignados").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
