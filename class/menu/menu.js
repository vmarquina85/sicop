function construirMenu(){
  $.ajax({
    url:   '../get/get_menu.php',
    type:  'post',
      async: false, //tomar en cuenta xD
    success:  function (response) {
      document.getElementById('top-menu').innerHTML=response;
      }
  });
}
