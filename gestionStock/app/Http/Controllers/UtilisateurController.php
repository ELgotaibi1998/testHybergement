<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Validation\Rule;

class UtilisateurController extends Controller
{
    public function __construct()
    {
       $this->middleware("auth");
       $this->middleware("admin");
    }
    public function index()
    {
        return view("user.index",['utilisateurs'=>User::all()]);
    }
    public function create()
    {
        return view("user.create");
    }
    public function store(Request $data)
    {
        $data->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
        ]);
       $user=new User();
    
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = Hash::make($data->password);
            $user->role = $data->role;
            $user->save();
            $request->session()->flash("user","L'utilisateur a été ajouter avec succés");
            return redirect()->route("utilisateurs.index");
    }
    public function edit($id)
    {
       return view("user.edit",["utilisateur"=>User::find($id)]);
    }
    public function update(Request $data,$id)
    {
        $data->validate([
            "reference"=>Rule::unique('articles',"reference")->ignore($id, 'id'),
        ]);
        
       $user= User::find($id);
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = Hash::make($data->password);
            $user->role = $data->role;
            $user->save();
            $request->session()->flash("user","L'utilisateur a été modifier avec succés");
            return redirect()->route("utilisateurs.index");
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route("utilisateurs.index");
    }
}
