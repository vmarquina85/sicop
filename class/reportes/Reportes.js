function GenerarReporte() {
  var div=document.getElementById("frm_param");
  var Parametros= new Array();
  parametros=ObtenerDatosdeform(div,1);
  var lt=document.getElementById('ltarget').options[document.getElementById('ltarget').selectedIndex].text;
  var at=document.getElementById('atarget').options[document.getElementById('atarget').selectedIndex].text;
  var ot=document.getElementById('otarget').options[document.getElementById('otarget').selectedIndex].text;
  // var arrayresultado=Query_Array(parametros,'../get/get_reporte.php');
  Query_Report(parametros,'../get/get_pdf_reporte.php',lt,at,ot);
}
