<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Http\Requests\StoreMarcheRequest;
use App\Http\Requests\UpdateMarcheRequest;
use App\Models\Fournisseur;

class MarcheController extends Controller
{
   
    public function __construct()
    {
       $this->middleware("auth");
       $this->middleware("admin");
    }
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("marches.index",["marches"=>Marche::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("marches.create",['fournisseurs'=>Fournisseur::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarcheRequest $request)
    {
        $bonCmd=new Marche();
        $bonCmd->numMarche=$request->numMarche;
        $bonCmd->dateCmd=$request->dateCmd;
        $bonCmd->fournisseur_id=$request->fournisseur;
        $bonCmd->save();
        $request->session()->flash("factureN","Le marché a été ajouter avec succés");
        return redirect()->route("marches.index");
    }

    /**
     * Display the specified resource.
     */
    public function show( $marche)
    {
        return view("marches.show",["marche"=>Marche::find($marche)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marche $marche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcheRequest $request, Marche $marche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marche $marche)
    {
        //
    }
}
