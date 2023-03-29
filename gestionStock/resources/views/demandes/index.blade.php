@extends("layouts.app")
@section("content")
<div > <br>
  @if ( session("demande"))
  <div class="alert alert-success" role="alert">
   {{ session("demande")}}
  </div>
  @endif
 <u><h1>  Demandes</h1> </u> 
 <div style="display: flex;flex-wrap:wrap">
    @foreach ($demandes as $d)
     <div class="card" style="width: 18rem;margin-top:10px;margin-left:10px">
    <div class="card-header">
      Demandeur : {{$d->users()->withTrashed()->get()[0]->name}} 
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Date de la demande : {{$d->dateDemande}}</li>
      <li class="list-group-item">Désignation : {{$d->articles()->withTrashed()->get()[0]->designation}}</li>
      <li class="list-group-item">Qauntité : {{$d->qteArticle }} {{$d->unites()->withTrashed()->get()[0]->unite}}</li>
      @if ($d->salle_id!=null)
          <li class="list-group-item">Pour la salle : {{$d->salles()->withTrashed()->get()[0]->nom }}</li>
          @else
          <li class="list-group-item">Pour le personnelle : {{$d->personnes()->withTrashed()->get()[0]->nom }}</li>
      @endif 
      <li class="list-group-item" style="display: flex"><a href="{{route('demandes.edit',['demande'=>$d->id])}}" ><button class="btn btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
      </svg></button> </a> | <form action="{{route('demandes.destroy',['demande'=>$d])}}" method="post">
          @csrf
          @method("delete")
          <button class="btn btn-danger"  onclick="return confirm('Voulez-Vous Vraiment supprimier!!!!!!!')" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
      </svg></button>
        </form></li>
    </ul>
  </div> 
 @endforeach
 </div>
 {{$demandes->links()}}
</div>
   
    
@endsection