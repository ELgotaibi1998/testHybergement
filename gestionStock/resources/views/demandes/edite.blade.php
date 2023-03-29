@extends("layouts.app")
@section("content")
<div class="container">
  <u>
 <h1>Modifier une demande</h1>
  </u>
      <form action="{{route('demandes.update',['demande'=>$demande->id])}}" method="post">@csrf
        @method("put")
     <h5> Pour une   <input type="radio" name="demandeur" value="personne" onchange="f()">Personne | <input id="p" type="radio" checked name="demandeur" onchange="f()" value="salle">Salle <br> <br>
      </h5>
      
         <table class="table">
          <tr> <td>Nom</td><td><div id="test">
        <select name="salle"  >
        @foreach ($salles as $unite)
          <option value="{{$unite->id}}" @if(old("salle")==$unite->id)
            selected
          @endif>{{$unite->nom}}</option>
        @endforeach
      </select>
      </div></td></tr>
        <tr><td>Designation</td> <td><input type="text" readonly value="{{$demande->articles()->withTrashed()->get()[0]->designation}}" ><input type="hidden" name="article"  value="{{$demande->articles()->withTrashed()->get()[0]->id}}" ></td> </tr>
         <tr><td>date de demande</td> <td><input type="datetime-local" name="dateD"  value="{{$demande->dateDemande}}" ></td> </tr>
        <tr><td>Quantité</td> <td><input type="text" name="qte" value="{{$demande->qteArticle}}" ><span class="text-danger"> @error('qte')
          {{$message}} 
        @enderror</span> </td>
          </td> </tr><tr><td>Unité</td><td><input type="hidden" name="unite"  id="" value="{{$demande->unite_id}}" >
          @foreach ($unites as $unite )
           @if($demande->unite_id==$unite->id)
           <input type="text" value="{{$unite->unite}}" readonly>
          @endif
          @endforeach
          </select> </tr>
        <tr><td></td><td><input type="submit" value="Modifier" class="btn btn-success"></td></tr>
       </table>
      </form>
</div>
   
    <script>
      //document.getElementsByName("demandeur")[0].addEventListener("change",f);
  function f() {
    let xhr=new XMLHttpRequest();
    if(document.getElementsByName("demandeur")[0].checked) {
    xhr.open("GET","/getD?demandeur=personne");
    xhr.send();
      xhr.onreadystatechange=function(){
      if(xhr.status==200 && xhr.readyState==4){
      let demandeur=JSON.parse(xhr.responseText)  ;
      let s="<select name='personne' >";
      for(let i=0;i<demandeur.length;i++){
        s+="<option value='"+demandeur[i].id+"' >"+demandeur[i].nom+"</option>";
      }
      s+="</select>";
        document.getElementById("test").innerHTML= s;
      }
    }
    }
     if(document.getElementsByName("demandeur")[1].checked) {
       xhr.open("GET","/getD?demandeur=salle");
    xhr.send();
    xhr.onreadystatechange=function(){
      if(xhr.status==200 && xhr.readyState==4){
        let demandeur=JSON.parse(xhr.responseText)  ;
      let s="<select name='salle' >";
      for(let i=0;i<demandeur.length;i++){
        s+="<option value='"+demandeur[i].id+"' >"+demandeur[i].nom+"</option>";
      }
      s+="</select>";
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
