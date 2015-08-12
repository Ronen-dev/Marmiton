<?php

class Recette extends Controller
{
    public function affiche($id_recette = -1)
    {
        $recette = $this->model('Reciep');
        $recette->$id_recette = $id_recette;

        $db = new My_connexion();
        if (!($db->connect())){
            $this->view('recette/affiche', ['result' => "ERROR : Failure connection Database."]);
        }
        else {
            $connect = $db->connect();
            $affiche_recette = $db->afficheRecette($connect, $recette->$id_recette);
            $affiche_categorie = $db->getCategorie($connect);
            $this->view('recette/affiche', ['recette' => $affiche_recette, 'categorie' => $affiche_categorie]);
        }

        if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['titre']) && isset($_POST['contenu'])){
            $pseudo  = $_POST['pseudo'];
            $email   = $_POST['email'];
            $titre   = $_POST['titre'];
            $contenu = $_POST['contenu'];
        }


    }

    public function liste()
    {
        $db = new My_connexion();
        if (!($db->connect())){
            $this->view('recette/liste', ['name' => 'pas ok']);
        }
        else {
            $connect = $db->connect();
            $affiche_liste = $db->listeRecette($connect);
            $affiche_categorie = $db->getCategorie($connect);
            $this->view('recette/liste', ['liste' => $affiche_liste, 'categorie' => $affiche_categorie]);
        }
    }

    public function creer()
    {

    }
}