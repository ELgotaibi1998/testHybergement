@extends('layouts.app')
@section('content') <br>
@if ( session("fournisseur"))
<div class="alert alert-success" role="alert">
 {{ session("fournisseur")}}
</div>
@endif
<a href="{{route('fournisseurs.create')}}"><button  class="btn btn-primary">Ajouter</button></a> <br><br>
<u> <h3>Liste des Fournisseurs</h3></u> 
<div width="80%" >  
<table class="table table-striped table-hover"  border="1" >
<tr><th>Catégorie</th><th>Nom</th><th>Tel</th><th>Action</th> </tr> 
@foreach($fournisseurs as $fact)

<tr><td>{{$fact->categories->categorie}}</td><td>{{$fact['nom']}}</td><td>{{$fact['tel']}}</td>
<td><a href="{{route('fournisseurs.edit',['fournisseur'=>$fact['id']])}}" ><button class="btn btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
 <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg></button></a> | <a href="{{route('fournisseurs.show',['fournisseur'=>$fact['id']])}}" ><button class="btn btn-primary" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
  </svg></button></a>
</td></tr>

@endforeach
</table>
<p>
    {{$fournisseurs->links()}}
</p>
</div>
@endsection
