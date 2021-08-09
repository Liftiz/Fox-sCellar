<?php

class Vins {
    public $accords_mets ;
    public $caracteristique;
    public $idVignobles;
    public $idVins;
    public $cepage;
    public $degustation;
    public $image;
    public $titre;
    
    public static function findAll() {
        global $db;
        $vignobles = $db->query("SELECT * FROM vins");
        if ($vignobles) return $vignobles->fetchAll(PDO::FETCH_CLASS, 'Vins');
        else return false;
    }

    public static function findOne($id) {
        global $bdd;
        $vignoble = $bdd->query("SELECT * FROM vins WHERE idVins=".$id);
        if ($vignoble) {
            $vignoble->setFetchMode(PDO::FETCH_CLASS, 'Vins');
            return $vignoble->fetch();
        } else return false;
    }
}