window.onload = function(){
  killerSession();
}
var idleTime=0;
function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 19) { // 20 minutes
  window.open('../class/login/logout_cls.php','_top');
    }
}

 function killerSession(){
   //Increment the idle time counter every minute.
      var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

      //Zero the idle timer on mouse movement.
      $(this).mousemove(function (e) {
          idleTime = 0;
      });
      $(this).keypress(function (e) {
          idleTime = 0;
      });


}
