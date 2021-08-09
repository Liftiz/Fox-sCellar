<?php
session_start();
require "config.php";

if (!isset($_SESSION["user"])) {
  echo "Il faut etre connecter pour avoir acces a la wishlist.";
  exit;
}

$idPersonne = (int) $_SESSION["user"]["idPersonne"];
// Ici tu as l'id du vin quand on clique sur le a dans l'autre page(page vin.php)
$idVin = null;

// Si on a l'id definit dans l'url
if (isset($_GET["id"])) {
  // alors on change la valeur de $idVin qui de base etait null
  $idVin = (int) $_GET['id'];
}
//Exécute une requete: on selectionne tout de la table wishlist avec l'id de la session de l'utilisateur et on récupère une ligne de 
// résultat sous forme de tableau 
$caveListVins = $bdd->query('SELECT * FROM cave WHERE idPersonne=' . $idPersonne)->fetchAll(PDO::FETCH_ASSOC);
$insertNewVin = true;
foreach ($caveListVins as $cave) {
  if ($insertNewVin) {
    //var_dump($wish);
    if ((int) $cave["idVins"] == $idVin) $insertNewVin = false;
  }
}


if ($insertNewVin) {
  $bdd->prepare("INSERT INTO cave(idPersonne, idVins) VALUES(?, ?)")->execute(array($idPersonne, $idVin));
}

$cave =  $bdd->query('SELECT * FROM cave WHERE idPersonne=' . $idPersonne);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    document.getElementsByTagName("html")[0].className += " js";
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
  <link id="codyframe" rel="stylesheet" href="assets/css/cave_wish.css">
  <link rel="manifest" href="manifest.webmanifest">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <title>Fox's Cellar: Ma Cave</title>
</head>
<body>
  <div class="height-100vh bg-gradient-1" data-bg-animate="on">
  <?php
     include 'nav.php';

      ?>
    <h1 class="H1"> Ma Cave</h1>
  
      <?php
      while ($donnees = $cave->fetch()) {
        $vin = $bdd->query("SELECT * FROM vins WHERE idVins=" . $donnees['idVins'])->fetch();
        if (!isset($vin)) continue;
      ?>

          <div id="card">
          <div class="flip-card-container" style="--hue: 220">

  <div class="flip-card">

    <div class="card-front">
      <figure>
        <div class="img-bg"></div>
        <img src="<?php echo $vin["image"]; ?>" alt="image">
        <figcaption><?php echo $vin["titre"]; ?></figcaption>
      </figure>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
        <img src="<?php echo $vin["image"]; ?>" alt=" image vin ">
      </figure>

      <button class="supp"><a href="delete.php?idCave=<?php echo $donnees['idCave'] ?>">Supprimer</a></button>

      <div class="design-container">
        <span class="design design--1"></span>
        <span class="design design--2"></span>
        <span class="design design--3"></span>
        <span class="design design--4"></span>
        <span class="design design--5"></span>
        <span class="design design--6"></span>
        <span class="design design--7"></span>
        <span class="design design--8"></span>
      </div>
    </div>

  </div>
</div>
     </div>  

      <?php

      }

      ?>
    </ul>
  </div>
  <!-- flip-card-container -->

<!-- /flip-card-container -->


  <script src="assets/js/scripts.js"></script>
</body>

</html>