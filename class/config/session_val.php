		<?php 
		session_start();
		if (!isset($_SESSION["acceso"])) {
			header("location:../index.php");
			exit();
		}
		?>