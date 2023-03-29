<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Http\Requests\StorePersonneRequest;
use App\Http\Requests\UpdatePersonneRequest;

class PersonneController extends Controller
{
    public function __construct()
    {
       $this->middleware("auth");
       $this->middleware("admin");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Personne.index",['personnes'=> Personne::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Personne.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepersonnesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonneRequest $request)
    {
        $personne = new Personne();
     
        $personne->nom = $request->nom;
        $personne->service = $request->service;
        $personne->save();
        $request->session()->flash("personne","La personne a été ajouter avec succés");
        return redirect()->route('personnes.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\personnes  $personnes
     * @return \Illuminate\Http\Response
     */
    public function show( $personnes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personnes  $personnes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Personne.edit',['prs'=>Personne::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepersonnesRequest  $request
     * @param  \App\Models\personnes  $personnes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonneRequest $request,  $id)
    {
        $personne = Personne::findOrFail($id);
       
        $personne->nom= $request->input('nom');
        $personne->service = $request->input('service');
        $personne->save();
        $request->session()->flash("personne","La personne a été modifier avec succés");
        return redirect()->route("personnes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personnes  $personnes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $personnes)
    {
        $p = Personne::findOrFail($personnes);
        $p->delete();
        return redirect()->route("personnes.index");
    }
}
