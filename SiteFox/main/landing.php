<?php
session_start();
if(!isset($_SESSION['user']))
header('Location: formulaire.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Bonjour ! <?php echo $_SESSION['user']; ?></h1>
    <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
</body>
</html>