<?php

class My_connexion
{
    const SGBD = 1;
    const HOST = "mysql:host=localhost;";
    const USER = "root";
    const PASS = "root";
    const DB = "dbname=marmiton_db";
    const CHARSET = "SET NAMES UTF8;";

    public static function connect()
    {
        $dbhandle = new PDO(self::HOST.self::DB, self::USER, self::PASS);
        $dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbhandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        return $dbhandle;
    }

    public static function afficheRecette($conn, $id_recette)
    {
        $sql = "SELECT * FROM recette WHERE id = " . $id_recette;
        $sth = $conn->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function listeRecette($conn)
    {
        $sth = $conn->prepare("SELECT * FROM recette");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getCategorie($conn)
    {
        $sql = "SELECT * FROM categorie";
        $sth = $conn->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function updateRecette($conn, $pseudo, $email, $titre, $contenu){
        $sql = "INSERT INTO user (pseudo, email) VALUES (" . $pseudo . ", " . $email . ")";
        $sth = $conn->prepare($sql);
        $sth->execute();
        $sql = "INSERT INTO recette (titre, description) VALUES (" . $titre . ", " . $contenu . ")";
        $sth = $conn->prepare($sql);
        $sth->execute();
    }
}