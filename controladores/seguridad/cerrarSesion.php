<?php
	
	session_start();
	session_destroy();
	$_SESSION = null;
	echo "<script language=\"javascript\">
				window.location.href = \"../../vistas/index.php\"
			</script>";

?>