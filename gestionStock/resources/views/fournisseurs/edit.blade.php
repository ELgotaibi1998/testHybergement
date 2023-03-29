@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fournisseur</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('fournisseurs.update',["fournisseur"=>$fournisseur->id]) }}">
                        @csrf
                        @method("put")
                        <div class="row mb-3">
                            <label for="cat" class="col-md-4 col-form-label text-md-end">Catégorie</label>

                            <div class="col-md-6">
                                <select name="categorie" id="" class="form-control">
                                    @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}" @if ($cat->id==$fournisseur->categorie_id)
                                            selected
                                        @endif>{{$cat->categorie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$fournisseur->nom}}" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$fournisseur->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Tel</label>

                            <div class="col-md-6">
                                <input id="password" type="number" value="{{$fournisseur->tel}}" class="form-control @error('tel') is-invalid @enderror" name="tel" required autocomplete="new-password">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="adresse" class="col-md-4 col-form-label text-md-end">Adresse</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" value="{{$fournisseur->adresse}}" class="form-control @error('adresse') is-invalid @enderror" name="adresse" required autocomplete="new-password">

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
