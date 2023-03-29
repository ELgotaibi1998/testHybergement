@extends('layouts.app')
 @section('content')
 <br>
 <u><h3>Ajouter unité</h3></u>
 <br>
 <picture>
    <source media="(min-width: )" srcset="">
    <img src="" alt="">
 </picture>
<table class="table">
      
<form action="{{route('unites.store')}}" method="post">
    @csrf
       <tr><td>Unité : </td> <td><input type="test" name="Unite"></td> </tr>
      
      
<tr> <td><a class="btn btn-secondary" href="{{route('unites.index')}}">Retour</a><br><br> <td></td><td> <button  class="btn btn-success"> Enregister</button></td></tr>

</form>

    </table>

@endsection
