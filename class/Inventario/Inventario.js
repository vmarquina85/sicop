var date=new Date();
var fecha=date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
var popupElement = '<div class="btn-group btn-toggle"><button class="btn btn-warning"><i class="fa fa-warning"></i> <br>Revisar</button><button onclick="seleccionar(this)" class="btn btn-success active"><i class="fa fa-check"></i><br> OK</button></div>';
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
        $("[data-toggle=popover]").popover(
          {
              animation: true,
              content: popupElement,
              html: true
          }
        );
      }
    }
  });
  http.send(null);
}
function seleccionar(objeto){
  var button =objeto.getElementsByTagName('I');
  $(button).toggleClass('hover-green');
  fila=objeto.closest('tr');
  $(fila).toggleClass('success');
}
function nuevo() {
removeDisabled('select, .bootstrap-select,button');
  $('#sl_local').data('selectpicker').$button.focus();
  $('#input_fecha_inv').val(fecha);
};
