<?php

namespace App\Http\Controllers;

use App\Models\Radiat;
use App\Http\Requests\StoreRadiatRequest;
use App\Http\Requests\UpdateRadiatRequest;
use App\Models\Article;

class RadiatController extends Controller
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
        return view("radiat.index",['radiats'=>Radiat::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // dd(request("id"));
        return view("radiat.create",["article"=>Article::find(strip_tags(request("id")))]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRadiatRequest $request)
    {
        $radiat=new Radiat();
        $radiat->dateRadiat=$request->dateRadiat;
        $radiat->motif=$request->motif;
        $radiat->article_id=$request->article;
        $radiat->save();
        Article::find($request->article)->delete();
        $request->session()->flash("radiat","Le radiat a été ajouter avec succés");
        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Radiat $radiat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Radiat $radiat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRadiatRequest $request, Radiat $radiat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Radiat $radiat)
    {
        //
    }
}
