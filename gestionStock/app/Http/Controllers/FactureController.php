<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Marche;
use App\Models\BonCmd;
use App\Models\Fornisseur;
use App\Models\Article;
use App\Http\Requests\StoreFactureRequest;
use App\Http\Requests\UpdateFactureRequest;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FactureController extends Controller
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
        return view("Facture.index",['bonCmds'=> BonCmd::paginate(5),"marches"=>Marche::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Facture.create',['fournisseurs'=> Fournisseur::all(),'articles'=> article::all(),"bonCmd"=>BonCmd::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFactureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactureRequest $request)
    {
        $facture = new Facture();
        $facture->qte = $request->input('qte');
        $facture->prixT = $request->input('prixt');
        $facture->tva = $request->input('tva');
        $facture->prixTTC = $request->input('prixTTC');
        $facture->article_id = $request->input('Article');
        $facture->signature = $request->input('signature');
       
        if($request->numBcmd!=null){
            $facture->bonCmd_id=$request->numBcmd;
            $facture->save();
            // $request->session()->flash('key', 'value');
            $request->session()->flash("factureN","Le bon de commande a été ajouter avec succés");
        return redirect()->route("bonCmds.index");
        }
        else if($request->numMarche!=null){
            $facture->marche_id=$request->numMarche;
             $facture->save();
             $request->session()->flash("factureN","Le marché a été ajouter avec succés");
        return redirect()->route('marches.index');
        }

    }
    public function AjouterFacture( Request $request)
    {
        $obj=json_decode($_GET['obj'],false);
        $bonCmd=new BonCmd();$marche=new Marche();
        if( $obj->bonCmd==true){
            
        $bonCmd->numBonCmd=$obj->numFact;
        $bonCmd->dateCmd=$obj->dateCmd;
        $bonCmd->fournisseur_id=$obj->fournisseur;
        $bonCmd->save();
                    
        }
        else if($obj->bonCmd==false){
            
        $marche->numMarche=$obj->numFact;
        $marche->dateCmd=$obj->dateCmd;
        $marche->fournisseur_id=$obj->fournisseur;
        $marche->save();
       
        } 
        foreach ($obj->articlesExester as   $value) {
            $facture = new Facture();
        $facture->qte = $value->qte;
        $facture->prixT = $value->prixT;
        $facture->tva = $value->tva;
        $facture->prixTTC = $value->prixTTC; 
        $facture->signature = $obj->signature;
             $facture->article_id=$value->idArticle;
            $facture->bonCmd_id= $bonCmd->id;
            $facture->marche_id=$marche->id;
             $facture->save();
        }
        $art=null;
        foreach ($obj->articles as   $value) {
            $art=new Article();
            $art->designation=$value->designation;
            $art->qteStock=$value->qte;
            $art->stockMin=$value->stockMin;
            $art->pu=$value->pu;
            $art->dateInscription=$obj->dateCmd;
            $art->reference=$value->reference;
            $art->categorie_id=$value->categorie;
            $art->emplacement_id=$value->emplacement;
            $art->unite_id=$value->unite;
            $art->observation=$value->observation;
            $art->save();
            $facture = new Facture();
            $facture->qte = $value->qte;
            $facture->prixT = $value->prixT;
            $facture->tva = $value->tva;
            $facture->prixTTC = $value->prixTTC; 
            $facture->signature = $obj->signature;
            $facture->bonCmd_id= $bonCmd->id;
             $facture->marche_id=$marche->id;
            $facture->article_id=$art->id;
            $facture->save();
       }
       $request->session()->flash("factureN","La facture a été ajouter avec succés");
        // $_SESSION["factureN"]="La facture a été ajouter avec succés";
        
return  $obj->bonCmd  ;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(Facture::find($id)->marches->id);
      return view('Facture.show',['fact'=>Facture::find($id)]);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(Facture::find(3)->bonCmd_id);
        return view('Facture.edit',['fact'=>Facture::find($id),'fournisseurs'=> Fournisseur::all(),'articles'=> Article::all(),"bonCmd"=>BonCmd::all(),"marches"=>Marche::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFactureRequest  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactureRequest $request,  $id)
    {
        $facture = Facture::findOrFail($id);
       
        $facture->dateCmd = $request->input('dateCmd');
        $facture->qte = $request->input('qte');
        $facture->prixT = $request->input('prixt');
        $facture->tva = $request->input('tva');
        $facture->prixTTC = $request->input('prixTTC');
        $facture->fournisseur_id = $request->input('Fornisseur');
        $facture->article_id = $request->input('Article');
         $facture->signature = $request->input('signature');
        if($request->numBcmd!=null){
            $facture->bonCmd_id=$request->numBcmd;
            $facture->marche_id=null;
            $facture->save();
        return redirect()->route("bonCmds.index");
        }
        else if($request->numMarche!=null){
            $facture->marche_id=$request->numMarche;
            $facture->bonCmd_id=null;
            $facture->save();
            return redirect()->route("marches.index");
        }
 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        
        $facture = Facture::findOrFail($id);
        $bon=BonCmd::where("facture_id",$id)->delete();
        
        $bon=Marche::where("facture_id",$id)->delete();
        $facture->delete();
        return redirect()->route("factures.index");

    }
    public function getB()
    {
        if(request("fact")=="bonCmd")
        return response()->json(BonCmd::all());
        if(request("fact")=="marche")
        return response()->json(Marche::all());
    }
}