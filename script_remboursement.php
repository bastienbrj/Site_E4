<?php
session_start();
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}
$missId = $_GET['id'];
$reqRemb = $bdd->query('UPDATE mission SET mis_rembourser = 1 WHERE mis_id = "'.$missId.'"');
header('Location: paiement.php');
?>