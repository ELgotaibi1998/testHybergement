@extends("layouts.app")
@section("content")
<div > <br>
 <u> <h1>Modifier une Affectation</h1></u> <br>
 <form action="{{route('affectations.update',['affectation'=>$aff->id])}}" method="post">
 
      
        @method("put")
    @csrf
       <table class="table">
        <tr><td>date Reception : </td> <td><input type="datetime-local" name="dateR" value="{{$aff->dateReception}}" ></td> </tr>
       <tr><td>Emergent Reception : </td> <td><input type="text" name="EmgR" value="{{$aff->emergentReception}}"></td> </tr>
       <tr><td>Date Retour : </td> <td><input type="datetime-local" name="dateRt" value="{{$aff->dateRetour}}"></td> </tr>
       <tr><td>Motif Retour : </td> <td><input type="text" name="motifR" value="{{$aff->motifRetour}}"></td> </tr>
       <tr><td>Num Inventaire: </td> <td><input type="text" name="numI" value="{{$aff->numInventaire}}"></td> </tr>
       <tr><td>Etat: </td> <td><input type="text" name="etat" value="{{$aff->etat}}"></td> </tr>
       
       <tr><td>Demande :</td> <td> <input type="text" readonly name="demande" value="{{$aff->demande_id}}">  </td> </tr>
        
  <tr> <td><a class="btn btn-secondary" href="{{route('affectations.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
</svg></a><br><br>  </td> <td></td>
  <td> <button  class="btn btn-success"> Modifier</button></td></tr>
    </table>
 </form>
 

</div>
@endsection
<style>
  input{
    width: 100%
  }
  select{
    width: 100%
  }
</style>