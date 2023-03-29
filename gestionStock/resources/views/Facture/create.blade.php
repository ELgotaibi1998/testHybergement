@extends("layouts.app")
@section("content")
 <u> <h1>Ajouter un Facture</h1></u><br>
  <label><h5>Bon Commande</h5> </label>
  <input type="radio" class="input_selected" name="BonCmd" checked id="hh" value="BonCmd" onchange="f()">
  <label><h5>Marche</h5> </label>
  <input type="radio"class="input_selected" name="BonCmd" id="hh07" value="marche" onchange="f()">
 
 <form action="{{route('factures.store')}}" method="post">
    @csrf
   <table class="table">
    <tr id="test"><td>Bon de commande</td><td><select name="numBcmd"  >
      @foreach ($bonCmd as $unite)
        <option value="{{$unite->id}}" @if(old("numBcmd")==$unite->id)
          selected
        @endif>{{$unite->numBonCmd}}</option>
      @endforeach
    </select></td> </tr>
    <tr><td>Article :</td> <td><select name="Article" required  id="article">
            @foreach ($articles as $article)
              <option value="{{$article->id}}" >{{$article->designation}}</option>
            @endforeach
          </select></td> </tr>
       <tr><td>qte : </td> <td><input type="text" name="qte" value="1" id="qte" required></td> </tr>
       <tr><td>prixT : </td> <td><input type="text" name="prixt" id="prixT" required></td> </tr>
       <tr><td>tva : </td> <td><input type="text" name="tva" id="tva" value="0" required></td> </tr>
       <tr><td>prixTTC: </td> <td><input type="text" name="prixTTC" id="prixTTC" required></td> </tr>
      <input type="hidden" value="{{json_encode($articles)}}" id="articles">
          
          <tr><td>signature : </td> <td><input type="text" name="signature" required></td> </tr>
  <tr> <td><a class="btn btn-secondary" href="{{route('factures.index')}}">Retour</a><br><br>  </td> <td></td>
  <td><a href="{{route('factures.store')}}"> <button  class="btn btn-success"> Enregister</button></a></td></tr>
    </table>
 </form>
 
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
  
  function calculePrixTTC() { 
     document.getElementById('prixTTC').value=(parseFloat(document.getElementById('prixT').value)+(parseFloat(document.getElementById('prixT').value)*parseFloat( document.getElementById('tva').value)/100)) ;
      
  }
    
  function calculePrixT() {  
    let pu=0;
     let articles=JSON.parse(document.getElementById("articles").value);
     articles.forEach(element => {
      
       if (element.id==document.getElementById('article').value ) {
         pu=element.pu;
       } 
     });
     document.getElementById('prixT').value=parseFloat(pu)*parseFloat( document.getElementById('qte').value) ;
     calculePrixTTC();
  }
  document.getElementById('article').addEventListener("change",calculePrixT);
  document.getElementById('qte').addEventListener("change",calculePrixT); 
  document.getElementById('tva').addEventListener("change",calculePrixTTC);
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