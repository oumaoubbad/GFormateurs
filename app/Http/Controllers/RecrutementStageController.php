<?php

namespace App\Http\Controllers;

use App\Models\CandidatStage;
use Illuminate\Support\Str;

use App\Models\RecrutementStage;
use Illuminate\Http\Request;



class RecrutementStageController extends Controller
{
   


    public function index()
    {
        $recrutementStages = RecrutementStage::latest()->paginate(6);
        return view('recrutementStage.index')->with([
            'recrutementStages' => $recrutementStages
        ]);
    }

    public function indexcand($id)
    {
        // dd($id);
        $recrutementStageId = $id;
        $candidatStages = CandidatStage::where('recrutement_id', $recrutementStageId)->get();
        $recrutementStages = RecrutementStage::findOrFail($recrutementStageId);
        // $recrutements = Recrutement::latest()->paginate(6);

        //dd($candidats);
        return view('recrutementStage.indexcand', compact('candidatStages', 'recrutementStages'));



        // $recrutements = Recrutement::latest()->paginate(6);
        //  return view('recrutement.indexcand')->with([
            // 'recrutements'=>$recrutements
        // ]);
    }




    public function create()
    {
        return view('recrutementStage.create');
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'titre' => 'required|min:3|max:100',
            'description' => 'required|min:10',
            'date_limite' => 'required',
            'lieu' => 'required|min:3',
            'competence' => 'required',
            'niveau' => 'required',
            'Domaine' => 'required',
            'fonction' => 'required',


        ]);

        $recrutementStage = new recrutementStage();
        $recrutementStage->titre = $request->titre;
        $recrutementStage->description = $request->description;
        $recrutementStage->date_limite = $request->date_limite;
        $recrutementStage->lieu = $request->lieu;
        $recrutementStage->competence = $request->competence;
        $recrutementStage->niveau = $request->niveau;
        $recrutementStage->Domaine = $request -> Domaine;
        $recrutementStage->fonction = $request ->fonction;
        $recrutementStage->save();

        return redirect()->route('recrutementStage.index')->with([
            'successs' => 'article ajouté'
        ]);
    }


    public function delete($id)
    {
        $recrutementStage = RecrutementStage::where('id', $id)->first();
        $recrutementStage->delete();

        return redirect()->route('recrutement.index')->with([
            'success' => 'article supprimé'
        ]);
    }




    public function edit($id)
    {  //pour button modifier
        $recrutementStage = RecrutementStage::find($id); // recuper le recrutementmn table recrutementet
        return view('recrutementStage.edit')->with([ // nsayftoh n page edit
            'recrutementStage' => $recrutementStage
        ]);
    }




    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'titre' => 'required|min:3|max:100',
            'description' => 'required|min:10',
            'date_limite' => 'required',
            'lieu' => 'required|min:3',
            'competence' => 'required|min:3',
            'niveau' => 'required',
            'Domaine' => 'required',
            'fonction' => 'required',
        ]);
        $recrutementStage = RecrutementStage::find($id);
        $recrutementStage->titre = $request->titre;
        $recrutementStage->description = $request->description;
        $recrutementStage->date_limite = $request->date_limite;
        $recrutementStage->lieu = $request->lieu;
        $recrutementStage->competence = $request->competence;
        $recrutementStage->niveau = $request->niveau;
        $recrutementStage->Domaine = $request -> Domaine;
        $recrutementStage->fonction = $request -> fonction;
        $recrutementStage->save();
        return redirect()->route('recrutementStage.index')->with([
            'successs' => 'article modifié'
        ]);
    }
}
