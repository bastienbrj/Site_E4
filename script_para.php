<?php

try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}

$villeDeb = $_POST['distance1'];
$villeFin = $_POST['distance2'];
$distKm = $_POST['distKm'];

var_dump($villeDeb);
var_dump($distKm);
var_dump($villeFin);

$req = $bdd->prepare('INSERT INTO distance(dist_Villedeb, dist_Villefin,dist_km) VALUES (:villeDeb,:villeFin,:distKm)');
$req->bindValue(':villeDeb', $villeDeb, PDO::PARAM_INT);
$req->bindValue(':villeFin', $villeFin, PDO::PARAM_INT);
$req->bindValue(':distKm', $distKm, PDO::PARAM_INT);
$req->execute();

?>