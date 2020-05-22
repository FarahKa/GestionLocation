<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Voiture;
use App\Marque;
use App\Modele;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class VoitureController extends Controller
{

    public function indexAdmin () {
        $marques = Marque::all();
        $modeles = Modele::all();
        $voitures = Voiture::all();
        return view('gestion.index.indexAdmin', ['voitures' => $voitures, 'marques' => $marques, 'modeles' => $modeles]);

    }
    public function voituresAdmin () {

        $voitures = Voiture::all();
        return view('gestion.voitures', ['voitures' => $voitures]);

    }




    public function storeVoiture(){
        $data=Input::all();
        $voiture = Voiture::create([
            'matricule'=>$data['matricule'],
            'couleur'=>$data['couleur'],
            'carburant'=>$data['carburant'],
            'manuelle'=>$data['manuelle'],
            'prix'=>$data['prix'],
            'nb_places'=>$data['nb_places'],
            'modele_id'=> $data['modele']

        ]);
        $file = $data['image'];
        if(!empty($file)) {
            $path = "public/imagesVoitures";
            $url = "public/imagesVoitures".$data['matricule'].time();
            $file->move($path, $url);
            Image::create([
                'voiture_id' => $voiture->id,
                'chemin' => $url
            ]);
        }

     return redirect('indexAdmin');

 }

 public function storeMarque(Request $request)
 {
     Marque::create([
         'libelle'=>$request->input('libelle')
     ]);

        return back(); // redirect('indexAdmin');
 }


 public function storeModele()
 {
     $data=Input::all();
     $marque=Marque::where('libelle', $data['marque'])->first();
     $id=$marque->id;
     Modele::create([
         'libelle'=>$data['libelle'],
         'marque_id'=>(int)$id
     ]);
     return back();
 }

 public function showReservations()
 {
     $reservations = Reservation::all();
     return view("gestion.reservations", compact('reservations'));
 }

    public function showMarques()
    {
        $marques = Marque::all();
        return view("gestion.marques", compact('marques'));
    }

    public function deleteMarque(Request $request){
        $marque=Marque::where('libelle', $request->input('marque'))->first();
        $marque->delete();
        return back();
    }
    public function deleteVoiture($id){
        Voiture::whereId($id)->delete();
        return back();
    }
    public function deleteModele(Request $request){
        $modele=Modele::where('libelle', $request->input('modele'))->first();
        $modele->delete();
        return back();
    }

    public function confirmReservation($id){
        Reservation::whereId($id)->update(['confirmed' => 1 ]);
        return back();

    }

    public function deleteReservation($id){
        Reservation::whereId($id)->delete();
        return back();

    }

}
