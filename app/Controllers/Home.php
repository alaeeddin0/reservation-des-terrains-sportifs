<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\TerrainModel;
use App\Models\UtilisateurModel;
use App\Models\ReservationsModel;

class Home extends Controller
{
    public function index()
    {
        $data['today_date'] = date('D, j M Y');
        $model = new ReservationsModel();
        $data['reservationCounts'] = $model->getReservationCounts();

        $utilisateurModel = new UtilisateurModel();
        
        $data['totalUsers'] = $utilisateurModel->countAllUsers();

        $terrainModel = new TerrainModel();
        
        $data['totalTerrains'] = $terrainModel->countAll();  

        return view('index', $data); 
    }
}
