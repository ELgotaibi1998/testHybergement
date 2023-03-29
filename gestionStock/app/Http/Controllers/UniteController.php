<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use App\Http\Requests\StoreUniteRequest;
use App\Http\Requests\UpdateUniteRequest;

class UniteController extends Controller
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
        return view("Unite.index",['unites'=> Unite::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Unite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUniteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniteRequest $request)
    {
        $unite = new Unite();
     
        $unite->unite = $request->Unite;
        
        $unite->save();
        $request->session()->flash("unite","L'unite a été ajouter avec succés");
        return redirect()->route('unites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function show(Unite $unite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Unite.edit',['unt'=>Unite::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUniteRequest  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUniteRequest $request,$id)
    {
        $unite = Unite::findOrFail($id);
       
        $unite->unite= $request->input('Unite');
        $unite->save();
        $request->session()->flash("unite","L'unite a été modifier avec succés");
        return redirect()->route("unites.index");
    }

    public function destroy( $id)
    {
        Unite::findOrFail($id)->delete();
        return redirect()->route("unites.index");
    }
}
