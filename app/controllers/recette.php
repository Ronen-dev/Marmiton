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
        else{
            $connect = $db->connect();
            $affiche_recette = $db->afficheRecette($connect, $recette->$id_recette);
            $affiche_categorie = $db->getCategorie($connect);
            $this->view('recette/affiche', ['recette' => $affiche_recette, 'categorie' => $affiche_categorie]);
        }


    }

    public function liste()
    {
        /*$user = $this->model('User');
        $user->$name = $name;

        $this->view('recette/liste', ['name' => $user->$name]);*/
        $db = new My_connexion();
        if (!($db->connect())){
            $this->view('recette/liste', ['name' => 'pas ok']);
        }
        else{
            $connect = $db->connect();
            $result = $db->listeRecette($connect);
            $this->view('recette/liste', ['result' => $result]);
        }
    }
}