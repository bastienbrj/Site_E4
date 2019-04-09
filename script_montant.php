<?php
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}
$rembKm = $_POST['rembKm'];
$indHeb = $_POST['indHeb'];
if(empty($rembKm) || empty($indHeb)) {
    echo "Veuillez saisir tout les champs ! ";
    echo "<a href='parametrage.php'>Retour</a>";
}else{
    $req = $bdd->prepare('INSERT INTO paiement (pai_remboursement, pai_indemnite) VALUES (:rembKm,:indHeb)');
    $req->bindValue(':rembKm', $rembKm, PDO::PARAM_INT);
    $req->bindValue(':indHeb', $indHeb, PDO::PARAM_INT);
    $req->execute();
}
header('Location: parametrage.php');
?>