@extends("layouts.app")
@section("content")
<div class="container">
 <h1>Modifier un Emplacement</h1>
 <form action="{{route('emplacements.update',['emplacement'=>$emp['id']])}}" method="post">
    @method("put")
    @csrf
   <table class="table">
   <tr><td>Emplacement : </td> <td><input type="text" name="emplacement" value="{{$emp->emplacement}}"></td> </tr>
      
<tr> <td><a class="btn btn-secondary" href="{{route('emplacements.index')}}">Retour</a><br><br>  </td> 
  <td> <button  class="btn btn-success"> Modifier</button></td></tr>
</table>
</form>
@endsection