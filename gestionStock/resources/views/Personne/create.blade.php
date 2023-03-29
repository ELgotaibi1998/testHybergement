@extends('layouts.app')
 @section('content')
 <br>
 <u><h3>Ajouter Personnel</h3></u> <br>
<table class="table">
      
<form action="{{route('personnes.store')}}" method="post">
    @csrf
       <tr><td>Nom : </td> <td><input type="test" name="nom"></td> </tr>
       <tr><td>Service : </td> <td><input type="text" name="service"></td> </tr>
      
      
<tr> <td><a class="btn btn-secondary" href="{{route('personnes.index')}}">Retour</a><br><br> <td></td><td> <button  class="btn btn-success"> Enregister</button></td></tr>

</form>

    </table>

@endsection
