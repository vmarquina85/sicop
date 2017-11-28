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
