<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Http\Requests\StoreSalleRequest;
use App\Http\Requests\UpdateSalleRequest;

class SalleController extends Controller
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
        return view("Salle.index",['Salles'=> Salle::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Salle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalleRequest $request)
    {
       
        $salle = new Salle();
     
        $salle->nom = $request->nom;
        $salle->service = $request->service;
        $salle->save();
        $request->session()->flash("salle","La salle a été ajouter avec succés");
        return redirect()->route('salles.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function show(Salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('salle.edit',['sal'=>Salle::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalleRequest  $request
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalleRequest $request, $id)
    {
        $salle = salle::findOrFail($id);
       
        $salle->nom= $request->input('nom');
        $salle->service = $request->input('service');
        $salle->save();
        $request->session()->flash("salle","La salle a été modifier avec succés");
        return redirect()->route("salles.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salle = salle::findOrFail($id);
        $salle->delete();
        return redirect()->route("salles.index");

    }
}
