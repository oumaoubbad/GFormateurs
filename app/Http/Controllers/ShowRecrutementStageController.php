<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecrutementStage;
use App\Models\CandidatStage;


class ShowRecrutementStageController extends Controller
{
    public function show(){
        $recrutementStages = RecrutementStage::latest()->get();
        return view('recrutementStage.show')->with('recrutementStages', $recrutementStages);
         }


    public function createCand($recrutement_id){
        //dd($recrutement_id);
        return view('recrutementStage.createCand', compact('recrutement_id'));
     }




}
