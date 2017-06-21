function get_usuarios(limit,offset){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_usuarios.php';
  var parametro=document.getElementById("inputParametro").value;
  var modurl = url+ "?limit="+ limit +"&offset=" + offset+"&parametro="+parametro;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tb_detalle_usuarios").innerHTML = (resultado);
      }
    }

  });
  // http.onreadystatechange = useHttpResponseDistritoPac;
  http.send(null);
}
function search(index){
  if (index<1) {
    index=1;
  }
  get_usuarios(20,(20*(index-1)));
  init_paginador(index);
}
function init_paginador(index){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_paginador.php';
  var parametro=document.getElementById("inputParametro").value;

  var modurl = url+ "?parametro="+parametro+"&pn="+index;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("paginator").innerHTML = (resultado);
      }
    }
  });
  // http.onreadystatechange = useHttpResponseDistritoPac;
  http.send(null);
}
function vertodos(){
  //reniiciando selects
  $('#inputParametro').val("");
  search(1);
}
