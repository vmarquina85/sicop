function opennp(tr){
  selectedIdUser=tr.getElementsByTagName('td')[1].innerHTML
  showModal("modal_permisos");
  limpiarFormulario("#frm_editar_permisos");
  obtenerPerfil(selectedIdUser.trim());
  obtenerPermiso(selectedIdUser.trim());
}
$('#cb_selectTodoPermisos').click(function(){
  if($(this).is(':checked')){
    $(".check").each(function(){
      $(this).prop('checked',true);
    });
  }else{
    $(".check").each(function(){
      $(this).prop('checked',false);
    });
  }
})

function NuevoUsuario(){
  var elemento=document.getElementById('mb_nu_usuario');
  if (validarVaciosIN(elemento) && validarPasw(elemento)) {
    // obtener datos
    var parametros = {
      "funcionario" : document.getElementById("inpt_nu_func").value,
      "login" : document.getElementById("inpt_nu_usr_login").value,
      "nivel":document.getElementById('inpt_nu_nivel').value,
      "passwrd":document.getElementById('inpt_nu_psw').value
    };
    $.ajax({
      data:  parametros,
      url:   '../insert/insertUsuario.php',
      type:  'post',
      async: true, //tomar en cuenta xD
      success:  function (response) {
        if (response=='0') {
          alert("El Login ingresado ya existe!. Registre uno distinto");
        }else{
          alert("Usuario Registrado con Exito");
          search(1);
        }
      }
    })
  }
}
// function autocompletarLogin(){
//   document.
// }
function actualizarUsuarioPermisos(){
  //1.- borara los permisos actuales del usuario
  BorrarPermisosActuales(selectedIdUser.trim());
  //1.- obtener los cambios
  // 1.1 obtener valor del nivel (comboBox)
  var nivel=document.getElementById('edit_sl_perfil').value;
  // actualizarNivel(nivel);
  // 1.2 obtener valor de permisos
  var table=document.getElementById('tab_permisos');
  var tableRows=table.rows.length;
  for (var i = 1; i < tableRows; i++) {
    var object=table.rows[i].getElementsByTagName('td')[4].children[0];
    if (object.checked) {
      var menu_id=object.value.substr(0,object.value.indexOf("-"));
      var submenu_id=object.value.substr(object.value.indexOf("-")+1,object.value.length-(object.value.indexOf("-")+1));
      //2.- actualizar BD
      insertarPermisosNuevos(menu_id,submenu_id,selectedIdUser.trim(),nivel);
    }
  }
  alert("Permisos y Nivel Modificados con Exito");
  construirMenu();
}
function obtenerPermiso(id_usr){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_permisos.php';
  var modurl = url+ "?user="+ id_usr.trim();
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("permisos_detalle").innerHTML = (resultado);
      }
    }
  });
  // http.onreadystatechange = useHttpResponseDistritoPac;
  http.send(null);
}
function obtenerPerfil(id_usr){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_nivel.php';
  var modurl = url+ "?user="+ id_usr.trim();
  http.open("GET", modurl, false);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("edit_sl_perfil").value = (resultado);
      }
    }
  });
  // http.onreadystatechange = useHttpResponseDistritoPac;
  http.send(null);
}
function nuevoRegistro(){
  var elemento=document.getElementById('mb_nu_usuario');
  LimpiarbyDIV(elemento);
  showModal('modal_nuevo_usuario');

}
function showModal(id_modal){
  $("#"+id_modal+"").modal();
}
function get_usuarios(limit,offset){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_usuarios.php';
  var parametro=document.getElementById("inputParametro").value;
  var modurl = url+ "?limit="+ limit +"&offset=" + offset+"&parametro="+parametro;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tb_detalle_usuarios").innerHTML = (resultado);
      }
    }
  });
  // http.onreadystatechange = useHttpResponseDistritoPac;
  http.send(null);
}
function get_usuarios(limit,offset){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_usuarios.php';
  var parametro=document.getElementById("inputParametro").value;
  var modurl = url+ "?limit="+ limit +"&offset=" + offset+"&parametro="+parametro;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById("tb_detalle_usuarios").innerHTML = (resultado);
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
  get_usuarios(10,(10*(index-1)));
  init_paginador(index);
}
function init_paginador(index){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url = '../get/get_paginador.php';
  var parametro=document.getElementById("inputParametro").value;

  var modurl = url+ "?parametro="+parametro+"&pn="+index;
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

function activarUsuario(tr){

  if (confirm("Está seguro que desea Activar este Usuario?")) {
    var id_usr=tr.getElementsByTagName('td')[1].innerHTML;
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    }
    var url = '../update/usuariosUpdateActivar.php';
    var modurl = url+ "?id_usr="+ id_usr.trim();
    http.open("GET", modurl, false);
    http.send(null);
    alert('Usuario Activado');
    get_usuarios(10,0);
    init_paginador(1);
  }
}
function desactivarUsuario(tr){
  if (confirm("Está seguro que desea Desctivar este Usuario?")) {
    var id_usr=tr.getElementsByTagName('td')[1].innerHTML;
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    }
    var url = '../update/usuariosUpdateDesactivar.php';
    var modurl = url+ "?id_usr="+  id_usr.trim();
    http.open("GET", modurl, false);
    http.send(null);
    alert('Usuario Desactivado');
    get_usuarios(10,0);
    init_paginadorx(1);
  }
}
function obtenerObject(object){
  fila=object.closest('tr');
}
function limpiarFormulario(formulario){
  $(formulario)[0].reset();
}
function BorrarPermisosActuales(id_user){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url='../delete/deletePermisos.php';
  var modurl = url+ "?iduser="+ id_user;
  http.open("GET", modurl, false);
  http.send(null);
}
function insertarPermisosNuevos(menu_id,submenu_id,id_user,nivel){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var url='../insert/insertPermisos.php';
  var modurl = url+ "?iduser="+ id_user + "&menu_id="+ menu_id + "&submenu_id="+ submenu_id+ "&nivel="+ nivel;
  http.open("GET", modurl, false);
  http.send(null);
}
