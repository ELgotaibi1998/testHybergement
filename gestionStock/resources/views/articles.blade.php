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
    <tr id="test"><td><span class="td"> Bon de commande : </span>  </td><td> <table class="table"> <form action="{{route('bonCmds.store')}}" method="post"> @csrf
      <tr>
        <td> Fournisseur :</td><td><select name="fournisseur" id="fournisseur">
      @foreach ($fournisseurs as $f)
        <option value="{{$f->id}}">{{$f->nom}}</option>
      @endforeach
    </select><span class="text-danger" style="margin-left: 10px;font-size:25px"  >*</span> </td>
      </tr><tr>
                  <td  >Numéro de <span class="td"> bon de commande : </span> </td><td><input type="text"   required name="numBonCmd" id="numBonCmd"><span class="text-danger" style="margin-left: 10px;font-size:25px"  >*</span> </td>
                </tr>
                <tr>
                  <td>  Date de <span class="td"> bon de commande : </span> </td><td> <input type="datetime-local" required name="dateCmd" id="dateCmd" ><span class="text-danger" style="margin-left: 10px;font-size:25px"  >*</span>  </td>
                </tr>
    </table>    
    </td> </tr>
    <tr id="trSelectionnerArticle"><td>Article dejat exister  :</td> <td> <span id="articleChoisie"></span>
      <select name="Article" required  id="article">
            @foreach ($articles as $article)
              <option value="{{$article->id}}" >{{$article->designation}}</option>
            @endforeach
          </select> 
        <table class="table">
          <tr><td>qte : </td> <td><input type="text" name="qte" value="1" id="qteE"></td> </tr>
          <tr><td>Unité</td> <td><select name="unite"  id="uniteE" required >
               @foreach ($unites as $unite)
                 <option value="{{$unite->id}}" @if(old("unite")==$unite->id)
                   selected
                 @endif>{{$unite->unite}}</option>
               @endforeach
             </select></td> </tr>
          <tr><td>prixT : </td> <td><input type="text" name="prixt" id="prixTE"></td> </tr>
          <tr><td>tva : </td> <td><input type="text" name="tva" id="tvaE" value="0"></td> </tr>
          <tr><td>prixTTC: </td> <td><input type="text" name="prixTTC" id="prixTTCE"></td> </tr>
         <input type="hidden" value="{{json_encode($articles)}}" id="articles">
             <tr><td></td><td><button type="button" onclick="ajouterOldArticle()">valider l'article</button></td></tr>
        </table>
        </td> </tr>
          <tr id="trAjouterArticle"><td>Nouveau  Article  :</td> <td> <table class="table "  >
            <tr><td>Catégorie</td> <td><select name="categorie" id="categorie" required>
            @foreach ($categories as $cat)
              <option value="{{$cat->id}}" @if(old("categorie")==$cat->id)
                selected
              @endif>{{$cat->categorie}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Emplacement</td> <td><select name="emplacement" id="emplacement" required>
            @foreach ($emplacements as $lieu)
              <option value="{{$lieu->id}}" @if (old("emplacement")==$lieu->id)
                selected
              @endif>{{$lieu->emplacement}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Reference</td> <td><input type="text" id="reference" name="reference" value="{{old("reference")}}" required><p class="text-danger"> @error('reference')
            {{$message}} <br><a href="{{'/getRef?reference='.old('reference')}}">Voir l'article</a>

          @enderror</p></td> </tr>
          <tr><td>Designation</td> <td><input type="text" name="designation" id="designation" value="{{old("designation")}}" required></td> </tr>
          <tr><td>Prix Unitaire</td> <td><input type="text" name="pu" id="pu" value="{{old("pu")}}" required>  <p class="text-danger">@error("pu")
            {{$message}}
          @enderror</p> </td> </tr>
          <tr><td>Stock minimal</td> <td><input type="text" name="stockMin" id="stockMin" value="{{old("stockMin")}}" required/>   <p class="text-danger">@error("stockMin")
            {{$message}}
          @enderror</p> 
           </td> </tr>
         
           <tr><td>Observations</td><td ><textarea name="observation" id="observation"  rows="4">{{old("observation")}}</textarea></td></tr>
           <tr><td>qte : </td> <td><input type="text" name="qte" value="1" id="qte"></td> </tr>
           <tr><td>Stock Max</td> <td><input type="text" name="stockMax" value="{{old("stockMax")}}" required/>   <p class="text-danger">@error("stockMax")
            {{$message}}
          @enderror</p> 
           </td> </tr>
           <tr><td>Stock d'alert</td> <td><input type="text" name="stockAlert" value="{{old("stockAlert")}}" required/>   <p class="text-danger">@error("stockAlert")
            {{$message}}
          @enderror</p> 
           </td> </tr>
           <tr><td>Stock de sécurité</td> <td><input type="text" name="stockSecurite" value="{{old("stockSecurite")}}" required/>   <p class="text-danger">@error("stockSecurite")
            {{$message}}
          @enderror</p> 
           </td> </tr>
       <tr><td>Unité</td> <td><select name="unite"  id="unite" required >
            @foreach ($unites as $unite)
              <option value="{{$unite->id}}" @if(old("unite")==$unite->id)
                selected
              @endif>{{$unite->unite}}</option>
            @endforeach
          </select></td> </tr>
       <tr><td>prixT : </td> <td><input type="text" name="prixt" id="prixT"></td> </tr>
       <tr><td>tva : </td> <td><input type="text" name="tva" id="tva" value="0"></td> </tr>
       <tr><td>prixTTC: </td> <td><input type="text" name="prixTTC" id="prixTTC"></td> </tr>
      <input type="hidden" value="{{json_encode($articles)}}" id="articles">
          
          <td><u id="artV"></u></td> <td><button type="button" onclick="ajouterNouveauArticle()">Valider l'article</button>  </td> </tr>
            {{-- <tr><td>Images </td><td><input type="file" name="images[]" multiple width="100%" /></td></tr>  --}}
          </table>    
       <tr><td>signature : </td> <td><input type="text" id="signature" name="signature"><span class="text-danger" style="margin-left: 10px;font-size:25px"  >*</span> </td> </tr>
  <tr> <td><a class="btn btn-secondary" href="{{route('factures.index')}}">Retour</a><br><br>  </td>  
  <td><a href="{{route('factures.store')}}"> <button  class="btn btn-success" style="width: 100%" onclick="event.preventDefault();AjouterFacture()"> Enregister</button></a></td></tr>
    </table>
 </form>
 
 <script>
 function f() { 
    if(document.getElementsByName("BonCmd")[0].checked) {
    
        document.querySelectorAll(".td")[0].innerHTML= "Bon de commande";
        document.querySelectorAll(".td")[1].innerHTML= "Bon de commande";
        document.querySelectorAll(".td")[2].innerHTML= "Bon de commande";
      }  
     if(document.getElementsByName("BonCmd")[1].checked) {
        document.querySelectorAll(".td")[1].innerHTML= "Marché ";
        document.querySelectorAll(".td")[0].innerHTML= "Marché ";
        document.querySelectorAll(".td")[2].innerHTML= "Marché ";
      }
     
   
 }
  
  function calculePrixTTC() { 
     document.getElementById('prixTTCE').value=(parseFloat(document.getElementById('prixTE').value)+(parseFloat(document.getElementById('prixTE').value)*parseFloat( document.getElementById('tvaE').value)/100)) ; 
      
  }
    
  function calculePrixT() {  
    let pu=0;
     let articles=JSON.parse(document.getElementById("articles").value);
     articles.forEach(element => {
      
       if (element.id==document.getElementById('article').value ) {
         pu=element.pu;
       } 
     });
     document.getElementById('prixTE').value=parseFloat(pu)*parseFloat( document.getElementById('qteE').value) ;
     calculePrixTTC();
  }
  function calculePrixTTCN() {  
     document.getElementById('prixTTC').value=(parseFloat(document.getElementById('prixT').value)+(parseFloat(document.getElementById('prixT').value)*parseFloat( document.getElementById('tva').value)/100)) ;
      
  }
  function calculePrixTN() {  
     document.getElementById('prixT').value=parseFloat(document.getElementById('pu').value)*parseFloat( document.getElementById('qte').value) ;
     calculePrixTTCN();
  }
  document.getElementById('article').addEventListener("change",calculePrixT);
  document.getElementById('qteE').addEventListener("change",calculePrixT); 
  document.getElementById('tvaE').addEventListener("change",calculePrixTTC);  
  document.getElementById('pu').addEventListener("change",calculePrixTN);
  document.getElementById('qte').addEventListener("change",calculePrixTN); 
  document.getElementById('tva').addEventListener("change",calculePrixTTCN);  
  let t=[];
  function ajouterNouveauArticle( ) { 
  let obj={"categorie": document.getElementById('categorie').value,
    "emplacement": document.getElementById('emplacement').value,
    "reference": document.getElementById('reference').value,
    "designation": document.getElementById('designation').value,
    "pu": document.getElementById('pu').value, 
    "stockMin": document.getElementById('stockMin').value,
    "observation": document.getElementById('observation').value,
    "qte":document.getElementById('qte').value,
    "unite":document.getElementById('unite').value,
    "prixT": document.getElementById('prixT').value, 
    "tva": document.getElementById('tva').value,
    "prixTTC":document.getElementById('prixTTC').value
  };
  t.push(obj); 
  document.getElementById('artV').innerHTML=document.getElementById('artV').innerHTML+""+ document.getElementById('designation').value +";";
console.log(t);
  document.getElementById('categorie').value="";
    document.getElementById('emplacement').value="";
  document.getElementById('reference').value="";
 document.getElementById('designation').value="";
 document.getElementById('pu').value=""; 
 document.getElementById('stockMin').value="";
  document.getElementById('observation').value="";
  document.getElementById('qte').value=""
  document.getElementById('unite').value=""
   document.getElementById('prixT').value=""  
     document.getElementById('tva').value=""
     document.getElementById('prixTTC').value=""
 
  }
  let tE=[];
  function ajouterOldArticle( ) {
    document.getElementById('articleChoisie').innerHTML=  document.getElementById('articleChoisie').innerHTML +  document.getElementById('article').value+";";
    let obj={
      "idArticle":document.getElementById('article').value,
      "qte":document.getElementById('qteE').value,
    "unite":document.getElementById('uniteE').value,
    "prixT": document.getElementById('prixTE').value, 
    "tva": document.getElementById('tvaE').value,
    "prixTTC":document.getElementById('prixTTCE').value
  };
  tE.push(obj);
   document.getElementById('qteE').value="";
  document.getElementById('uniteE').value="";
   document.getElementById('prixTE').value="" ; 
     document.getElementById('tvaE').value="";
     document.getElementById('prixTTCE').value=""; 
    document.getElementById('article').value="";
  }
  function AjouterFacture() {
    if(document.getElementById('numBonCmd').value!="" && document.getElementById('dateCmd').value!="" && document.getElementById('signature').value!="" ){
      if (t.length!=0 || tE.length!=0) {
        let obj={"fournisseur":document.getElementById('fournisseur').value,"numFact":document.getElementById('numBonCmd').value,"bonCmd":document.getElementById('hh').checked,"marche":document.getElementById('hh07').checked,"dateCmd":document.getElementById('dateCmd').value, "articlesExester":tE,"articles":t,"signature":document.getElementById('signature').value}
    console.log(JSON.stringify(obj));
    let xhr=new XMLHttpRequest();
        xhr.open("GET","/AjouterFacture?obj="+JSON.stringify(obj)   );
        xhr.send();
        xhr.onreadystatechange=function(){
          if(xhr.status==200 && xhr.readyState==4){
            alert("La facture a été ajouter avec succés.");
         
          }
        }
      }
      else alert("Il faut au moin précisé un article!!!!");
        
    }
    else alert("Remplaire les champs obligatoire");
  
  }
</script>
@endsection
<style>
  select{
    width: 90%
  }
 td input{
    width: 90%
  }
</style>