<?php
$vinID = 1;
if (isset($_GET["id"])) {
  $vinID = (int) $_GET['id'];
  if (!is_numeric(($vinID))) $vinID = 1;
}

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foxscellar";

try {
  $db = new PDO("mysql:host=".$host.";dbname=".$db_name.";charset=utf8;", $db_user, $db_password);
  $vin = $db->query("SELECT * FROM vins WHERE idVins=".$vinID)->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/vin.css">
  <link rel="stylesheet" href="assets/css/parallax.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <script  src="vin.js"></script>
  <script></script>
</head>
  <body>
    <div class="height-100vh bg-gradient-1" data-bg-animate="on">
    
    <h1><?= $vin["titre"]; ?></h1>

    <div id="position">
    <img id ="imgVin"src="<?= $vin["image"]; ?>" alt="" srcset="">

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
              <p><?= $vin["degustation"]; ?></p>
            </div>
             
    
           <div class =" toggleVin" style="display: none" id="vinVins" >
              <p><?= $vin["caracteristique"]; ?></p>
           </div>
            
    
            <div class =" toggleVin" style="display: none" id="vinCepage" >
              <p><?= $vin["cepage"]; ?></p>
            </div>
  
             <div class =" toggleVin" style="display: none" id="vinAccords" >
              <p><?= $vin["accords_mets"]; ?></p>
            </div>

</div>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>