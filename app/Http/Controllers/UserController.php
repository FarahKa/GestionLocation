<?php

namespace App\Http\Controllers;

use App\Client;
use App\Marque;
use App\Reservation;
use App\Voiture;
use App\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function indexVoitures(){
        $voitures = Voiture::all();
        return view("front.voitures", ['voitures' =>$voitures]);
    }

    public function indexUser(){
        $marques = Marque::all();
        return view('front.indexUser', ['marques'=>$marques]);
    }

    public function getModeles(){
        $data=Input::all();
        $value=$data['value'];

        $modeles= Modele::where('marque_id', $value)->get();

        $output= '';
        foreach($modeles as $modele){
            $output .= '<option value="'.$modele->id.'">'.$modele->libelle.'</option>';
        }
        echo ($output);
        //return response()->json(array('output'=> $output), 200);

    }

    public function searchVoitures(){
        $data=Input::all();
        $date_debut= $data['dateDebut'];
        $date_fin= $data['dateFin'];
        session_start();
        $_SESSION['date_debut']=$date_debut;
        $_SESSION['date_fin']=$date_fin;
        if(isset($data['manuelle']))
        {
            $manuelle= 1;
        }
        else{
            $manuelle= 0;
        }
        $voitures=Voiture::whereHas('reservations', function($query)use($date_debut, $date_fin) {
                            $query->where('date_debut', '>', $date_debut)->where('date_fin', '>', $date_fin);
                           })->orWhereHas('reservations', function($query)use($date_debut, $date_fin) {
                            $query->where('date_debut','<',$date_debut)->where('date_fin','<',$date_fin);
                           })
                            ->orWhereDoesntHave('reservations')
                            ->where('modele_id', $data['modele'])
                            ->where('nb_places', $data['nb_places'])
                            ->where('couleur', $data['couleur'])
                            ->where('manuelle', $manuelle)
                            ->get();
        return view('front.voitures', ['voitures' =>$voitures]);
    }

    public function reserver($id){
    return view('front.reserver', ['idVoiture'=> $id]);
    }

    public function storeReservation(){
        //creer client4
        $data=Input::all();
        $client= Client::create([
            'cin'=>$data['cin'],
            'nom'=>$data['nom'],
            'prenom'=>$data['prenom'],
            'adresse'=>$data['adresse'],
            'email'=>$data['email']
        ]);
        session_start();
        if(isset($_SESSION['date_debut']) && isset($_SESSION['date_fin']) ) {
            $date_debut = $_SESSION['date_debut'];
            $date_fin = $_SESSION['date_fin'];
        } else {
            $_SESSION['date_debut']= $data['dateDebut'];
            $_SESSION['date_fin']= $data['dateFin'];
            $date_debut = $_SESSION['date_debut'];
            $date_fin = $_SESSION['date_fin'];
            $matches = Voiture::whereId($data['idVoiture'])
                                ->whereHas('reservations', function($query)use($date_debut, $date_fin) {
                                  $query->where('date_debut', '>', $date_debut)->where('date_fin', '>', $date_fin);
                                    })->orWhereHas('reservations', function($query)use($date_debut, $date_fin) {
                                 $query->where('date_debut','<',$date_debut)->where('date_fin','<',$date_fin);})
                                   ->orWhereDoesntHave('reservations');
            if($matches == null){
                $_SESSION['date_debut'] = null;
                $_SESSION['date_fin'] = null;
                return Redirect::back()->withErrors(['msg', 'La voiture n\'est pas disponible pendant cette période.']);
            }
        }
        $reservation=Reservation::create([
            'date_debut'=>$date_debut,
            'date_fin'=>$date_fin,
            'confirmed'=>0,
            'voiture_id'=>$data['idVoiture'],
            'client_id'=>$client->id


        ]);
        $_SESSION['date_debut'] = null;
        $_SESSION['date_fin'] = null;
        $marques=Marque::all();
        return view('front.indexUser', ['marques' => $marques]);
    }


}
