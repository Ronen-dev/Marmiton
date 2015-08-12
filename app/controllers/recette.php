<?php

class Recette extends Controller
{
    public function index($name = 'étranger')
    {
        $user = $this->model('User');
        $user->$name = $name;

        $this->view('recette/index', ['name' => $user->$name]);
    }

    public function liste($name = 'étranger')
    {
        $user = $this->model('User');
        $user->$name = $name;

        $this->view('recette/liste', ['name' => $user->$name]);
    }
}