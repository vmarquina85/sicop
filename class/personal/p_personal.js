function personalSelect(limit,offset){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var nombre=document.getElementById('txt_Nombre').value;
  var apepat=document.getElementById('txt_Paterno').value;
  var apemat=document.getElementById('txt_Materno').value;
  var dependencia=document.getElementById('sl_Operativo').value;
  var url = '../get/get_personal.php?nombre='+nombre+'&apepat='+apepat+'&apemat='+apemat+'&dependencia='+dependencia+'&offset='+offset+'&limit='+limit;
  var modurl = url;
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tb_detallePersonal").innerHTML = (resultado);
      };
    };
  });
  http.send(null);
}
function fn_obtenerProvincia(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
var  id_departamento=document.getElementById('selectDepartamento').value;
var url='../get/get_provincia.php?id_dep='+id_departamento;
  http.open("GET", url, false);
  http.addEventListener('readystatechange',function(){
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
          document.getElementById("selectProvincia").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}

function fn_obtenerDistrito(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
var  id_provincia=document.getElementById('selectProvincia').value;
var url='../get/get_distrito.php?id_prov='+id_provincia;
  http.open("GET", url, false);
  http.addEventListener('readystatechange',function(){
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
          document.getElementById("selectDistrito").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
function limpiarFormulario(formulario){
  $(formulario)[0].reset();
}

function  nuevoRegistro(){
  $('#mymodal').modal();
  limpiarFormulario('#formulario');
}
function f_NuevoFuncionario() {
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
var Nombre=document.getElementById('inputNombre').value;
var ApePat=document.getElementById('inputApePat').value;
var ApeMat=document.getElementById('inputApeMat').value;
var Dni=document.getElementById('inputDni').value;
var Ruc=document.getElementById('inputRuc').value;
var FecNac=document.getElementById('inputFecNac').value;
var Sexo=document.getElementsByName('radioSexo').value;
var Direccion=document.getElementById('inputDireccion').value;
var Departamento=document.getElementById('selectDepartamento').value;
var Provincia=document.getElementById('selectProvincia').value;
var Distrito=document.getElementById('selectDistrito').value;
var Telefono=document.getElementById('Telefono').value;
var Celular=document.getElementById('Celular').value;
var EstadoCivil=document.getElementById('selectEstadoCivil').value;
var Grado=document.getElementById('SelectGrado').value;
var Profesion=document.getElementById('selectProfesion').value;
var Dependncia=document.getElementById('selectLugarActual').value;
var Area=document.getElementById('selectArea').value;
var Oficina=document.getElementById('selectOficina').value;
var Cargo=document.getElementById('selectCargo').value;
  var url = '../insert/insertFuncionarios.php';
  var modurl = url+ '?Nombre='+Nombre+'&ApePat='+ApePat+'&ApeMat='+ApeMat+'&Dni='+Dni+'&Ruc='+Ruc+'&FecNac='+FecNac+'&Sexo='+Sexo+'&Direccion='+Direccion+'&Departamento='+Departamento+'&Provincia='+Provincia+'&Distrito='+Distrito+'&Telefono='+Telefono+'&Celular='+Celular+'&EstadoCivil='+EstadoCivil+'&Grado='+Grado+'&Profesion='+Profesion+'&Dependncia='+Dependncia+'&Area='+Area+'&Oficina='+Oficina+'&Cargo='+Cargo;
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



function init_paginador(index){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_pagination.php';
  var nombre=document.getElementById('txt_Nombre').value;
  var apepat=document.getElementById('txt_Paterno').value;
  var apemat=document.getElementById('txt_Materno').value;
  var dependencia=document.getElementById('sl_Operativo').value;
  var modurl = url+ '?nombre='+nombre+'&apepat='+apepat+'&apemat='+apemat+'&dependencia='+dependencia+'&pn='+index+'&page=personal';
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
function search(index){
  if (index<1) {
    index=1;
  }
  personalSelect(20,(20*(index-1)));
  init_paginador(index);
}
function iniciarSelect(){
  $(".default-select2").select2({
    placeholder: "Seleccionar Tipo de Bien"
  })
}
function fn_get_provincia() {
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_provincia.php';
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("selectProvincia").innerHTML = (resultado);
      }
    }
  });
  // http.onreadystatechange = useHttpResponseDistritoPac;
  http.send(null);
}
function fn_obtenerAreas(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
var  id_dep=document.getElementById('selectLugarActual').value;
var url='../get/get_area.php?id_dep='+id_dep;
  http.open("GET", url, false);
  http.addEventListener('readystatechange',function(){
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
          document.getElementById("selectArea").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
function fn_obtenerOficina(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
var  id_dep=document.getElementById('selectLugarActual').value;
var  id_area=document.getElementById('selectArea').value;
var url='../get/get_oficina.php?id_dep='+id_dep+'&area='+id_area;
  http.open("GET", url, false);
  http.addEventListener('readystatechange',function(){
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
          document.getElementById("selectOficina").innerHTML = (resultado);
      }
    }
  });
  http.send(null);
}
