<?php 
// On va démarre les sessions
session_start();
require_once'config.php';

// On nva faire une vérification si ca existe
if(isset($_POST['email'])&& isset($_POST['mdp']))
{

    // Ensuite on va stocker les POST dans  htmlspecialchars remplace tous ces caractères par leur équivalent dans la chaîne string.
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    // On va faire un check vérifier si la personne est bien inscrite dans notre base
    $check =$bdd -> prepare('SELECT nom, prenom, email, mdp  FROM personnes WHERE email = ? ');
     
    $check -> execute(array($email));
    // On va stocker les données dans  data 
    $data=$check ->fetch();
    // Avec row on va vérifier si il exite dans la table 
    // :rowCount retourne le nombre de lignes affectées par la dernière requête DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement correspondant. 
    $row = $check->rowCount();
    if($row == 1){

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            // On va hacher le mp hash — Génère une valeur de hachage (empreinte numérique)
            // Nom de l'algorithme de hachage sélectionné (c'est-à-dire "md5", "sha256", "haval160,4", etc.)
            $mdp=hash('sha256', $mdp );

            // Pourquoi triple =  car avec les doubles pour vérifier des hash il y avais des fails
            if ( $data['mdp'] === $mdp){

                // On va créer une session 
                $_SESSION['user'] = $data['nom, prenom'];
                header('Location:landing.php');


            }else header('Location:index.php?Login_err=mdp');
        }else header('Location:index.php?login_err=email');
    }else header('Location:index.php?login_err=already');

}else header(('Location:index.php'))

?>