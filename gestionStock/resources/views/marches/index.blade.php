@extends("layouts.app")
@section("content")
<br>
@if ( session("factureN"))
<div class="alert alert-success" role="alert">
 {{ session("factureN")}}
</div>
@endif
<a href="{{route('marches.create')}}"><button  class="btn btn-primary">Ajouter</button></a>
<br>
 <u> <h3  >Marché</h3></u><br>
<hr>
@foreach ($marches as $b)
    <div class="card"  style="padding-left: 2%;padding-right: 2%;margin-bottom: 10px;"> <br>
      <h5 class="card-title">Numéro {{$b->numMarche}}</h5>
      <p>le {{$b->dateCmd}}</p>
      <p>le  Fournisseur : {{$b->fournisseurs->nom}}</p>
                        <div class="card-body">
                                        <table class="table table-striped table-hover">
                                        <tr><th>Article</th><th>Qte</th><th>PT</th><th>TVA</th></tr>
                                        @foreach ($b->factures as $f )
                                            <tr><td>{{$f->articles()->withTrashed()->get()[0]->designation}}</td><td>{{$f->qte}}</td><td>{{$f->prixT}}</td><td>{{$f->tva." %"}}</td></tr>
                                        @endforeach
                                      
                                        </table>
                        </div>
                        <div class="card-footer"> <a href="{{route('marches.show',['march'=>$b->id])}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg></a>  </div>
    </div>

@endforeach
<p>{{$marches->links()}}</p>
@endsection