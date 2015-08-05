<?php

class Home extends Controller
{
    public function index($name = 'étranger')
    {
        $user = $this->model('User');
        $user->$name = $name;

        $this->view('home/index', ['name' => $user->$name]);
    }

    public function recette($name = '')
    {
        $user = $this->model('User');
        $user->$name = $name;

        $this->view('home/recette', ['name' => $user->$name]);
    }
}