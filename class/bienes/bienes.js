  function get_bienes(limit,offset){
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    }
    var url = '../get/get_bienes.php';
        var tipobien=document.getElementById("sl_tipobien").value;
    var totalchar=tipobien.length-(tipobien.indexOf('@')+1);
    var tipo=tipobien.substr(tipobien.indexOf('@')+1,totalchar);
    var prefix=tipobien.substr(0,tipobien.indexOf('@'));
    var patrimonial=document.getElementById("txt_codpatrimonial").value;
    var serie=document.getElementById("txt_serie").value;
    var codigointerno=document.getElementById("txt_codinterno").value;
    var docalta=document.getElementById("txt_docalta").value;
    var operativo=document.getElementById("sl_Operativo").value;
    var marca=document.getElementById("sl_Marca").value;
    var asignado=document.getElementById("sl_Asignacion").value;
    var estado=document.getElementById("sl_estado").value;
    var modurl = url+ "?limit="+ limit +"&offset=" + offset+"&tipo="+tipo+"&prefix="+prefix+"&patrimonial="+patrimonial+"&serie="+serie+"&codigointerno="+codigointerno+"&docalta="+docalta+"&operativo="+operativo+"&marca="+marca+"&asignado="+asignado+"&estado="+estado;
    http.open("GET", modurl, true);
    http.addEventListener('readystatechange', function() {
      if (http.readyState == 4) {
        if(http.status == 200) {
          var resultado = http.responseText;
          document.getElementById("tb_detalle_bienes").innerHTML = (resultado);
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
     get_bienes(20,(20*(index-1)));
 init_paginador(index);
}
function vertodos(){
//reniiciando selects
$('#sl_Operativo').val("*");
$('#sl_Marca').val("*");
$('#sl_estado').val("*");
$('#sl_Asignacion').val("*");
$('#sl_tipobien').val("*");
//limpiando imputs
$('#txt_docalta').val("");
$('#txt_codpatrimonial').val("");
$('#txt_codinterno').val("");
$('#txt_serie').val("");
search(1);
}
   function init_paginador(index){
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    }
    var url = '../get/get_pagination.php';
    var tipobien=document.getElementById("sl_tipobien").value;
    var totalchar=tipobien.length-(tipobien.indexOf('@')+1);
    var tipo=tipobien.substr(tipobien.indexOf('@')+1,totalchar);
    var prefix=tipobien.substr(0,tipobien.indexOf('@'));
    var patrimonial=document.getElementById("txt_codpatrimonial").value;
    var serie=document.getElementById("txt_serie").value;
    var codigointerno=document.getElementById("txt_codinterno").value;
    var docalta=document.getElementById("txt_docalta").value;
    var operativo=document.getElementById("sl_Operativo").value;
    var marca=document.getElementById("sl_Marca").value;
    var asignado=document.getElementById("sl_Asignacion").value;
    var estado=document.getElementById("sl_estado").value;
    var modurl = url+ "?tipo="+tipo+"&prefix="+prefix+"&patrimonial="+patrimonial+"&serie="+serie+"&codigointerno="+codigointerno+"&docalta="+docalta+"&operativo="+operativo+"&marca="+marca+"&asignado="+asignado+"&estado="+estado+"&pn="+index+"&page=bienes";
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

        function limpiarFormulario(formulario){
            $(formulario)[0].reset();
          }
          function  nuevoRegistro(){
            $('#mymodal').modal();
            limpiarFormulario('#formulario');
          }
function iniciarSelect(){
  $(".default-select2").select2({
      placeholder: "Seleccionar Tipo de Bien"
  })
}
