<?php
// On démarre la session
    session_start();
// On detruit les sessions :
	unset($_SESSION['pers_id'], $_SESSION['pers_mdp']);
// On redirige le visiteur vers la page désirée :
	header('Location: http://localhost/Site_E4/index.php');
	exit();
?>