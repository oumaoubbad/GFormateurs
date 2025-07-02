<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use Illuminate\Support\Str;

use App\Models\RecrutementFormation;
use Illuminate\Http\Request;



class RecrutementFormationController extends Controller
{
   


    public function index()
    {
        $recrutementFormations = RecrutementFormation::latest()->paginate(6);
        return view('recrutementFormation.index')->with([
            'recrutementFormations' => $recrutementFormations
        ]);
    }

    public function indexcand($id)
    {
        // dd($id);
        $recrutementFormationId = $id;
        $formateurs = Formateur::where('recrutement_id', $recrutementFormationId)->get();
        $recrutementFormations = RecrutementFormation::findOrFail($recrutementFormationId);
        // $recrutements = Recrutement::latest()->paginate(6);

        //dd($candidats);
        return view('formateur.index', compact('formateurs', 'recrutementFormations'));



        // $recrutements = Recrutement::latest()->paginate(6);
        //  return view('recrutement.indexcand')->with([
            // 'recrutements'=>$recrutements
        // ]);
    }




    public function create()
    {
        return view('recrutementFormation.create');
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

        $recrutementFormation = new recrutementFormation();
        $recrutementFormation->titre = $request->titre;
        $recrutementFormation->description = $request->description;
        $recrutementFormation->date_limite = $request->date_limite;
        $recrutementFormation->lieu = $request->lieu;
        $recrutementFormation->competence = $request->competence;
        $recrutementFormation->niveau = $request->niveau;
        $recrutementFormation->Domaine = $request -> Domaine;
        $recrutementFormation->fonction = $request ->fonction;
        $recrutementFormation->save();

        return redirect()->route('recrutementFormation.index')->with([
            'successs' => 'article ajouté'
        ]);
    }


    public function delete($id)
    {
        $recrutementFormation = RecrutementFormation::where('id', $id)->first();
        $recrutementFormation->delete();

        return redirect()->route('recrutement.index')->with([
            'success' => 'article supprimé'
        ]);
    }




    public function edit($id)
    {  //pour button modifier
        $recrutementFormation = RecrutementFormation::find($id); // recuper le recrutementmn table recrutementet
        return view('recrutementFormation.edit')->with([ // nsayftoh n page edit
            'recrutementFormation' => $recrutementFormation
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
        $recrutementFormation = RecrutementFormation::find($id);
        $recrutementFormation->titre = $request->titre;
        $recrutementFormation->description = $request->description;
        $recrutementFormation->date_limite = $request->date_limite;
        $recrutementFormation->lieu = $request->lieu;
        $recrutementFormation->competence = $request->competence;
        $recrutementFormation->niveau = $request->niveau;
        $recrutementFormation->Domaine = $request -> Domaine;
        $recrutementFormation->fonction = $request -> fonction;
        $recrutementFormation->save();
        return redirect()->route('recrutementFormation.index')->with([
            'successs' => 'article modifié'
        ]);
    }
}
