		function Ingresar () {

			var parametros = {
				"usuario" : document.getElementById("usuario").value,
				"password" : document.getElementById("password").value
			};
			$.ajax({
				 	data:  parametros,
				url:   '../class/login/login_cls.php',
				type:  'post',
				success:  function (response) {
					if (response.trim()=='yes') {
						window.location.href = '../pages/p_main.php';
					}else{
						document.getElementById("alert").innerHTML=response;

						$( "#alert" ).fadeIn(500, function() {
							setTimeout(function() {$('#alert').fadeOut(2000);
						},5000);

						});
					};



				}
			});

		}