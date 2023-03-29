@extends("layouts.app")
@section("content")
<div class="container">
<u><h1>Modifier un Facture</h1></u> 
 <form action="{{route('factures.update',['facture'=>$fact->id])}}" method="post">
    @method("put")
    @csrf
    @if($fact->bonCmd_id!=null )
      <label><h5>Bon Commande</h5> </label> 
  <input type="radio" name="BonCmd" id="hh" onchange="f()" checked value="BonCmd"></td>
  <td><label><h5>Marche</h5> </label>
  <input type="radio" name="BonCmd" id="hh07" onchange="f()"  value="marche"  > 
   <table class="table">
    <tr id="test"><td>Bon de commande</td><td><select name="numBcmd"  >
      @foreach ($bonCmd as $unite)
        <option value="{{$unite->id}}" @if(old("numBcmd")==$unite->id)
          selected
        @endif>{{$unite->numBonCmd}}</option>
      @endforeach
    </select></td> </tr>
  @else
  <label><h5>Bon Commande</h5> </label> 
  <input type="radio" name="BonCmd" id="hh" onchange="f()" value="BonCmd"></td>
  <td><label><h5>Marche</h5> </label>
  <input type="radio" name="BonCmd" id="hh07" onchange="f()" checked value="marche"  > 
   <table class="table">
      <tr id="test"><td>Numero de marché </td> <td><select name="numMarche"  >
        @foreach ($marches as $unite)
          <option value="{{$unite->id}}" @if(old("numBcmd")==$unite->id)
            selected
          @endif>{{$unite->numMarche}}</option>
        @endforeach
      </select></td> </tr>
 
      @endif
 
       <tr><td>dateCmd : </td> <td><input type="datetime-local" name="dateCmd" value="{{$fact->dateCmd}}"></td> </tr>
       <tr><td>qte : </td> <td><input type="text" name="qte" value="{{$fact->qte}}"></td> </tr>
       <tr><td>prixT : </td> <td><input type="text" name="prixt" value="{{$fact->prixT}}"></td> </tr>
       <tr><td>tva : </td> <td><input type="text" name="tva" value="{{$fact->tva}}"></td> </tr>
       <tr><td>prixTTC: </td> <td><input type="text" name="prixTTC" value="{{$fact->prixTTC}}"></td> </tr>
      
       <tr><td>Fornisseur :</td> <td><select name="Fornisseur" required >
            @foreach ($fournisseurs as $Fornisseur)
              <option value="{{$Fornisseur->id}}">{{$Fornisseur->nom}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Article :</td> <td><select name="Article" required >
            @foreach ($articles as $article)
              <option value="{{$article->id}}">{{$article->designation}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>signature : </td> <td><input type="text" name="signature" value="{{$fact->signature}}"></td> </tr>
        
  <tr> <td><a class="btn btn-secondary" href="{{route('factures.index')}}">Retour</a><br><br>  </td> <td></td>
  <td> <button  class="btn btn-success"> Modifier</button></td></tr>
    </table>
 </form>
 

</div>
<script>
  function f() {
    let xhr=new XMLHttpRequest();
    if(document.getElementsByName("BonCmd")[0].checked) {
    xhr.open("GET","/getB?fact=bonCmd");
    xhr.send();
      xhr.onreadystatechange=function(){
      if(xhr.status==200 && xhr.readyState==4){
      let demandeur=JSON.parse(xhr.responseText)  ;
      let s="<tr id='test'><td>Bon de commande</td><td><select name='numBcmd' >";
      for(let i=0;i<demandeur.length;i++){
        s+="<option value='"+demandeur[i].id+"' >"+demandeur[i].numBonCmd+"</option>";
      }
      s+="</select></td></tr>";
        document.getElementById("test").innerHTML= s;
      }
    }
    }
     if(document.getElementsByName("BonCmd")[1].checked) {
       xhr.open("GET","/getB?fact=marche");
    xhr.send();
    xhr.onreadystatechange=function(){
      if(xhr.status==200 && xhr.readyState==4){
        let demandeur=JSON.parse(xhr.responseText)  ;
      let s="<tr id='test'><td>le marché </td><td><select name='numMarche' >";
      for(let i=0;i<demandeur.length;i++){
        s+="<option value='"+demandeur[i].id+"' >"+demandeur[i].numMarche+"</option>";
      }
      s+="</select></td></tr>";
        document.getElementById("test").innerHTML= s;
      }
    }
    }
   
 }
</script>
@endsection
<style>
  select{
    width: 100%
  }
 td input{
    width: 100%
  }
</style>