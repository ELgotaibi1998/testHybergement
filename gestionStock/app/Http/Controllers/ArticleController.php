<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Categorie;
use App\Models\Emplacement;
use App\Models\Fournisseur;
use App\Models\Image;
use App\Models\Unite;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function notify()
    {
        $art=Article::all()->where("qteStock","<",10);
       if(auth()->user()->role=="admin" &&  count($art)!=0){
        foreach ($art as $a) {
            Auth()->user()->notify(new TestNotification($a));
        }
       }
     
    
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request("id")!=null)
        return view("articles.index",["articles"=>Article::where('categorie_id',strip_tags(request("id"))) ->paginate(6),"categories"=>Categorie::all(),"unites"=>Unite::all(),"emplacements"=>Emplacement::all()]);
        return view("articles.index",["articles"=>Article:: paginate(6),"categories"=>Categorie::all(),"unites"=>Unite::all(),"emplacements"=>Emplacement::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("articles.create",["categories"=>Categorie::all(),"unites"=>Unite::all(),"emplacements"=>Emplacement::all()]);
    }
    public function art()
    {
        return view("articles",["articles"=>Article::all(),"categories"=>Categorie::all(),"unites"=>Unite::all(),"emplacements"=>Emplacement::all(),"fournisseurs"=>Fournisseur::all()]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article=new Article();
        $article->designation=$request->designation;
        $article->qteStock=$request->qte;
        $article->stockMin=$request->stockMin;
        $article->stockMax=$request->stockMax;
        $article->alert=$request->stockAlert;
        $article->securite=$request->stockSecurite;
        $article->pu=$request->pu;
        $article->dateInscription=$request->dateAjout;
        $article->reference=$request->reference;
        $article->categorie_id=$request->categorie;
        $article->emplacement_id=$request->emplacement;
        $article->unite_id=$request->unite;
        $article->observation=$request->observation;
        $article->save();
        if($request->images!=null)
        foreach ($request->images as $img) {
            $image=new Image();
            $image->image=$img->store("images");
            $art=Article::where("designation",$request->designation)->where("reference",$request->reference)->get();
           $image->article_id=$art[0]->id;
           $image->save();
        }
        
        $request->session()->flash("article","L'article' a été ajouter avec succés");
        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show( $article)
    {
        // $article=Article::find($article);
        // dd($article->categorie->categorie);
        return view("articles.show",["article"=>Article::find($article)]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $article)
    {
        return view("articles.edit",["article"=>Article::find($article),"categories"=>Categorie::all(),"unites"=>Unite::all(),"emplacements"=>Emplacement::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request,  $art)
    {
        
        $article=Article::find($art);
        $article->designation=$request->designation;
        $article->qteStock=$request->qte;
        $article->stockMin=$request->stockMin;
        $article->pu=$request->pu;
        $article->dateInscription=$request->dateAjout;
        $article->reference=$request->reference;
        $article->categorie_id=$request->categorie;
        $article->emplacement_id=$request->emplacement;
        $article->unite_id=$request->unite;
        $article->observation=$request->observation;
        $article->save();
        if ($request->images!=null) {
             foreach ($request->images as $img) {
            $image=new Image();
            $image->image=$img->store("images");
            $art=Article::where("designation",$request->designation)->where("reference",$request->reference)->get();
           $image->article_id=$art[0]->id;
           $image->save();
        }
        }
        $sup=explode(";",$request->imageSupprimer) ;
        for ($i=0;$i<count($sup)-1;$i++) {
           $imga= Image::find(intval($sup[$i]));
            Storage::delete($imga->image);
           $imga->delete();
        }
        $request->session()->flash("article","L'article a été modifier avec succés");
        return redirect()->route("articles.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request,$id)
    {

      $article=Article::find($id);
      $article->delete();
       $request->session()->flash("article","L'article' a été supprimer avec succés");
      return redirect()->route("articles.index");

    }
    public function search()
    {
       return view("articles.search",["categories"=>Categorie::all(),"unites"=>Unite::all(),"emplacements"=>Emplacement::all()]);
    }
    public function resSearch()
    {
       $categorie=request("categorie") ;
        $emplacement=request("emplacement");
        $reference=request("reference") ;
        $designation=request("designation") ;
        $articles=Article::where("categorie_id",$categorie)->where("emplacement_id", $emplacement)->where("reference","like","%".$reference."%")->where("designation","like","%".$designation."%")->get();
       
        // $articles=DB::select("select * from articles where  categorie_id=$categorie and emplacement_id= $emplacement and reference LIKE '%$reference%' and designation LIKE '%$designation%'");
        return view("articles.getArticles",["articles"=>$articles]);
    //   return  response()->json($articles);
    }
    public function refSearch()
    {
        $reference=request("reference") ;
        $articles=Article::where("reference",$reference)->get();
        return view("articles.index",["articles"=>$articles,"categories"=>Categorie::all(),"unites"=>Unite::all(),"emplacements"=>Emplacement::all()]);
    }

}
