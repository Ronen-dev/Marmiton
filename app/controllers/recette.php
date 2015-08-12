<?php

class Recette extends Controller
{
    public function affiche($id_recette = 'test')
    {
        $recette = $this->model('User');
        $recette->$id_recette = $id_recette;

        $this->view('recette/affiche', ['name' => $recette->$id_recette]);
    }

    public function liste($name = 'étranger')
    {
        $user = $this->model('User');
        $user->$name = $name;

        $this->view('recette/liste', ['name' => $user->$name]);
    }
}