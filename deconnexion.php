<?php
// On démarre la session
    session_start();
// On detruit la session
	session_destroy();
// On redirige le visiteur vers la page désirée 
	header('Location: http://localhost/Site_E4/index.php');
	exit();
?> 