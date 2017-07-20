function construirMenu(){
  $.ajax({
    url:   '../get/get_menu.php',
    type:  'post',
    success:  function (response) {
      document.getElementById('nav_menu').innerHTML=response;
      }
  });
}
