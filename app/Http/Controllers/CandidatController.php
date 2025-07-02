<?php

namespace App\Http\Controllers;                        //candidat li kont 3amla ana (sans ID)

use App\Models\Candidat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;



class CandidatController extends Controller
{

    public function index()
    {
        $candidats = Candidat::latest()->paginate(6);
        return view('recrutement.indexCand')->with([
            'candidats' => $candidats
        ]);
    }








    public function storeCandidat(Request $request,)
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

        $recrutement = new Candidat();
        $recrutement->nom = $request->nom;
        $recrutement->prenom = $request->prenom;
        $recrutement->date_naissance = $request->date_naissance;
        $recrutement->email = $request->email;
        $recrutement->tel = $request->tel;
        $recrutement->niveauEtude = $request->niveauEtude;
        $recrutement->diplome = $request->diplome;
        $recrutement->descriptionExperience = $request->descriptionExperience;
        $recrutement->cv = $request->cv;
        $recrutement->recrutement_id = $request->recrutement_id;
        // $recrutement ->lettreMmotivation=$request->lettreMmotivation;


        // dd($recrutement);

        if ($request->hasFile('cv')) {
             $path = $request->file('cv')->store('cvs', 'public'); // public/cvs/cv.pdf

            $recrutement->cv = $path;
        }

        $recrutement->save();


        return redirect()->route('recrutement.show')->with([
            'successs' => 'article ajouté'
        ]);
    }


    public function show($id)
    {  //pour button do voir
        $candidat = Candidat::find($id);
        return view('candidat.show')->with([
            'candidat' => $candidat
        ]);
    }


    public function downloadCV($id)
    {
        // return dd('sokara');
        $cv_uploads = DB::table('candidats')->where('id', $id)->first();
        //$pathToFile = public_path("{$cv_uploads->cv}");
        // return dd($pathToFile);
        $pathToFile = \storage_path('app/public/'.$cv_uploads->cv);
        //dd($cv_uploads);
        return response()->download($pathToFile);
    }

    public function delete($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $candidat->delete();

        return redirect()->route('recrutement.index')->with([
            'success' => 'article supprimé'
        ]);
    }




    public function approve(Request $request, $id)
    {


        $candidat = Candidat::find($id);

        if ($candidat) {
            $candidat->statut = $request->approve;
            $candidat->save();
            return redirect()->back();
        }
    }
}
