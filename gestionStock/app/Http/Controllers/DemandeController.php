<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use App\Models\Article;
use App\Models\Personne;
use App\Models\Salle;
use App\Models\Unite;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class DemandeController extends Controller
{
    public function __construct()
    {
       $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
     { 
        // dd(Demande::find(1)->salles()->withTrashed()->get()[0]->nom);
        if(Auth::user()->role=="admin")
        return view("demandes.index",["demandes"=>Demande::paginate(3)]);
        return view("demandes.index",["demandes"=>Demande::where("user_id",Auth::user()->id)->paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("demandes.create",["article"=>Article::find(strip_tags(request("article"))),"salles"=>Salle::all()
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDemandeRequest $request)
    {
        // $qte=Article::find($request->article)->qteStock;
        // if($qte<=$request->qte) abort("403");
        $demande=new Demande();
        $demande->dateDemande=$request->dateD;
        $demande->qteArticle=$request->qte;
        $demande->article_id=$request->article;
        $demande->unite_id=$request->unite;
        $demande->user_id=Auth::user()->id;
        if(request("personne")!=null)
        $demande->personne_id=request("personne");
        else if(request("salle")!=null)
        $demande->salle_id=request("salle");
        $demande->save();
        $request->session()->flash("demande","La demande a été ajouter avec succés");
        return redirect()->route("demandes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(  $demande)
    {
        return view("demandes.show",["demande"=>Demande::withTrashed()->where("id",$demande)->get()[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $demande)
    {
        return view("demandes.edite",["demande"=>Demande::find($demande),"salles"=>Salle::all(),"unites"=>Unite::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemandeRequest $request,  $demande)
    {
        // $qte=Article::find($request->article);
        // if($qte<=$request->qte) abort("403");
        $demande= Demande::find($demande);
        $demande->dateDemande=$request->dateD;
        $demande->qteArticle=$request->qte;
        $demande->article_id=$request->article;
        $demande->unite_id=$request->unite;
        $demande->user_id=Auth::user()->id;
        if(request("personne")!=null)
        $demande->personne_id=request("personne");
        else if(request("salle")!=null)
        $demande->salle_id=request("salle");
        $demande->save();
        $request->session()->flash("demande","La demande a été modifier avec succés");
        return redirect()->route("demandes.index");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
       $demande->delete();
        return redirect()->route("demandes.index");
    }
    public function getD()
    {
        if(request("demandeur")=="personne")
        return response()->json(Personne::all());
        if(request("demandeur")=="salle")
        return response()->json(Salle::all());
    }
}
