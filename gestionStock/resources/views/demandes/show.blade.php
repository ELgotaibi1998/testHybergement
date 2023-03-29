@extends("layouts.app")
@section("content")
<div class="container"><br>
  <u>
 <h1> la demande de M {{$demande->users()->withTrashed()->get()[0]->name}}</h1><br>
  </u>
         <table class="table"> 
          <tr><td> Pour 
            @if ($demande->salle_id!=null)
              la Salle : {{$demande->salles()->withTrashed()->get()[0]->nom}}
            @else
            le Personnel : {{$demande->personnes()->withTrashed()->get()[0]->nom}}
            @endif </td></tr>
      <tr><td>date de demande : {{$demande->dateDemande}} </td> </tr>
        <tr><td>l ' article : {{$demande->articles()->withTrashed()->get()[0]->designation }}</td> </tr>
         
        <tr><td>Quantité : {{$demande->qteArticle}}  {{$demande->unites()->withTrashed()->get()[0]->unite}}</td> 
          </tr> 
       </table>
</div>

@endsection
 <style>
  select{
    width: 100%
  }
 td input{
    width: 100%
  }
</style>
