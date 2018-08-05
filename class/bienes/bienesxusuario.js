function ObtenerSeleccion(table){
  var seleccion= Array();
  var selected=0;
  elemento=document.getElementById(table);
  var rows= elemento.getElementsByTagName('TR');
  //1.- recorrer las filas que tengan la class warning
  for (var i = 0; i < rows.length; i++) {
    if (rows[i].className.indexOf("warning")>=0) {
      selected=selected+1;
      seleccion.push(i);
    }
  }
  if (selected===0) {
    alert('No hay Papeletas Seleccionadas')
    return 0;
  }else{
    var array=Array(selected);
    //3.- obtener nro y id_patrimonial de estas filas y guardarlos en la matriz
    for (var i = 0; i < seleccion.length; i++) {
      array[i]=rows[seleccion[i]].getElementsByTagName("td")[2].innerHTML;
    }
  }
        return array;
}
function AceptarPapeletas(){
  if (confirm("Está seguro que desea Aceptar estas Papeletas?")) {
    respuesta='A';
    var selecciones=ObtenerSeleccion('table-pendientes');
    if (selecciones===0) {
      return;
    }else{
      for (var i = 0; i < selecciones.length; i++) {
        ActualizarPapeletas(selecciones[i],respuesta);
      }
      alert("las papeletas fueron aceptadas");
      loading($('#panelPendientes'));
      bienesPendientes();
      endLoading($('#panelPendientes'));
      loading($('#panelAsignados'));
      bienesAsignados();
      endLoading($('#panelAsignados'));
      //inicializarDatatables();
    }
  }
}
function RechazarPapeletas(){
  if (confirm("Está seguro que desea Rechazar estas Papeletas?")) {
    respuesta='R';
    var selecciones=ObtenerSeleccion('table-pendientes');
    if (selecciones===0) {
      return;
    }else {
      for (var i = 0; i < selecciones.length; i++) {
        ActualizarPapeletas(selecciones[i],respuesta);
      }
      alert("las papeletas fueron Rechazadas");
      loading($('#panelPendientes'));
      bienesPendientes();
      endLoading($('#panelPendientes'));
      papeletasRechazadas();
    //  inicializarDatatables();
    }
  }
}
function ActualizarPapeletas(seleccion,rpta){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../update/pendientesUpdate.php';
  var parametro=seleccion;
  var modurl = url+ "?orden="+ parametro +"&respuesta="+rpta;
  http.open("GET", modurl, false);
  http.send(null);
}
function VerDetalles(objeto){
  fila=objeto.closest('tr');
  if (fila.className.indexOf("warning")>=0) {
    document.getElementById('btn_mod_seleccion').innerHTML='Quitar Selección';
  }else{
    document.getElementById('btn_mod_seleccion').innerHTML='Seleccionar';
  }
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_detallePapeleta.php';
  var parametro=fila.getElementsByTagName("td")[2].innerHTML;

  var modurl = url+ "?orden="+ parametro;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("detallePapeleta").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
  $('#modal_papeleta_detalle').modal();
}
function seleccionar(objeto){
  var button =objeto.getElementsByTagName('I');
  $(button).toggleClass('hover-green');
  fila=objeto.closest('tr');
  $(fila).toggleClass('warning');
}

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
function papeletasRechazadas(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_bienesxusuarioR.php';
  var modurl = url;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tab_rechazados").innerHTML = (resultado);
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

function loading(panel){
  if (!$(panel).hasClass('panel-loading')) {
    var targetBody = $(panel).find('.panel-body');
    var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
    $(panel).addClass('panel-loading');
    $(targetBody).prepend(spinnerHtml);
  }
}

function endLoading(panel){
  setTimeout(function () {
    $(panel).removeClass('panel-loading');
    $(panel).find('.panel-loader').remove();
  }, 2000);

}

function inicializarDatatables(){
  $('.dt').DataTable({
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      }
    }
  });
}
