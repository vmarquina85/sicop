function GenerarReporte() {
  var div=document.getElementById("frm_param");
  var Parametros= new Array();
  parametros=ObtenerDatosdeform(div,1);
    var ut=document.getElementById('utarget').options[document.getElementById('utarget').selectedIndex].text;
  var lt=document.getElementById('ltarget').options[document.getElementById('ltarget').selectedIndex].text;
  var at=document.getElementById('atarget').options[document.getElementById('atarget').selectedIndex].text;
  var ot=document.getElementById('otarget').options[document.getElementById('otarget').selectedIndex].text;
  // var arrayresultado=Query_Array(parametros,'../get/get_reporte.php');
document.getElementById('VisorReporte').innerHTML=Query_Report(parametros,'../get/get_pdf_reporte.php',ut,lt,at,ot);

}
function GenerarReporte_excel() {
  var div=document.getElementById("frm_param");
  var Parametros= new Array();
  parametros=ObtenerDatosdeform(div,1);
    var ut=document.getElementById('utarget').options[document.getElementById('utarget').selectedIndex].text;
  var lt=document.getElementById('ltarget').options[document.getElementById('ltarget').selectedIndex].text;
  var at=document.getElementById('atarget').options[document.getElementById('atarget').selectedIndex].text;
  var ot=document.getElementById('otarget').options[document.getElementById('otarget').selectedIndex].text;
  // var arrayresultado=Query_Array(parametros,'../get/get_reporte.php');
  window.open(Query_Report_excel(parametros,'../get/xls_exportar_reporte.php',ut,lt,at,ot));

}
