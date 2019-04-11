<?php
if(!isset($_GET['pers_id']) || !isset($_GET['pers_mdp']))
$erreur = "";
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        $req = $bdd->prepare("SELECT pers_id FROM personnel WHERE pers_id = ? AND pers_mdp = ?");
        if($req->execute(array($_GET['pers_id'], $_GET['pers_mdp'])))
        {
            if($req->rowCount()==1){
                $lign = $req->fetch();
                echo $lign[0];
            }
            else{
                throw new Exception("Identifiant ou mot de passe incorrect");
            }
        }
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}
    
?>