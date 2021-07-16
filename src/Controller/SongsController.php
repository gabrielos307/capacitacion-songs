<?php

namespace App\Controller;

class SongsController extends AppController
{

    public function index()
    {
        $songs = $this->Songs->find('all');
        $this->set(compact('songs'));
    }
}