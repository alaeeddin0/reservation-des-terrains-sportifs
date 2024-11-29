<?php

namespace App\Controllers;

use App\Models\TerrainModel;

class TerrainController extends BaseController

{
    protected $terrainModel;

    public function __construct()
    {
        $this->terrainModel = new TerrainModel();
    }
    public function index()
    {
        $model = new TerrainModel();
        
        $data['terrains'] = $model->getTerrains();
        
        $data['totalTerrains'] = $model->countAllResults();  
        
        return view('Terrains', $data);
    }
    
    
   
     public function create()
     {
         return view('add-terrains');  
     }
 
   
     public function save()
    {
        $model = new TerrainModel();

        $data = [
            'localisation' => $this->request->getPost('localisation'),
            'prix'         => $this->request->getPost('prix'),
            'type_sport'  => $this->request->getPost('type_sport'),
             'disponibilites' => $this->request->getPost('disponibilites'),
        ];

        if ($model->insert($data)) {
            return view('add-terrains');
        }
    }

    public function delete($id)
    {
        $model = new TerrainModel();
    
        if ($model->delete($id)) {
            $data['terrains'] = $model->findAll();
            $data['totalTerrains'] = $model->countAllResults();
            return view('Terrains', $data);
        } else {
            $data['terrains'] = $model->findAll();
            $data['totalTerrains'] = $model->countAllResults();
            return view('Terrains', $data);
        }
    }
    

    public function update($id)
{
    $dataToUpdate = [
        'prix' => $this->request->getPost('prix'),
        'disponibilites' => $this->request->getPost('disponibilites'),
    ];

    $model = new TerrainModel();

    if ($this->validate([
        'prix' => 'required|numeric',
        'disponibilites' => 'required|string',
    ])) {
        if ($model->update($id, $dataToUpdate)) {

            $data['terrains'] = $model->findAll();
            $data['totalTerrains'] = $model->countAllResults();
            return view('Terrains', $data);
        } else {
            $data['terrains'] = $model->findAll();
            $data['totalTerrains'] = $model->countAllResults();
            return view('Terrains', $data);
        }
    } else {
        $data['terrains'] = $model->findAll();
        $data['totalTerrains'] = $model->countAllResults();
        $data['errors'] = $this->validator->getErrors();
        return view('Terrains', $data);
    }
}

}
