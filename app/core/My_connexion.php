<?php

class My_connexion
{
    const SGBD = 1;
    const HOST = "mysql:host=localhost;";
    const USER = "root";
    const PASS = "root";
    const DB = "dbname=marmiton_db";
    const CHARSET = "SET NAMES UTF8;";
    const MAX_SIZE = 100000;
    const WIDTH_MAX = 800;
    const HEIGHT_MAX = 800;
    const TARGET = "../../public/img/";

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

    public static function listeRecetteByIdCategorie($conn, $id_categorie)
    {
        $sql = "SELECT * FROM recette WHERE id_categorie = " . $id_categorie;
        $sth = $conn->prepare($sql);
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

    public static function updateRecette($conn, $pseudo, $email, $titre, $description, $categorie){
        $sth = $conn->prepare("INSERT INTO recette (titre, description, id_categorie, pseudo, email)
                               VALUES (:titre , :description, :id_categorie, :pseudo, :email)");
        $sth->bindParam(':titre', $titre);
        $sth->bindParam(':description', $description);
        $sth->bindParam(':id_categorie', $categorie);
        $sth->bindParam(':pseudo', $pseudo);
        $sth->bindParam(':email', $email);
        $sth->execute();
    }
}