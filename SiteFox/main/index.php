<!-- 
// $host = "localhost";
// $db_user = "root";
// $db_password = "";
// $db_name = "foxscellar";

// try {
//   $db = new PDO("mysql:host=".$host.";dbname=".$db_name.";charset=utf8;", $db_user, $db_password);
//   require "classes/vignobles.class.php";
//   $vignoble = Vignobles::findOne(3);

//   if ($vignoble) {
   
//     echo "<pre>";
//     var_dump($vignoble->idVignobles);
//     var_dump($vignoble->findAllVins());
//     echo "</pre>";
//   }
  
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// } -->


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="manifest.json">
  <link rel="icon" type="image/png" href="assets/img/pngegg.png" />
  <link id="codyframe" rel="stylesheet" href="assets/css/style.css">
  <link id="codyframe" rel="stylesheet" href="assets/css/custom.css">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <script src="script.js"></script>

</head>
  <body>
    
  <!-- Background -->
  <div class="height-100vh bg-gradient-1" data-bg-animate="on">
     <!-- Titre -->
  <h1 id="titre">Fox's Cellar</h1>

  <!-- Hexagone -->
  <div id="hexa">
  <div id="un" class="hexagon"><span></span></div>
  <div id="deux" class="hexagon" ><span></span></div>
  </div>

 
  <!-- Logo -->
  <img id ="logo" src="assets/img/pngegg.png" alt="">

  </div>

<script src="assets/js/scripts.js"></script>
</body>
</html>