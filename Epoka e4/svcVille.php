<?php
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $req= $bdd->prepare("SELECT * FROM ville order by Vil_Categorie, Vil_Nom");
    if($req->execute())
    {
        //$result ='[';
        foreach($req as $ligne)
        {
            $output[] = $ligne;

           // $result .= '{"id":"'.$ligne['Vil_Id'].'","nom":"'.$ligne['Vil_Nom'].'","cp":"'.$ligne['Vil_CP'].'"}';
        } echo json_encode($output);
        //$result .=']';
        //echo $result;
    }
}
    catch (Exception $expt){
        die("Erreur ".$expt->getMessage());
    }
?>