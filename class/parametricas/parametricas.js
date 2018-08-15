function fn_obtenerAreas(dtarget,atarget){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
var  id_dep=document.getElementById(dtarget).value;
var url='../get/get_area.php?id_dep='+id_dep;
  http.open("GET", url, false);
  http.addEventListener('readystatechange',function(){
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
          document.getElementById(atarget).innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
function fn_obtenerOficina(dtarget,atarget,otarget){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
var  id_dep=document.getElementById(dtarget).value;
var  id_area=document.getElementById(atarget).value;
var url='../get/get_oficina.php?id_dep='+id_dep+'&area='+id_area;
  http.open("GET", url, false);
  http.addEventListener('readystatechange',function(){
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
          document.getElementById(otarget).innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
