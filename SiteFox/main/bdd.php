<?php
class Bdd
{
    public static function appelBdd()
    {

        $host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "foxscellar";

        try {
            $bdd = new PDO("mysql:host=" . $host . ";dbname=" . $db_name . ";charset=utf8;", $db_user, $db_password);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }



    }
}
?>
