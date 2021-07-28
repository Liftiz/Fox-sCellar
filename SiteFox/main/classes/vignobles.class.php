<?php
require "vins.class.php";
class Vignobles {
    public $idVignobles;
    public $coordonnee;
    public $description;
    public $idVins;
    public $nom;
    public $photo;

    public static function findAll() {
        global $db;
        $vignobles = $db->query("SELECT * FROM vignobles");
        if ($vignobles) return $vignobles->fetchAll(PDO::FETCH_CLASS, 'Vignobles');
        else return false;
    }

    public static function findOne($id) {
        global $db;
        $vignoble = $db->query("SELECT * FROM vignobles WHERE idVignobles=".$id);
        if ($vignoble) {
            $vignoble->setFetchMode(PDO::FETCH_CLASS, 'Vignobles');
            return $vignoble->fetch();
        } else return false;
    }
    // Cette methode statique va renvoyer tous les vins qui appartient au vignoble qui ont cet id
    public function findAllVins() {
        global $db;
        $vins = $db->query("SELECT * FROM vins WHERE idVignobles=".$this->idVignobles);
        if ($vins) {
            return $vins->fetchAll(PDO::FETCH_CLASS, "Vins");
        } else {
            return false;
        }
    }
}
