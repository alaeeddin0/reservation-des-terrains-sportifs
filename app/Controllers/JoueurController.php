<?php

namespace App\Controllers;

use App\Models\JoueurModel;

class JoueurController extends BaseController
{
    public function index()
    {
        $joueurModel = new JoueurModel();

        $joueurCounts = $joueurModel->countAll(); 

        $data['joueurs'] = $joueurModel->getJoueursWithReservations();

        $data['joueurCounts'] = $joueurCounts;

        return view('joueur_list', $data);}
}
