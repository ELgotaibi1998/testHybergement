@extends("layouts.app")
@section("content")
<div >
 <u><h1>Modifier Salle</h1></u>
 <form action="{{route('salles.update',['salle'=>$sal['id']])}}" method="post">
    @method("put")
    @csrf
   <table class="table">
   <tr><td>Nom : </td> <td><input type="text" name="nom" value="{{$sal->nom}}"></td> </tr>
       <tr><td>Service : </td> <td><input type="text" name="service" value="{{$sal->service}}"></td> </tr>
<tr> <td><a class="btn btn-secondary" href="{{route('salles.index')}}">Retour</a>  </td> 
  <td> <button  class="btn btn-success"> Modifier</button></td></tr>
</table>
</form>
@endsection