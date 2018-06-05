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
function seleccionar(objeto){
  var button =objeto.getElementsByTagName('I');
  $(button).toggleClass('hover-green');
  fila=objeto.closest('tr');
  $(fila).toggleClass('success');
}
function nuevo() {
  $('select, .bootstrap-select,button').each(function(){
    $(this).removeAttr('disabled');
    $(this).removeClass('disabled');
  });
  $('#sl_local').data('selectpicker').$button.focus()
$('')
};
