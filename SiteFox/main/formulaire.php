<?php
require "PHPMailer/PHPMailerAutoload.php";
require "config.php";
session_start();



if(isset($_POST['valider'])){
    //verifier si il a bien rentrée l'email
    if(!empty($_POST['email'])){
        $cle = rand(1000000, 9000000);
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $prenom= $_POST['prenom'];
        $mdp = sha1($_POST['mdp']);

        $insererUser= $bdd->prepare('INSERT INTO personnes(nom, prenom, email,mdp, cle, confirme) VALUES (?, ?, ?, ?, ? , ?) ');
        //Statut confirme à 0 s'il es bien confirme il sera mis à 1
        $insererUser->execute(array($nom, $prenom,  $email,$mdp, $cle, 0));
        // recupérer lid de l'utilisateur insérer
        $recupUser = $bdd->prepare('SELECT * FROM personnes WHERE email = ?');
        $recupUser->execute(array($email));
        // une session est une variable global, qui va transisté qu'on va pouvoir récupérer au niveau des pages pour laisser l'utilisateur authentifier
     
        if($recupUser->rowCount()>0){
            $userInfos = $recupUser->fetch();
            $_SESSION['idPersonne'] = $userInfos['idPersonne'];
            $id = $bdd->lastInsertId();

            function smtpmailer($to, $from, $from_name, $subject, $body)
            {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true; 
                    //SSL pour gmail
                $mail->SMTPSecure = 'ssl'; 
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->Username = 'marie.blanc.1996@gmail.com';
                $mail->Password = 'Emilie04!';   
        
        //   $path = 'reseller.pdf';
        //   $mail->AddAttachment($path);
        
                $mail->IsHTML(true);
                $mail->From="marie.blanc.1996@gmail.com";
                $mail->FromName=$from_name;
                $mail->Sender=$from;
                $mail->AddReplyTo($from, $from_name);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($to);
                if(!$mail->Send())
                {
                    $error ="Please try Later, Error Occured while Processing...";
                    return $error; 
                }
                else 
                {
                    $error = "Thanks You !! Your email is sent.";  
                    return $error;
                }
            }
            
            $to   = $email;
            $from = 'marie.blanc.1996@gmail.com';
            $name = "Fox's Cellar";
            $subj = 'Email de confirmation de compte';
            $lien = 'http://localhost/vin/verif.php?idPersonne='.$_SESSION['idPersonne'].'&cle='.$cle;
            $msg = ' <div style ="background: url(../img/parallax/backgroundFlou.png);"> <a style ="color:#DCC298; text-decoration: none; text-align: center; font-weight: 900; font-size: large;"id ="confirmationEmail" href="'.$lien.'">Confimer votre email</a></div>';
            // $msg = 'http://localhost/vin/verif.php?id='.$_SESSION['id'].'&cle='.$cle.;
            
            $error=smtpmailer($to,$from, $name ,$subj, $msg);
           
        

        }else{
                echo "Veuillez rentrez tous les champs";
            }

    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/formulaire.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script defer src="assets/js/formulaire.js"></script>
    <title>Fox's Cellar: Formulaire</title>
</head>

<body>
    <div class="height-100vh bg-gradient-1" data-bg-animate="on">
        <!-- Va contenir tout mon formulaire -->
        <main>
            
            <header>
            </header>
            <?php
            if (isset($_GET['reg_err'])) {
                // Ne jamais faire confiance à l'utilisateur maximisé la sécurité
                $err =  htmlspecialchars($_GET['reg_err']);

                switch ($err) {
                    case ' success':
            ?>
                        <div class=" alert alert-success">
                            <strong> Succès</strong> L'inscription est réussie.
                        </div>
                    <?php
                        break;
                    case 'mp':
                    ?>
                        <div class="alert alert-danger">
                            <strong> Erreur</strong> Le mot de passe est différent.
                        </div>
                    <?php
                        break;
                    case 'email':
                    ?>
                        <div class="alert alert-danger">
                            <strong> Erreur</strong> L'email n'est pas valide.
                        </div>

                        <?php
                        break;
                    case 'email_length':
                    ?>
                        <div class="alert alert-danger">
                            <strong> Erreur</strong> L'email est trop long.
                        </div>

                        <?php
                        break;
                    case 'nom_length':
                    ?>
                        <div class="alert alert-danger">
                            <strong> Erreur</strong> Le nom est trop long.
                        </div>

                        <?php
                        break;
                    case 'prenom_length':
                    ?>
                        <div class="alert alert-danger">
                            <strong> Erreur</strong> Le prénom est trop long.
                        </div>

                        <?php
                        break;
                    case 'already':
                    ?>
                        <div class="alert alert-danger">
                            <strong> Erreur</strong> Le compte existe déjà.
                        </div>
            <?php
                        break;
                }
            }
            ?>
        
            <form action="" method="post">
                <div class="page" id="page1">
                    <h1>Identité</h1>
                    <div>
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom">
                    </div>
                    <div>
                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" id="prenom">
                    </div>
                    <button class="next" type="button">Suivant</button>
                    <button class="prev" type="button">Précédent</button>

                </div>
                <div class="page" id="page2">
                    <h1>Identifiant</h1>
                    <div>
                        <label for="email">Email : </label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div>
                        <label for="mdp">Mot de passe :</label>
                        <input type="text" name="mdp" id="mdp">
                    </div>
                    <div>
                        <label for="mdp">Re-tapez votre Mot de passe :</label>
                        <input type="text" name="mdp_retype" id="mdp">
                    </div>
                    <button class="prev" type="button">Précédent</button>
                    <input type="submit" name="valider">
                </div>
            </form>
        </main>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>

</html>