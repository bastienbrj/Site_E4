    
<?php
session_start();
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}
$missId = $_GET['id'];
$reqMisValid = $bdd->query('UPDATE mission SET mis_valider = 1 WHERE mis_id = "'.$missId.'"');
header('Location: validation.php');
?>