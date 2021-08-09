<?php
session_start();
require "config.php";
if (isset($_GET['idPersonne']) and !empty($_GET['idPersonne']) and isset($_GET['cle']) and !empty($_GET['cle'])) {
    // Si l'idPersonne et la clé correspond à un utilisateur, on va confirme l'existante de l'users

    $getidPersonne = $_GET['idPersonne'];
    $getcle = $_GET['cle'];
    $recupUser = $bdd->prepare('SELECT *FROM personnes WHERE idPersonne= ? AND cle =?');
    $recupUser->execute(array($getidPersonne, $getcle));
    if ($recupUser->rowCount() > 0) {
        $userInfo = $recupUser->fetch();
        // Le champs confirmer, si cette valeur est différente de 1 on la modifier si elle es egale à un on le redirige, on déclare une seesions cle = à clé 
        // Si la valeur n'est pas égale a 1 on modifie la confirmation au niveau de la table.  
        if ($userInfo['confirme'] != 1) {
            $updateConfirmation = $bdd->prepare('UPDATE personnes SET confirme = ? WHERE idPersonne=?');
            $updateConfirmation->execute(array(1, $getidPersonne));
            $_SESSION['cle'] = $getcle;
            header('Location: accueil.php');
        } else {
            $_SESSION['cle'] = $getcle;
            header('Location: accueil.php');
        }
    } else {
        echo "Votre clé ou indentifiant est incorrect";
    }
} else {
    echo "Aucun utilisateur trouvé";
}
?>