<?php
session_start();
require "config.php";


$idWish= (int)$_GET['idWish'];
$supp = $bdd->prepare('DELETE FROM wishlist WHERE idWish = ?');
$supp->execute(array($idWish));
header('Location: wishlist.php' );

$idCave= (int)$_GET['idCave'];
$supp = $bdd->prepare('DELETE FROM cave WHERE idCave = ?');
$supp->execute(array($idCave));
header('Location: cave.php' );
?>


