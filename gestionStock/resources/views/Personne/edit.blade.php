@extends("layouts.app")
@section("content")
<div >
  <br>
<u><h1>Modifier un Personne</h1></u> 
 <br>
 <form action="{{route('personnes.update',['personne'=>$prs['id']])}}" method="post">
    @method("put")
    @csrf
   <table class="table">
   <tr><td>Nom : </td> <td><input type="text" name="nom" value="{{$prs->nom}}"></td> </tr>
       <tr><td>Service : </td> <td><input type="text" name="service" value="{{$prs->service}}"></td> </tr>
       <tr> <td><a class="btn btn-secondary" href="{{route('personnes.index')}}">Retour</a>  </td> <td></td>
  <td> <button  class="btn btn-success"> Modifier</button></td></tr>
</table>

</form>
@endsection