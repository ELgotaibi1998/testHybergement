@extends('layouts.app')
 @section('content')
 <br>
 <u><h1>Ajouter un Salle</h1></u><br>
<table class="table">
      
<form action="{{route('salles.store')}}" method="post">
    @csrf
       <tr><td>Nom : </td> <td><input type="test" name="nom"></td> </tr>
       <tr><td>Service : </td> <td><input type="text" name="service"></td> </tr>
      
      
<tr> <td><a class="btn btn-secondary" href="{{route('salles.index')}}">Retour</a><br><br> <td></td>   <td> <button  class="btn btn-success"> Enregister</button></td></tr>

</form>

    </table>

@endsection
