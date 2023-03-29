<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use App\Http\Requests\StoreEmplacementRequest;
use App\Http\Requests\UpdateEmplacementRequest;

class EmplacementController extends Controller
{
    public function __construct()
    {
       $this->middleware("auth");
       $this->middleware("admin");
    }
    public function index()
    { return view("emplacements.index",['emplacements'=> Emplacement::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emplacements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmplacementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmplacementRequest $request)
        { 
            $emplacement = new Emplacement();
        
            $emplacement->emplacement = $request->emplacement;
            
            $emplacement->save();
            $request->session()->flash("emplacement","L'emplacement a été ajouter avec succés");
            return redirect()->route('emplacements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emplacement  $emplacement
     * @return \Illuminate\Http\Response
     */
    public function show(Emplacement $emplacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emplacement  $emplacement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('emplacements.edit',['emp'=>Emplacement::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmplacementRequest  $request
     * @param  \App\Models\Emplacement  $emplacement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmplacementRequest $request, $id)
    {
        $emplacement = Emplacement::findOrFail($id);
       
        $emplacement->emplacement= $request->input('emplacement');
        $emplacement->save();
        $request->session()->flash("emplacement","L'emplacement' a été modifier avec succés");
        return redirect()->route("emplacements.index");
    }

    public function destroy( $id)
    {
        $emp = Emplacement::findOrFail($id);
        $emp->delete();
        return redirect()->route("emplacements.index");
      
    }
}
