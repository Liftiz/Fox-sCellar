<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <title>Formulaire</title>
    <link rel="stylesheet" href="assets/css/formulaire.css">
    <script defer src="assets/js/formulaire.js"></script>
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
        
            <form action="inscription_traitement.php" method="post">
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
                    <div>
                        <label for="date">Date de naissance :</label>
                        <input type="date" id="start" name="dateDeNaissance">
                    </div>
                    <button class="next" type="button">Suivant</button>
                    <button class="prev" type="button">Précédent</button>

                </div>
                <div class="page" id="page2">
                    <h1>Informations</h1>
                    <div>
                        <label for="adresse">Adresse :</label>
                        <input type="text" name="adresse" id="adresse">
                    </div>
                    <div>
                        <label for="cp">Code postal :</label>
                        <input type="text" name="cp" id="cp">
                    </div>
                    <div>
                        <label for="ville">Ville :</label>
                        <input type="text" name="ville" id="ville">
                    </div>
                    <button class="next" type="button">Suivant</button>
                    <button class="prev" type="button">Précédent</button>
                </div>
                <div class="page" id="page3">
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
                    <button>Terminer</button>
                </div>
            </form>
        </main>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>

</html>