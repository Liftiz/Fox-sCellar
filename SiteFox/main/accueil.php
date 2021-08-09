<?php
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/parallax.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="manifest" href="manifest.webmanifest">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <script  src="assets/js/parallax.js"></script>
  <script  src="assets/js/toggle.js"></script>
  <script  src="assets/js/app.js"></script>
  <title>Fox's Cellar: Accueil</title>
</head>
  <body>

      <!-- Effet 3D -->
    <div class="container">
     
      <!-- Menu -->
      <?php
     include 'nav.php';

      ?>
      <div >
        <?php if(!isset($_SESSION["user"])) echo "<a id='connexion' href='connexion2.php'>Se connecter</a> "; else echo "<nav class='menu'>
		<section class='categorie'>
			<h3>Mon compte</h3>
			<ul>
				<li><a href='wishlist.php'>Wishlist</a></li>
				<li><a href='cave.php'>Ma Cave</a></li>
        <li><a href='deconnexion.php'>Déconnexion</a></li>
			</ul>
		</section>
	</nav>" ; ?>
      </div>
    <!-- Fin Menu -->
      <ul id="scene">
        <li class="layer" id="sol" data-depth=".1"><img  id="sol" src="assets/img/parallax/sol.png"></li>
        <li class="layer" id="cheshire" data-depth=".1"><object  class="block width-100%" data="assets/img/parallax/chat.svg" type="image/svg+xml"></object></li>
        <!-- <img src="assets/img/parallax/chat.svg"> -->


          <!-- Recommandation -->
        <h1>CHÂTEAU DE BELLET CUVÉE AGNÈS, ROUGE <br> AOP Bellet 2016</h1>
        <li class="layer" id="vin" data-depth=".1"><img id="tailleVin" src="assets/img/vins/Agnes_Rouge.png">
            <!-- Bulles de couleurs cliquable -->
          <div  id="degustation"></div>
          <div  id="vinos"></div>
          <div  id="cepage"></div>
          <div  id="terroire"></div>
          <div  id="accordsmets"></div>
        </li>

        <!-- Contenu des bulles  -->
        <div class="toggle" style="display: none" id="toggleDegustation" class="collapse in">
          <p>Couleur grenat violacé d’une très forte intensité. Le nez est puissant et révèle un fruité intense dominé par les myrtilles et lecassis.
             L’élevage reste très discret sur un léger boisé.
            La bouche est caractérisée par une attaque volumineuse, des notes fruitéesintenses et une matière puissante.</p>
        </div>
         

       <div class="toggle" style="display: none" id="toggleVins" class="collapse in">
          <p>Ébourgeonnage, tri sur grappe Récolte manuelle : rendement moyen de 25 hl/ha Sélection parcellaire Vinification : Macération pelliculaire à froid. Fermentation en fûts.
            Élevage : 18 mois en fûts de chêne de 500L>.</p>
       </div>
        

        <div class="toggle" style="display: none" id="toggleCepage" class="collapse in">
          <p>Superficie totale du vignoble : 10 ha dont 3.4 ha en productionde Rouge et Rosé Cépages : 100 % Folle NoireÂge moyen des vignes : 30 ans.</p>
        </div>
     

         <div class="toggle" style="display: none" id="toggleTerroire" class="collapse in">
           <p>Le souffle des vents marins et alpins offre un processus dematuration lent nécessaire à la fraîcheur et à l’élégance des vins deBellet, leur réservant un caractère presque septentrional.
             Le sol unique est constitué de poudingue : des galets du Pliocène etdu sable très clair traversé par quelques veines argileuses.</p>
         </div>
   

         <div class="toggle" style="display: none" id="toggleAccords" class="collapse in">
          <p>Filet de boeuf, daube de sanglier.</p>
        </div>

         <!-- Fin recommandation -->
      </ul>
    </div>
      <!-- Fin Effet -->
     
  

    <script>
      var scene = document.getElementById('scene');
      var parallax = new Parallax(scene);

      // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>

 
    <script src="assets/js/scripts.js"></script>
  </body>
</html>