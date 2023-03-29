@extends('layouts.app')
 @section('content')
 <br>
 <u><h3>Ajouter Emplacement</h3></u> <br>
<table class="table">
      
<form action="{{route('emplacements.store')}}" method="post">
    @csrf
       <tr><td>Emplacement : </td> <td><input type="test" name="emplacement"></td> </tr>
      
      
      
<tr> <td><a class="btn btn-secondary" href="{{route('emplacements.index')}}">Retour</a><br><br> <td></td><td> <button  class="btn btn-success"> Enregister</button></td></tr>

</form>

    </table>

@endsection
