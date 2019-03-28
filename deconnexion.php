<?php
    session_start();
	session_destroy();
	header('Location: http://localhost/Site_E4/index.php');
	exit();
?> 