<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Http\Requests\StoreFournisseurRequest;
use App\Http\Requests\UpdateFournisseurRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FournisseurController extends Controller
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
        return view('fournisseurs.index',["fournisseurs"=>Fournisseur::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("fournisseurs.create",['categories'=>Categorie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFournisseurRequest $request)
    {
        $validate=$request->validate([
            "email"=>"unique:fournisseurs,email",
            "tel"=>"numeric",
        ]);
        $f=new Fournisseur();
        $f->nom=$request->nom;
        $f->email=$request->email;
        $f->tel=$request->tel;
        $f->adresse=$request->adresse;
        $f->categorie_id=$request->categorie;
        $f->save();
        $request->session()->flash("fournisseur","Le fournisseur a été ajouter avec succés");
        return redirect()->route("fournisseurs.index");
    }

    /**
     * Display the specified resource.
     */
    public function show( $fournisseur)
    {
        return view("fournisseurs.show",['fournisseur'=>Fournisseur::find($fournisseur)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $fournisseur)
    {
        return view("fournisseurs.edit",["fournisseur"=>Fournisseur::find($fournisseur),"categories"=>Categorie::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFournisseurRequest $request,  $fournisseur)
    {
        $validate=$request->validate([
            "email"=>Rule::unique("fournisseurs","email")->ignore($fournisseur),
            "tel"=>"numeric",
        ]);
        $f=Fournisseur::find($fournisseur);
        $f->nom=$request->nom;
        $f->email=$request->email;
        $f->tel=$request->tel;
        $f->adresse=$request->adresse;
        $f->categorie_id=$request->categorie;
        $f->save();
        $request->session()->flash("fournisseur","Le fournisseur a été modifier avec succés");
        return redirect()->route("fournisseurs.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
    }
}
