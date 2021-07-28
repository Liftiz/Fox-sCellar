<?php
// session_start();
// if(!$_SESSION['cle']){
//   header('Location: connexion2.php');
// }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/parallax.css">
  <link rel="manifest" href="dunplab-manifest-48027.json">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <script  src="parallax.js"></script>
  <script  src="toggle.js"></script>
  <script  src="app.js"></script>
</head>
  <body>

    
      <!-- Effet 3D -->
    <div class="container">
      <!-- Menu -->
      <button class="reset anim-menu-btn bg-contrast-higher color-bg radius-50% js-anim-menu-btn js-tab-focus" style="--anim-menu-btn-icon-size: 24px;" aria-label="Toggle menu" aria-controls="drop-menu-id">
        <i class="anim-menu-btn__icon anim-menu-btn__icon--close" aria-hidden="true"></i>
      </button>
      
      <div class="drop-menu text-sm@md js-drop-menu js-autocomplete" id="drop-menu-id" data-autocomplete-dropdown-visible-class="drop-menu--searching">
        <div class="drop-menu__inner js-drop-menu__inner">
          <!-- menu -->
          <ul class="drop-menu__list js-drop-menu__list js-drop-menu__list--main">
        
            <li>
              <a href="map.html">
              <button class="reset drop-menu__btn js-drop-menu__btn--sublist-control">
                <span>Carte Vignobles</span>
              </button>
            </a>

            </li>
        
            <li>
              <button class="reset drop-menu__btn js-drop-menu__btn--sublist-control">
                <span>Vins</span>
              </button>
      
            </li>
          </ul>
      

        </div>
      
        <!-- close button - mobile only -->
        <button class="reset drop-menu__close-btn js-drop-menu__close-btn js-tab-focus">
          <svg class="icon icon--xs margin-right-xxxs" viewBox="0 0 16 16" aria-hidden="true"><g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line><line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line></g></svg>
      
          <span>Close Menu</span>
        </button>
      </div>
      <div >
        <a id="connexion" href="connexion2.php">Se connecter</a>
      </div>
    <!-- Fin Menu -->
      <ul id="scene">
        <li class="layer" id="sol" data-depth=".1"><img  id="sol" src="assets/img/parallax/sol.png"></li>
        <li class="layer" id="cheshire" data-depth=".1"><object id="anim-immo-vitrine" class="block width-100%" data="assets/img/parallax/chat.svg" type="image/svg+xml"></object></li>
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