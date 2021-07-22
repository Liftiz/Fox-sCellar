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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/vignoble.css">
    <script src="assets/js/vanilla-tilt.js"></script>
    <title>Vin Vignoble</title>
</head>
<body>
<h1><?= $vin["vignoble"]; ?></h1>
    <div class="container">
   
        <div class="card">
            <div class="content">
                <h2>01</h2>
                <h3><?= $vin["titre"]; ?></h3>
                <p><img id ="imgVin"src="<?= $vin["image"]; ?>" alt="" srcset=""></p>
                    <a href="http://">Read more</a>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <h2>02</h2>
                <h3><?= $vin["titre"]; ?></h3>
                <p><img id ="imgVin"src="<?= $vin["image"]; ?>" alt="" srcset=""></p>
                    <a href="http://">Read more</a>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <h2>03</h2>
                <h3><?= $vin["titre"]; ?></h3>
                <p><img id ="imgVin"src="<?= $vin["image"]; ?>" alt="" srcset=""></p>
                    <a href="http://">Read more</a>
            </div>
        </div>
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