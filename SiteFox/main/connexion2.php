<?php
session_start();
$_SESSION['user'];
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vignoble.css">
    <link rel="stylesheet" href="assets/css/connexion.css"> 
    <script src="assets/js/vanilla-tilt.js"></script>
    <title>Fox's Cellar: Connexion</title>
</head>
<body>
       <div id="connexion">
           <?php
            if(isset($_POST['valider'])){
              
                $mdp = sha1($_POST['mdp']);
                $recupMdp = $bdd->prepare('SELECT * FROM personnes WHERE  mdp = ? ');
                $recupMdp->execute(array( $mdp));
                if($recupMdp->rowCount()> 0){
                    $_SESSION['mdp'] = $mdp;
                }

                if(!empty($_POST['email'])){
                    // Requete préparer : cest une requête que tu vas définir (à l'avance). Cest comme si tu déclarer une fonction et dans cette fonction y a ta requête sql. 
                    //Cest pour éviter d'écrire à chaque fois la même requête. Tu crée une requête préparée 1 fois (avec ou sans paramètres) et ensuite tu l'appelle
                    $recupUser = $bdd->prepare('SELECT * FROM personnes WHERE email =?');
                    $recupUser->execute(array($_POST['email']));
                    if($recupUser->rowCount()> 0){
                        $userInfo = $recupUser->fetch();
                        if($userInfo['confirme']==1){
                            // header('Location: verif.php?id='.$userInfo['id'].'&cle='.$userInfo['cle']);
                            $_SESSION["user"] = $userInfo;
                          
                            header('Location: accueil.php');
                        
                        }else{
                            echo "<h3 style='width:450px; font-size: 22px; color:white' >Vous n'êtes pas confirmer au niveau du site</h3 >";
                        }
                        
                    }else{
                        echo " L'utilisateur n'existe pas";
                    }
                }else{
                    echo "Veuillez mettre votre email";
                }
            }

        ?>
<form class ="login-form " action="" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="mdp" name="mdp" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" name="valider" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"><a href="formulaire.php">Inscription</a></p>
    </div>

<script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".card"), {
		max: 25,
		speed: 400,
        glare: true,
        "max-glare": 1,
	});
	

</script>
</body>
</html>