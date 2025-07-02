<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recrutement;
use App\Models\Candidat;


class ShowRecrutementController extends Controller
{
    public function show(){
        $recrutements = Recrutement::latest()->get();
        return view('recrutement.show')->with('recrutements', $recrutements);
         }


    public function createCand($recrutement_id){
        //dd($recrutement_id);
        return view('recrutement.createCand', compact('recrutement_id'));
     }




}
