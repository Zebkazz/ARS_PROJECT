<?php
	session_start();
	if(session_status()!=2 or $_SESSION['aut']!='Gru"@~"¿.,ÑZebkazz//{'){
		session_destroy();
		header("Location: /accounting_record_software/index.php");
		exit();
	}
?>