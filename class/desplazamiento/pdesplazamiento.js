  function get_papeletas(limit,offset){
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    };
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
        };
      }; 
    });
  http.send(null);
}

  function init_paginador(index){
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    };
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
        };
      }; 
    });
  http.send(null);
}

function search(index){
  if (index<1) {
    index=1;
  };
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
// 

//         function limpiarFormulario(formulario){
//             $(formulario)[0].reset();
//           }

//           function  nuevoRegistro(){
//             $('#mymodal').modal();
//             limpiarFormulario('#formulario');
//           }