<?php
require "config.php";
require "classes/vins.class.php";
$vinID = 1;
if (isset($_GET["id"])) {
  $vinID = (int) $_GET['id'];
  if (!is_numeric(($vinID))) $vinID = 1;
}

$vin = Vins::findOne($vinID);
  if (!$vin) {
    echo "Vin introuvable";
    exit;
  }


?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/vin.css">
  <link rel="stylesheet" href="assets/css/parallax.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <script src="assets/js/vin.js"></script>
  <title>Fox's Cellar: Vins</title>
  <script>
    window.onload = () => {
      document.querySelector(".like").addEventListener("click", () => {
        setTimeout(() => window.location.replace('wishlist.php?id=<?php echo $vin->idVins; ?>'), 1500);
      })

        document.querySelector(".button__holder").addEventListener("click", () => {
        setTimeout(() => window.location.replace('cave.php?id=<?php echo $vin->idVins; ?>'), 1500);
      })
    }
  </script>
</head>
  <body>
    <div class="height-100vh bg-gradient-1" data-bg-animate="on">
    
    <h1><?= $vin->titre; ?></h1>

    <div class="tweet">
 
      <div class="like">

        <label for="tweet-123-like" class="like__label" aria-label="J'aime">
        
          <input class="like__input" type="checkbox" name="like" id="tweet-123-like" value="1">
          <div class="like__heart" data-label-default="J'aime" data-label-active="Je n'aime plus"></div>
        
        </label>
        
      </div>

</div>

<div class="button__holder">
    <button class="plus"></button>
</div>




    <div id="position">
      
    <img id ="imgVin"src="<?= $vin->image; ?>" alt="" srcset="">

    <div id="cercle">
        <div id ="cercleUn" class="circle"></div>
        <div id ="cercleDeux" class="circle"></div>
        <div id ="cercleTrois" class="circle"></div>
        <div id ="cercleQuatre" class="circle"></div>
        <div id="hexa">
            <div id="un" class="hexagon"><span></span></div>
            <div id="deux" class="hexagon" ><span></span></div>
         
            </div>
    </div>
</div>

        <div class =" toggleVin" id="vinDegustation" style="display: none" >
              <p><?= $vin->degustation; ?></p>
            </div>
             
    
           <div class =" toggleVin" style="display: none" id="vinVins" >
              <p><?= $vin->caracteristique; ?></p>
           </div>
            
    
            <div class =" toggleVin" style="display: none" id="vinCepage" >
              <p><?= $vin->cepage; ?></p>
            </div>
  
             <div class =" toggleVin" style="display: none" id="vinAccords" >
              <p><?= $vin->accords_mets; ?></p>
            </div>

</div>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>