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
   limpiarFormulario('#form_detaTecnico');
   limpiarFormulario('#datosBien');
   limpiarFormulario('#form_usuario');

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

  var url = "../get/get_grupoClase.php?prefix="+prefix;
  http.open("GET", url, false);
  // Obtener Datos
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var res = JSON.parse(http.responseText);
        datos= res;
      }
    }
  });
  http.send(null);
  document.getElementById('txt_grupo').value=datos[0].grupo;
  document.getElementById('txt_clase').value=datos[0].clase;
  id_tip=datos[0].id_tipo;
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
        document.getElementById('sl_CuentaContable').innerHTML=res;
      }
    }
  });
  http.send(null);
}
function ValidaSoloDec() {
  if ((event.keyCode >= 48) && (event.keyCode <= 57)) {
    event.returnValue = true;
  }else if(event.keyCode==46){
    event.returnValue = true;
  }else{
    event.returnValue = false;
  }
}
function ValidaSoloNumeros() {
  if ((event.keyCode < 48) || (event.keyCode > 57)) {
    event.returnValue = false;
  }
}
function llenarPersonalDestino(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var idpersonal= document.getElementById("sl_usuarioAsignado").value;
  var url = "../get/datosPersonalAsignado.php?idpersonal="+idpersonal;
  http.open("GET", url, true);
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

function crearBien(){
// var date= new Date();
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  //validando


  if (document.getElementById('txt_bienDescripcion').value==''){
        alert('Seleccione un tipo de bien');
        var div=document.getElementById('txt_bienDescripcion').closest('div');
        $(div).toggleClass('has-error');
        document.getElementById('txt_bienDescripcion').focus();
        return false;
  }else{
        var div=document.getElementById('txt_bienDescripcion').closest('div');
        $(div).removeClass('has-error');
  }

  if (document.getElementById('sl_tipoCuenta').value==''){
    alert('Seleccione un tipo de Cuenta');
    var div=document.getElementById('sl_tipoCuenta').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('sl_tipoCuenta').focus();
    return false;
  }else{
    var div=document.getElementById('sl_tipoCuenta').closest('div');
    $(div).removeClass('has-error');
  }

  if (document.getElementById('sl_CuentaContable').value==''){
    alert('Seleccione Cuenta Contable');
    var div=document.getElementById('sl_CuentaContable').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('sl_CuentaContable').focus();
    return false;
  }else{
    var div=document.getElementById('sl_CuentaContable').closest('div');
    $(div).removeClass('has-error');
  }


  if (document.getElementById('sl_formAdq').value==''){
    alert('Seleccione Forma de Adquisición');
    var div=document.getElementById('sl_formAdq').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('sl_formAdq').focus();
    return false;
  }else{
    var div=document.getElementById('sl_formAdq').closest('div');
    $(div).removeClass('has-error');
  }
  if (document.getElementById('txt_fechaAdq').value==''){
    alert('Seleccione Fecha de Adquisición');
    var div=document.getElementById('txt_fechaAdq').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('txt_fechaAdq').focus();
    return false;
  }else{
    var div=document.getElementById('txt_fechaAdq').closest('div');
    $(div).removeClass('has-error');
  }


  if (document.getElementById('txt_valoradq').value==''){
    alert('Digite Valor de Adquisición')
    var div=document.getElementById('txt_valoradq').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('txt_valoradq').focus();
    return false;
  }else{
    var div=document.getElementById('txt_valoradq').closest('div');
    $(div).removeClass('has-error');
  }



  if (document.getElementById('txt_valorlib').value==''){
    alert('Digite Valor en Libros')
    var div=document.getElementById('txt_valorlib').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('txt_valorlib').focus();
    return false;
  }else{
    var div=document.getElementById('txt_valorlib').closest('div');
    $(div).removeClass('has-error');
  }

  if (document.getElementById('sl_estadoBien').value==''){
    alert('Digite Valor en Libros')
    var div=document.getElementById('sl_estadoBien').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('sl_estadoBien').focus();
    return false;
  }else{
    var div=document.getElementById('sl_estadoBien').closest('div');
    $(div).removeClass('has-error');
  }

  if (document.getElementById('sl_usuarioAsignado').value==''){
    alert('Seleccione personal asignado')
    var div=document.getElementById('sl_usuarioAsignado').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('sl_usuarioAsignado').focus();
    return false;
  }else{
    var div=document.getElementById('sl_usuarioAsignado').closest('div');
    $(div).removeClass('has-error');
  }

  if (document.getElementById('sl_colorBien').value==''){
    alert('Seleccione un Color')
    var div=document.getElementById('sl_colorBien').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('sl_colorBien').focus();
    return false;
  }else{
    var div=document.getElementById('sl_colorBien').closest('div');
    $(div).removeClass('has-error');
  }



  if (!confirm("Se guardara el registro actual. Esta seguro de continuar?")){
    return false;
  }


  var denominacion=document.getElementById('txt_bienDescripcion').value.substr(10);
  var tipo_cta=document.getElementById('sl_tipoCuenta').value;
  var rtipocta;
  var radiobutton=document.getElementsByName('rtipocta');
  for(var i=0;i<radiobutton.length;i++)
  {
    if(radiobutton[i].checked)
    rtipocta=radiobutton[i].value;
  }
  var cuentaContable=document.getElementById('sl_CuentaContable').value;
  var formaAdq=document.getElementById('sl_formAdq').value;
  var fechaAdq=document.getElementById('txt_fechaAdq').value;
  var codigointerno=document.getElementById('txt_codinterno').value;
  var resoAlta=document.getElementById('txt_resAlta').value;
  var valorAdq=document.getElementById('txt_valoradq').value;
  var valorLib=document.getElementById('txt_valorlib').value;
  var estadoBien=document.getElementById('sl_estadoBien').value;
  var asegurado=document.getElementById('cb_asegurado').value;
  var usuario=document.getElementById('sl_usuarioAsignado').value;
  var local=document.getElementById('sl_localAsignado').value;
  var area=document.getElementById('sl_areaAsignado').value;
  var oficina=document.getElementById('sl_oficinaAsignado').value;
  var marca=document.getElementById('sl_marcaBien').value;
  var modelo=document.getElementById('txt_modeloBien').value;
  var tipo=document.getElementById('txt_tipoBien').value;
  var dimension=document.getElementById('txt_dimension').value;
  var prefix=document.getElementById('txt_prefix').value;
  var color=document.getElementById('sl_colorBien').value;
  var serie=document.getElementById('txt_serieBien').value;
  var placa=document.getElementById('txt_placaBien').value;
  var motor=document.getElementById('txt_MotorBien').value;
  var chasis=document.getElementById('txt_chasisBien').value;
  var asegurado=document.getElementById('cb_asegurado');
  //alert(asegurado);
  if (asegurado.checked) {
    aseg='S'
  } else {
    aseg='N';
  }
  var observacion=document.getElementById('ta_observacionBien').value;
  var idpersonal= document.getElementById("sl_usuarioAsignado").value;
  var url = "../insert/insertDataBienes.php?id_pat="+prefix+"&id_tip="+id_tip+"&id_mar="+marca+"&id_personal="+usuario+"&serie="+serie
  +"id_col="+color+"&modelo="+modelo+"&id_est="+estadoBien+"&observa="+observacion+
  "&id_local="+local+"&id_area="+area+"&id_oficina="+oficina+"&tipo_cta="+tipo_cta+
  "&cuenta="+cuentaContable+"&forma_adq="+formaAdq+"&valor_libros="+valorLib+
  "&motor="+motor+"&chasis="+chasis+"&fecha_adq="+fechaAdq+"&placa="+placa+
  "&chkasegurado="+aseg+"&resol_alta="+resoAlta+"&tipo="+tipo+"&id_interno="+codigointerno+"&dime="+dimension+"&valor_adq="+valorAdq;
  http.open("GET", url, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText.trim();
        alert('Bien Registrado con Exito codigo Patrimonial > '+ prefix +'-'+resultado)
        document.getElementById("txt_correlativo").value = (resultado);
        $('#mymodal').modal('toggle');
      }
    }
  });
  http.send(null);
}
