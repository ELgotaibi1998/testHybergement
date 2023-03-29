<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Http\Requests\StoreAffectationRequest;
use App\Http\Requests\UpdateAffectationRequest;
use App\Mail\AffectationMail;
use App\Mail\TestMail;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AffectationController extends Controller
{
    public function __construct()
    {
       $this->middleware("auth");
       $this->middleware("admin");
    }
    public function index()
    {
        // dd(Affectation::find(18)->demandes()->withTrashed()->get()[0]->id);
        return view("Affectation.index",['affectations'=> Affectation::paginate(6)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Affectation.create',['demandes'=> Demande::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAffectationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAffectationRequest $request)
    {
        $aff = new Affectation();
        $aff->dateReception = $request->input('dateR');
        $aff->emergentReception = $request->input('EmgR');
        $aff->dateRetour = $request->input('dateRt');
        $aff->motifRetour = $request->input('motifR');
        $aff->numInventaire = $request->input('numI');
        $aff->etat = $request->input('etat');
        $aff->demande_id = $request->input('demande');
        // dd($aff->demandes->articles->qteStock);
        if($aff->demandes->qteArticle>$aff->demandes->articles->qteStock)  
       return "<h4 style='color:red'>Impossible d'affecter cette article car la quantité demandé non existé !!!!!!!</h4>";
        $aff->save();
        Mail::to( $aff->demandes()->withTrashed()->get()[0]->users()->withTrashed()->get()[0]->email)->send(new AffectationMail($aff));
        $request->session()->flash("affectation","L'affectation' a été ajouter avec succés");
        return redirect()->route('affectations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function show( $affectation)
    {
        return view('Affectation.show',['aff'=>Affectation::find($affectation) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Affectation.edit',['aff'=>Affectation::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAffectationRequest  $request
     * @param  \App\Models\Affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAffectationRequest $request,$id)
    {
        $aff = Affectation::findOrFail($id);
       
        $aff->dateReception = $request->input('dateR');
        $aff->emergentReception = $request->input('EmgR');
        $aff->dateRetour = $request->input('dateRt');
        $aff->motifRetour = $request->input('motifR');
        $aff->numInventaire = $request->input('numI');
        $aff->etat = $request->input('etat');
        $aff->demande_id = $request->input('demande');
        $aff->save();
        $request->session()->flash("affectation","L'affectation a été modifier avec succés");
        return redirect()->route('affectations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $affectation)
    {
        {
            $aff = Affectation::findOrFail($affectation);
            $aff->delete();
            
            return redirect()->route("affectations.index");
        }
    }
    public function sendMail()
    {
        
        Mail::to("batoul1998aa@gmail.com")->send(new TestMail());
    }
}
