<?php
$erreur = "";
session_start();
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}
    $num = $_POST['pers_id'];
    $mdp = $_POST['pers_mdp'];

    if(!empty($num) AND !empty($mdp)){
        $req = $bdd->prepare("SELECT * FROM personnel WHERE pers_id = ? AND pers_mdp = ?");
        $req->execute(array($num, $mdp));
        $persexist = $req->rowCount();

        if($persexist == 1){
            $persinfo= $req->fetch();
            $_SESSION['pers_id'] = $persinfo[0];
            header ('Location: http://localhost/Site_E4/mission.php');
        } 
        else 
        {
            $erreur = "Identifiant ou mot de passe invalide !";
        }
    }
    else 
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
    echo $erreur;
?>