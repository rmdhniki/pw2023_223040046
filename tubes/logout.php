<?php
    require('function.php');

	if(isset($_SESSION)) {
		session_destroy();
	}
    
	echo "<meta http-equiv='refresh' content='0; url=./'>";
?>