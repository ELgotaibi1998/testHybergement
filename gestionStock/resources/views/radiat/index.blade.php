@extends("layouts.app")
@section("content")
<div class="container">
  <br>
  @if ( session("radiat"))
  <div class="alert alert-success" role="alert">
   {{ session("radiat")}}
  </div>
  @endif
 <u><h1>  Radiat</h1> </u>
 <div style="display: flex;flex-wrap:wrap">
    @foreach ($radiats as $d)
     <div class="card" style="width: 18rem;margin:10px">
      <div class="card-header">Désignation : {{$d->articles()->withTrashed()->get()[0]->designation}}</div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Date de radiat : {{$d->dateRadiat}}</li>
      <li class="list-group-item">Motif : {{$d->motif }} </li>
    </ul>
  </div> 
 @endforeach
 </div>
</div>
   
    
@endsection