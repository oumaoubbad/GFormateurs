<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Support\Str;

use App\Models\Recrutement;
use Illuminate\Http\Request;



class RecrutementController extends Controller
{
   


    public function index()
    {
        $recrutements = Recrutement::latest()->paginate(6);
        return view('recrutement.index')->with([
            'recrutements' => $recrutements
        ]);
    }

    public function indexcand($id)
    {
        // dd($id);
        $recrutementId = $id;
        $candidats = Candidat::where('recrutement_id', $recrutementId)->get();
        $recrutements = Recrutement::findOrFail($recrutementId);
        // $recrutements = Recrutement::latest()->paginate(6);

        //dd($candidats);
        return view('recrutement.indexcand', compact('candidats', 'recrutements'));



        // $recrutements = Recrutement::latest()->paginate(6);
        //  return view('recrutement.indexcand')->with([
            // 'recrutements'=>$recrutements
        // ]);
    }




    public function create()
    {
        return view('recrutement.create');
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'titre' => 'required|min:3|max:100',
            'description' => 'required|min:10',
            'date_limite' => 'required',
            'lieu' => 'required|min:3',
            'competence' => 'required',


        ]);

        $recrutement = new Recrutement();
        $recrutement->titre = $request->titre;
        $recrutement->description = $request->description;
        $recrutement->date_limite = $request->date_limite;
        $recrutement->lieu = $request->lieu;
        $recrutement->competence = $request->competence;
        $recrutement->save();

        return redirect()->route('recrutement.index')->with([
            'successs' => 'article ajouté'
        ]);
    }


    public function delete($id)
    {
        $recrutement = Recrutement::where('id', $id)->first();
        $recrutement->delete();

        return redirect()->route('recrutement.index')->with([
            'success' => 'article supprimé'
        ]);
    }




    public function edit($id)
    {  //pour button modifier
        $recrutement = Recrutement::find($id); // recuper le recrutementmn table recrutementet
        return view('recrutement.edit')->with([ // nsayftoh n page edit
            'recrutement' => $recrutement
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
        ]);
        $recrutement = Recrutement::find($id);
        $recrutement->titre = $request->titre;
        $recrutement->description = $request->description;
        $recrutement->date_limite = $request->date_limite;
        $recrutement->lieu = $request->lieu;
        $recrutement->competence = $request->competence;
        $recrutement->save();
        return redirect()->route('recrutement.index')->with([
            'successs' => 'article modifié'
        ]);
    }
}
