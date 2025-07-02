<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\UpdateFormateurRequest;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $formateurs = Formateur::when($request->demaine != null, function($q) use ($request){
            return $q->where('demaine', $request->demaine);
        })
        ->when($request->spec != null, function($q) use ($request){
            return $q->where('spec', $request->spec);
        })
        ->when($request->dispo != null, function($q) use ($request){
            return $q->where('dispo', $request->dispo);
        })
        ->when($request->exp != null, function($q) use ($request){
            return $q->where('exp', $request->exp);
        })
         -> paginate(5);
        return view('formateur.index')->with([
           'formateurs'=>$formateurs     // send les variables to view
   ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormateurRequest  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $formateur = new Formateur();
    $formateur->nom = $request->nom;
    $formateur->prenom = $request->prenom;
    $formateur->dispo = $request->dispo;
    $formateur->email = $request->email;
    $formateur->tel = $request->tel;
    $formateur->spec = $request->spec;
    $formateur->demaine = $request->demaine;
    $formateur->exp = $request->exp;



    // Handle CV upload
    if ($request->hasFile('cv')) {
        $cvPath = $request->file('cv')->store('cvs', 'public');
        $formateur->cv = $cvPath;
    }
    if ($request->hasFile('attes')) { // 'attes' should probably be 'attestations'
        $attesPath = $request->file('attes')->store('attestations', 'public');
        $formateur->attes = $attesPath; // Change 'cv' to 'attes'
    }
    if ($request->hasFile('diplome')) {
        $diplomePath = $request->file('diplome')->store('diplomes', 'public');
        $formateur->diplome = $diplomePath; // Change 'cv' to 'diplome'
    }

    // Handle other document uploads similarly (diplome, attes)
    if ($photo = $request->file('photo')) {
        $destinationPath = 'images/';
        $photoName = date('YmdHis') . "_photo." . $photo->getClientOriginalExtension();
        $photo->move($destinationPath, $photoName);
        $formateur->photo = $photoName;
    }
    if ($recto = $request->file('recto')) {
        $destinationPath = 'images/';
        $rectoName = date('YmdHis') . "_recto." . $recto->getClientOriginalExtension();
        $recto->move($destinationPath, $rectoName);
        $formateur->recto = $rectoName;
    }
    if ($vecto = $request->file('vecto')) {
        $destinationPath = 'images/';
        $vectoName = date('YmdHis') . "_vecto." . $vecto->getClientOriginalExtension();
        $vecto->move($destinationPath, $vectoName);
        $formateur->vecto = $vectoName;
    }
    // Handle image uploads

    $formateur->save();

    return redirect()->back()
        ->with('success', 'Formateur created successfully.');
}

public function downloadCV($id)
    {
        // return dd('sokara');
        $cv_uploads = DB::table('formateurs')->where('id', $id)->first();
        //$pathToFile = public_path("{$cv_uploads->cv}");
        // return dd($pathToFile);
        $pathToFile = \storage_path('app/public/'.$cv_uploads->cv);
        //dd($cv_uploads);
        return response()->download($pathToFile);
    }
    public function downloadAttes($id)
    {
        // return dd('sokara');
        $attes_uploads = DB::table('formateurs')->where('id', $id)->first();
        //$pathToFile = public_path("{$attes_uploads->attes}");
        // return dd($pathToFile);
        $pathToFile = \storage_path('app/public/'.$attes_uploads->cv);
        //dd($cv_uploads);
        return response()->download($pathToFile);
    }
    public function downloadDiplome($id)
    {
        // return dd('sokara');
        $diplome_uploads = DB::table('formateurs')->where('id', $id)->first();
        //$pathToFile = public_path("{$diplome_uploads->diplome}");
        // return dd($pathToFile);
        $pathToFile = \storage_path('app/public/'.$diplome_uploads->diplome);
        //dd($cv_uploads);
        return response()->download($pathToFile);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function show(Formateur $formateur)
    {

            return view('formateur.show',compact('formateur'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormateurRequest  $request
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormateurRequest $request, Formateur $formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formateur $formateur)
    {
        //
    }
}
