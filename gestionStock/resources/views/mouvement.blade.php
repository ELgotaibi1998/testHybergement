@extends('layouts.app')
 @section('content')
 <br>
 <u><h3>Liste des mouvements</h3></u>
 <hr>
<br>
 <table class="table table-striped table-hover" border="1" width="60%" align="center">
<tr><th>Désignation</th><th>Quantité global</th> <th>Quantité Entrer</th><th>Date Entrer</th><th>Quantité sortie</th><th>Date sortie</th><th>Quantité final</th> </tr> 
@foreach($mouvements as $aff) 
<tr><td>{{$aff->articles()->withTrashed()->get()[0]->designation}}</td><td> {{$aff->qteGlobal}}</td> <td>{{$aff['QEntrer']}}</td><td>{{$aff['dateEntrer']}}</td><td> {{$aff->qteSortie}}</td> <td> {{$aff->dateSortie}}</td> <td> {{$aff->articles()->withTrashed()->get()[0]->qteStock}}</td> 
</tr>
    
@endforeach
</table>
<p>{{$mouvements->links()}}</p>
@endsection