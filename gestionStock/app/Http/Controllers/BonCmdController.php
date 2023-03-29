<?php

namespace App\Http\Controllers;

use App\Models\BonCmd;
use App\Http\Requests\StoreBonCmdRequest;
use App\Http\Requests\UpdateBonCmdRequest;
use App\Models\Fournisseur;

class BonCmdController extends Controller
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
        return view("bonCmd.index",["bonCmds"=>BonCmd::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("bonCmd.create",['fournisseurs'=>Fournisseur::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBonCmdRequest $request)
    {
        $bonCmd=new BonCmd();
        $bonCmd->numBonCmd=$request->numBonCmd;
        $bonCmd->dateCmd=$request->dateCmd;
        $bonCmd->fournisseur_id=$request->fournisseur;
        $bonCmd->save();
        $request->session()->flash("factureN","Le bon de commande a été ajouter avec succés");
        return redirect()->route("bonCmds.index");
    }

    /**
     * Display the specified resource.
     */
    public function show( $bonCmd)
    {
        return view("bonCmd.show",["bonCmd"=>BonCmd::find($bonCmd)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BonCmd $bonCmd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBonCmdRequest $request, BonCmd $bonCmd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonCmd $bonCmd)
    {
        //
    }
}
