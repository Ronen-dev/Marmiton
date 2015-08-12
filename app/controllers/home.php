<?php

class Home extends Controller
{
    public function index($name = 'étranger')
    {
        $user = $this->model('User');
        $user->$name = $name;

        $db = new My_connexion();
        if (!($db->connect())){
            $this->view('recette/liste', ['name' => 'pas ok']);
        }
        else {
            $connect = $db->connect();
            $affiche_categorie = $db->getCategorie($connect);
            $this->view('home/index', ['name' => $user->$name, 'categorie' => $affiche_categorie]);
        }
    }

    public function recette($name = 'étr')
    {
        $user = $this->model('User');
        $user->$name = $name;

        $this->view('home/recette', ['name' => $user->$name]);
    }
}