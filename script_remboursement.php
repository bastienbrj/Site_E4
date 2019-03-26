<?php

try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}

$paiKm = $_POST['km'];
$paiIndemnite = $_POST['indemnite'];

$req = $bdd->prepare('INSERT INTO paiement(pai_indemnite, pai_remboursement)');


?>