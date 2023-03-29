@extends("layouts.app")
@section("content")
<div class="container"><br>
  @if ( session("categorie"))
  <div class="alert alert-success" role="alert">
   {{ session("categorie")}}
  </div>
  @endif
 <h1>liste des Catégories des Matériels</h1>
    <div style="display:flex;flex-wrap:wrap">
        @foreach ($categories as $art)
        <a href="{{route('articles.index',['id'=>$art->id])}}">
          <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$art->categorie}}</h5>
        </div>
      </div>
        </a>
    
    @endforeach
    </div>
</div>
   
    
@endsection