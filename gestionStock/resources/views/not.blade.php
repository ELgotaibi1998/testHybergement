<?php  use App\Models\user ;
use App\Models\Article ;
use App\Models\Salle ;
use App\Models\Personne ;
?>
@extends("layouts.app")
@section('content') <br>
   <u><h1>Notifications</h1></u> <br>
   
    <table class="table"   >
        @foreach (auth()->user()->notifications as $n)
        @if ($n->read_at==null)
                      @if (isset($n->data['article']) )
                        <tr><td style="background-color: rgb(171, 171, 189)"><form action="{{route("notifications.update",['notification'=>$n->id])}}" method="post">@csrf @method("put")
                          <a class="dropdown-item" href="{{route('articles.show',['article'=>$n->data['article_id']])}}"> {{"L'article ".$n->data['article']." a une quantité de ".$n->data['qteStock']}} | <button>ok</button> </a></form></td></tr>
                      @else
                        <tr><td style="background-color: rgb(171, 171, 189)"><form action="{{route("notifications.update",['notification'=>$n->id])}}" method="post">@csrf @method("put")
                          <a class="dropdown-item" href="{{route('demandes.show',['demande'=>$n->data['demande_id']])}}"> 
                          @if ( isset($n->data['demandeurS']) )
                          {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  la salle ".Salle::find($n->data['demandeurS'])->nom }} 
                          @else
                          {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  le personnel ".Personne::find($n->data['demandeurP'])->nom }} 
                          @endif
                        | <button>ok</button></form> </a></td></tr> 
                      @endif
        @else
                      @if (isset($n->data['article']) )
                        <tr><td > <a class="dropdown-item" href="{{route('articles.show',['article'=>$n->data['article_id']])}}"> {{"L'article ".$n->data['article']." a une quantité de ".$n->data['qteStock']}} </a></td></tr> 
                      @else
                        <tr><td >
                          <a class="dropdown-item" href="{{route('demandes.show',['demande'=>$n->data['demande_id']])}}"> 
                            @if ( isset($n->data['demandeurS']) )
                            {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  la salle ".Salle::find($n->data['demandeurS'])->nom}} 
                            @else
                            {{   User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  le personnel ".Personne::find($n->data['demandeurP'])->nom}} 
                            @endif 
                          </a>
                        </td></tr> 
                    @endif
        @endif
    @endforeach
    </table>
@endsection