<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Demande;
use App\Models\Movement;
use Illuminate\Http\Request;

class BordTController extends Controller
{
    
    public function __construct()
    {
       $this->middleware("auth");
    //    $this->middleware("admin");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("home",['bords'=>Article::all(),"categories"=>Categorie::count(),"affectations"=>Affectation::count(),"demandes"=>Demande::withTrashed()->get(),"mouvements"=>Movement::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
