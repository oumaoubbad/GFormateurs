<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecrutementFormation;
use App\Models\CandidatFormation;


class ShowRecrutementFormationController extends Controller
{
    public function show(){
        $recrutementFormations = RecrutementFormation::latest()->get();
        return view('recrutementFormation.show')->with('recrutementFormations', $recrutementFormations);
         }


    public function createCand($recrutement_id){
        //dd($recrutement_id);
        return view('home', compact('recrutement_id'));
     }




}
