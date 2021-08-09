<?php
require "config.php";
require "classes/vignobles.class.php";

if (isset($_GET["id"])) {
    $vignobleId = (int) $_GET["id"];
    if (!is_numeric($vignobleId)) {
        echo "Id de vignoble incorrect";
        exit;
    }
} else {
    echo "ID du vignoble non specifier";
    exit;
}

$vignoble = Vignobles::findOne($vignobleId);

if ($vignoble === false) {
    echo "vignoble introuvable";
    exit;
}

$vignobleVins = $vignoble->findAllVins();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/vignoble.css">
    <script src="assets/js/vanilla-tilt.js"></script>
    <title>Fox's Cellar: Vin Vignoble</title>
</head>
<body>
<h1><?= $vignoble->nom; ?></h1>
    <div class="container">

        <?php foreach ( $vignobleVins as $vin) { ?>
   
        <div class="card">
            <div class="content">
                <h2>01</h2>
                <h3><?= $vin->titre; ?></h3>
                <p><img id ="imgVin"src="<?= $vin->image; ?>" alt="" srcset=""></p>
                    <a href="vin.php?id=<?= $vin->idVins; ?>">Read more</a>
            </div>
        </div>
        <?php } ?>
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