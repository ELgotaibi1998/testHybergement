@extends("layouts.app")
@section("content")
<div class="container">
<u><h1>Détail  Facture</h1></u>
<table class="table">
    @if($fact->bonCmd_id!=null )
    <tr id="test"><td>Bon de commande</td><td><input type="text" name="BonCmd" readonly value="{{$fact->bonCmd->numBonCmd}}"></td></td> </tr>
  @else
  <tr id="test"><td>Marché</td><td><input type="text" name="BonCmd" readonly value="{{$fact->marches->numMarche}}"></td></td> </tr>
      @endif
 
       <tr><td>dateCmd : </td> <td><input type="datetime-local" readonly name="dateCmd" value="{{$fact->dateCmd}}"></td> </tr>
       <tr><td>qte : </td> <td><input type="text" name="qte" readonly value="{{$fact->qte}}"></td> </tr>
       <tr><td>prixT : </td> <td><input type="text" name="prixt" readonly value="{{$fact->prixT}}"></td> </tr>
       <tr><td>tva : </td> <td><input type="text" name="tva" readonly value="{{$fact->tva}}"></td> </tr>
       <tr><td>prixTTC: </td> <td><input type="text" name="prixTTC" readonly value="{{$fact->prixTTC}}"></td> </tr>
      
       <tr><td>Fornisseur :</td> <td><input type="text" readonly value="{{$fact->fournisseurs->nom}}"></td></td> </tr>
          <tr><td>Article :</td> <td><input type="text" name="BonCmd" id="hh" onchange="f()" checked value="{{$fact->articles->designation}}"></td></td> </tr>
          <tr><td>signature : </td> <td><input type="text" name="signature" value="{{$fact->signature}}"></td> </tr>
        
  <tr> <td><a class="btn btn-secondary" href="{{route('factures.index')}}">Retour</a><br><br>  </td> <td></td>
  </tr>
    </table>

</div>
@endsection
<style>
  select{
    width: 100%
  }
 td input{
    width: 100%
  } 
</style>