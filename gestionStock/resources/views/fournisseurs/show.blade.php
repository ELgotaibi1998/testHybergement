@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fournisseur</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="cat" class="col-md-4 col-form-label text-md-end">Catégorie</label>

                            <div class="col-md-6"><input type="text" value="{{$fournisseur->categories->categorie}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$fournisseur->nom}}" class="form-control" readonly >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$fournisseur->email}}" class="form-control " readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Tel</label>

                            <div class="col-md-6">
                                <input id="password" type="number" value="{{$fournisseur->tel}}" class="form-control  " readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="adresse" class="col-md-4 col-form-label text-md-end">Adresse</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" value="{{$fournisseur->adresse}}" class="form-control  " readonly>
                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('fournisseurs.index')}}" class="btn btn-secondary">
                                    Retour
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
