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
//  $(formulario)[0].reset();
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
function eliminarBien(objeto){
  if (confirm("Está seguro que desea eliminar este bien?")) {
    resultado=obtener_detalle(objeto);
    if (resultado[0].papeleta!='S'){
      fila=objeto.closest('tr');
      var id_patrimonial=fila.getElementsByTagName('td')[4].innerHTML;
      var causal=document.getElementById('ta_causal').value;
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var url = '../update/bienesUpdateEliminar.php';
      var modurl = url+ "?id_patrimonial="+ id_patrimonial+"&causal="+causal;

      http.open("GET", modurl, false);
      http.send(null);
      alert('El Bien ha sido Eliminado');
      get_bienes(20,0);
      init_paginador(1);
    }else{
      alert('No se puede eliminar el registro, existen papeletas relacionadas a este');
    }
  }
}
function obtener_detalle(objeto){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  fila=objeto.closest('tr');
  var resultado;
  var codigoPatrimonial=fila.getElementsByTagName('td')[4].innerHTML;
  var url = "../get/get_papeletaBien.php?id_patrimonial="+codigoPatrimonial;
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
function AlertEliminar(objeto){
  fila=objeto.closest('tr');
  $("#alertform")[0].reset();
  $('#alert').modal();
}
function AlertBaja(objeto){
  fila=objeto.closest('tr');
  $("#alertform2")[0].reset();
  $('#alert2').modal();
}
function BajaBien(objeto){
  if (confirm("Está seguro que desea dar de BAJA a este bien?")) {
    // resultado=obtener_detalle(objeto);
    // if (resultado[0].papeleta!='S'){
    fila=objeto.closest('tr');
    var id_patrimonial=fila.getElementsByTagName('td')[4].innerHTML;
    var causal=document.getElementById('sl_causalBaja').value;
    var fechabaja=document.getElementById('txt_fechaBaja').value;
    var resbaja=document.getElementById('txt_resBaja').value;
    var docbaja=document.getElementById('txt_docBaja').value;


    if (causal=='' || fechabaja=='' || resbaja=='' || docbaja=='') {
      alert('Datos Incompletos, verifique!')
    }else{
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var url = '../update/bienesUpdateBaja.php';
      var modurl = url+ "?id_patrimonial="+ id_patrimonial+"&fecha_resol="+fechabaja+"&causal="+causal+"&resol_baja="+resbaja+"&doc_sbn="+docbaja;
      http.open("GET", modurl, false);
      http.send(null);
      alert('El bien ha sido dado de Baja');
     $('#alert2').modal('toggle');
      get_bienes(20,0);
      init_paginador(1);
    }




  }
}
function AltaBien(objeto){
  if (confirm("¿Dar de Alta a este Bien?")) {
    // resultado=obtener_detalle(objeto);
    // if (resultado[0].papeleta!='S'){
    fila=objeto.closest('tr');
    var id_patrimonial=fila.getElementsByTagName('td')[4].innerHTML;
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    }
    var url = '../update/bienesUpdateALta.php';
    var modurl = url+ "?id_patrimonial="+ id_patrimonial;
    http.open("GET", modurl, false);
    http.send(null);
    alert('El bien ha sido dado de Alta');
    get_bienes(20,0);
    init_paginador(1);
    // }else{
    //   alert('No se puede dar de Baja el registro, existen papeletas relacionadas a este');
    // }
  }
}
function LlenarDatosBien(){
  var prefix=(document.getElementById('txt_bienDescripcion').value).substring(0,8);
  document.getElementById('txt_prefix').value=prefix;
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var resultado;
  var url = "../get/get_grupoClase.php?prefix="+prefix;
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
  document.getElementById('txt_grupo').value=resultado[0].grupo;
  document.getElementById('txt_clase').value=resultado[0].clase;
}
function ObtenerCuentas(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var tipo_cta=document.getElementById('sl_tipoCuenta').value;
  var rtipocta;
  var radiobutton=document.getElementsByName('rtipocta');
  for(var i=0;i<radiobutton.length;i++)
       {
           if(radiobutton[i].checked)
               rtipocta=radiobutton[i].value;
       }

       var url = "../get/get_lista_cuentas.php?tipo_cta="+tipo_cta+"&rtipocta="+rtipocta;
       http.open("GET", url, false);
       // Obtener Datos
       http.addEventListener('readystatechange', function() {
         if (http.readyState == 4) {
           if(http.status == 200) {
             var res = http.responseText;
          document.getElementById('cuenta').innerHTML=res;
           }
         }
       });
         http.send(null);
   }
