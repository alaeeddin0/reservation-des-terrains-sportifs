<?php
namespace App\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\ReservationsModel;
use App\Models\TerrainsModel;

class PaymentController extends BaseController
{
    public function charge()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/')->with('error', 'Veuillez vous connecter pour effectuer un paiement.');
        }

        $reservationId = $this->request->getPost('reservation_id');
        $prix = $this->request->getPost('prix');

        if (empty($reservationId) || empty($prix) || !is_numeric($prix) || $prix <= 0) {
            return redirect()->back()->with('error', 'Données de paiement invalides.');
        }

        
        Stripe::setApiKey(\Config\Stripe::SECRET_KEY);

        try {
            
            $checkoutSession = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'], 
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'mad', 
                            'product_data' => [
                                'name' => 'Paiement pour réservation #' . $reservationId,
                            ],
                            'unit_amount' => $prix * 100, 
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'metadata' => [
                    'reservation_id' => $reservationId,
                ],
                'success_url' => site_url('/payment/success'), 
                'cancel_url' => site_url('/Reservation'), 
            ]);

            
            return redirect()->to($checkoutSession->url);
        } catch (\Exception $e) {
     
            log_message('error', 'Erreur Stripe Checkout : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur de paiement : ' . $e->getMessage());
        }
    }

   
    public function success()
    {
       
        $session = session();
        $user = $session->get('user');
        if (!$user) {
            return redirect()->to('/')->with('error', 'Vous devez être connecté.');
        }

     
        $reservationId = $this->request->getPost('reservation_id');
        $reservationModel = new ReservationsModel();
        $reservation = $reservationModel->find($reservationId);
        log_message('debug', 'Réservation récupérée : ' . print_r($reservation, true));

        if (!$reservation) {
            return redirect()->back()->with('error', 'Réservation introuvable.');
        }

        if (!isset($reservation['terrain_id'])) {
            return redirect()->back()->with('error', 'La réservation ne contient pas de terrain associé.');
        }

        $terrainModel = new TerrainsModel();
        $terrain = $terrainModel->find($reservation['terrain_id']);

        if (!$terrain) {
            return redirect()->back()->with('error', 'Terrain associé introuvable.');
        }

        $prix = $terrain['prix'];

        if ($reservation) {
            $reservationModel->update($reservationId, [
                'statut' => 'confirmée', 
                'is_paid' => 1,      
            ]);
        }
        return view('/Reservation');
    }
}
