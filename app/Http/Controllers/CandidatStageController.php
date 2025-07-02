<?php

namespace App\Http\Controllers;                        //candidat li kont 3amla ana (sans ID)

use App\Models\CandidatStage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;



class CandidatStageController extends Controller
{

    public function index()
    {
        $candidatStages = CandidatStage::latest()->paginate(6);
        return view('recrutementstage.indexCand')->with([
            'candidatStages' => $candidatStages
        ]);
    }








    public function storecandidatStage(Request $request,)
    {

        // dd($recrutement_id);

        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'niveauEtude' => 'required',
            'diplome' => 'required',
            // 'experience' => 'required',
            'cv' => 'required',
            'descriptionExperience' => 'required',
            // 'recrutement_id' => 'required',

        ]);
        $recrutementStage = new CandidatStage();
        $recrutementStage->nom = $request->nom;
        $recrutementStage->prenom = $request->prenom;
        $recrutementStage->date_naissance = $request->date_naissance;
        $recrutementStage->email = $request->email;
        $recrutementStage->tel = $request->tel;
        $recrutementStage->niveauEtude = $request->niveauEtude;
        $recrutementStage->diplome = $request->diplome;
        $recrutementStage->descriptionExperience = $request->descriptionExperience;
        $recrutementStage->cv = $request->cv;
        $recrutementStage->recrutement_id = $request->recrutement_id;
        // $recrutement ->lettreMmotivation=$request->lettreMmotivation;


        // dd($recrutement);

        if ($request->hasFile('cv')) {
             $path = $request->file('cv')->store('cvs', 'public'); // public/cvs/cv.pdf

            $recrutementStage->cv = $path;
        }

        $recrutementStage->save();


        return redirect()->route('recrutementStage.show')->with([
            'successs' => 'article ajouté'
        ]);
    }


    public function show($id)
    {  //pour button do voir
        $candidatStage = CandidatStage::find($id);
        return view('candidatStage.show')->with([
            'candidatStage' => $candidatStage
        ]);
    }


    public function downloadCVStage($id)
    {
        // return dd('sokara');
        $cv_uploads = DB::table('candidatStages')->where('id', $id)->first();
        //$pathToFile = public_path("{$cv_uploads->cv}");
        // return dd($pathToFile);
        $pathToFile = \storage_path('app/public/'.$cv_uploads->cv);
        //dd($cv_uploads);
        return response()->download($pathToFile);
    }

    public function delete($id)
    {
        $candidatStage = CandidatStage::where('id', $id)->first();
        $candidatStage->delete();

        return redirect()->route('recrutementStage.index')->with([
            'success' => 'article supprimé'
        ]);
    }




    
}
