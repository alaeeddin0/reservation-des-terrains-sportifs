<?php
namespace App\Controllers;

use App\Models\ReservationsModel;

class ReservationsController extends BaseController
{
    public function index()
    {
        $model = new ReservationsModel();


        $reservations = $model->getAllReservationsWithDetails();
        $reservationCounts = $model->getReservationCounts();

        return view('Reservations', [
            'reservations' => $reservations,
            'reservationCounts' => $reservationCounts
        ]);
    }

    public function updateStatut($id)
    {
        $model = new ReservationsModel();


        $newStatut = $this->request->getPost('statut');


        if (!in_array($newStatut, ['en attente', 'confirmée', 'annulée'])) {
            return redirect()->back()->with('error', 'Statut invalide.');
        }

        $updateData = ['statut' => $newStatut];
        if ($model->update($id, $updateData)) {

            $reservations = $model->getAllReservationsWithDetails();
            $reservationCounts = $model->getReservationCounts();

            return view('Reservations', [
                'reservations' => $reservations,
                'reservationCounts' => $reservationCounts,
            ]);
        } else {
            return view('Reservations');
        }
    }
}
