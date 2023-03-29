@extends("layouts.app")
@section("content")
<div >
  <br>
<u><h1>Modifier un Unité</h1></u> 
 <br>
 <table class="table">
 <form action="{{route('unites.update',['unite'=>$unt['id']])}}" method="post">
    @method("put")
    @csrf
   
   <tr><td>Unité : </td> <td><input type="text" name="Unite" value="{{$unt->unite}}"></td> </tr>
      
<tr> <td><a class="btn btn-secondary" href="{{route('unites.index')}}">Retour</a>  </td> 
  <td> <button  class="btn btn-success"> Modifier</button></td></tr>
</table>
</form>
@endsection