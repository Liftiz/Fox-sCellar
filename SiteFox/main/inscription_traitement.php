<?php
    require_once'config.php';

    if(isset($_POST['nom'])&& isset($_POST['prenom'])&& isset($_POST['mdp'])&& isset($_POST['mdp_retype']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $mdp_retype = htmlspecialchars($_POST['mdr_retype']);

        $check =$bdd -> prepare('SELECT nom, prenom, email, mdp  FROM personnes WHERE email = ? ');
     
        $check -> execute(array($email));
        // On va stocker les données dans  data 
        $data=$check ->fetch();
        // Avec row on va vérifier s'il existe dans la table 
        // :rowCount retourne le nombre de lignes affectées par la dernière requête DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement correspondant. 
        $row = $check->rowCount();

        // N'est pas dans la bdd
        if($row== 0){

            // Vérification: le nom moins de 100 caractère, email valide mdp égale
            // Strlen récupère la longueur de la chaine
            if(strlen($nom)<=100){
                if(strlen($email) <=100){

                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                        if($mdp == $mdp_retype){
                        
                            $mdp = hash('sha256', $mdp);
                            // 'REMOTE_ADDR'
                            // L'adresse IP du client qui demande la page courante. 
                            $ip = $_SERVER['REMOTE_ADDR'];
                            

                            // Inserer dans la bdd 
                            $insert = $bdd -> prepare('INSERT INTO personnes(nom, prenom, email, mp, ip) VALUES(:nom, :prenom, :email, :mp, :ip)');
                           //Les tableaux associatifs vont être différents des tableaux numérotés au sens où nous allons devoir définir chacune des clefs : 
                            //le PHP ne va pas ici pouvoir nommer automatiquement nos clefs.
                            $insert -> execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email, 
                                'mp' => $mp, 
                                'ip' => $ip
                            ));


                            header('Location:inscription.php?reg_err=success');
                        }else header('Location: inscription.php?reg_err=mdp');

                    }else header('Location: inscription.php?reg_err=email');

                }else header('Location: inscription.php?reg_err=email_lenght');

            }else header('Location: inscription.php?reg_err=pseudo_lenght');

        }else header('Location: inscription.php?reg_err=already');
    }
?>