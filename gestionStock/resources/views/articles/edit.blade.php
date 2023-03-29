@extends("layouts.app")
@section("content")
<div class="container">
 <h1>Modifier un Matériels</h1>
       <hr >
       <form action="{{route('articles.update',['article'=>$article->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        
        <input type="hidden" name="id"  value="{{$article->id}}">
          <table class="table">
            <tr><td>Catégorie</td> <td><select name="categorie"  required>
            @foreach ($categories as $cat)
              <option value="{{$cat->id}}" @if ($cat->id==$article->categorie_id)
                {{"selected"}}
              @endif>{{$cat->categorie}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Emplacement</td> <td><select name="emplacement"  required>
            @foreach ($emplacements as $lieu)
              <option value="{{$lieu->id}}"  @if ($lieu->id==$article->emplacement_id)
                selected
              @endif>{{$lieu->emplacement}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Reference</td> <td><input type="text" name="reference" required value="{{$article->reference}}"><p class="text-danger"> @error('reference')
            {{$message}} <br> <a href="{{'/getRef?reference='.old('reference')}}">Voir l'article</a>

          @enderror</p></td> </tr>
          <tr><td>Designation</td> <td><input type="text" name="designation" required value="{{$article->designation}}"></td> </tr>
          <tr><td>Prix Unitaire</td> <td><input type="text" name="pu" required value="{{$article->pu}}"><p class="text-danger"> @error('pu')
            {{$message}} <br> <a href="{{'/getRef?reference='.old('reference')}}">Voir l'article</a>

          @enderror</p></td> </tr>
          <tr><td>Date d'ajout</td> <td><input type="datetime-local" name="dateAjout" required  value="{{$article->dateInscription}}"></td> </tr>
          <tr><td>Stock minimal</td> <td><input type="text" name="stockMin" required value="{{$article->Stockmin}}"><p class="text-danger"> @error('stockMin')
            {{$message}} <br> <a href="{{'/getRef?reference='.old('reference')}}">Voir l'article</a>
          @enderror</p></td >  </tr>
          <tr><td>Quantité</td> <td><input type="text" name="qte" required value="{{$article->qteStock}}"><p class="text-danger"> @error('qte')
            {{$message}} <br> <a href="{{'/getRef?reference='.old('reference')}}">Voir l'article</a>
          @enderror</p></td> </tr>
          <tr><td>Stock Max</td> <td><input type="text" name="stockMax" value="{{$article->stockMax}}" required/>   <p class="text-danger">@error("stockMax")
            {{$message}}
          @enderror</p> 
           </td> </tr>
           <tr><td>Stock d'alert</td> <td><input type="text" name="stockAlert" value="{{$article->alert}}" required/>   <p class="text-danger">@error("stockAlert")
            {{$message}}
          @enderror</p> 
           </td> </tr>
           <tr><td>Stock de sécurité</td> <td><input type="text" name="stockSecurite" value="{{$article->securite}}" required/>   <p class="text-danger">@error("stockSecurite")
            {{$message}}
          @enderror</p> 
           </td> </tr>
          <tr><td>Unité</td> <td><select name="unite" required >
            @foreach ($unites as $unite)
              <option value="{{$unite->id}}" @if ($unite->id==$article->unite_id)
                selected
              @endif>{{$unite->unite}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Observations</td><td textarea name="observation"  rows="4" >{{$article->observation}}</textarea></td></tr>
          <tr><td>Images : </td> <td><div style="display: flex">
               @foreach ($article->images as $img )
            <div><img src={{'/storage/'.$img->image}} alt="" width="20%"><br> <input type="button"  onclick="f({{$img->id}})" id="{{$img->id}}" value="supprimer " style="width:40%; font-size:10px;background-color:red;color:blanchedalmond;border:0ch;border-radius:5%"/> </div>
             
            @endforeach
            <input type="hidden"  name="imageSupprimer" id="suppImg">
            </div></td></tr>
            <tr><td >Ajouter d'autre images :</td>
            <td>
             <input type="file" name="images[]" id="" multiple>
           </td></tr>
          <tr ><td><a href="{{route('articles.index')}}" class="btn btn-secondary" >Retour</a></td><td><input type="submit"  class="btn btn-success" value="Modifier"></td> </tr>
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
<script>
  function f(id) {
  document.getElementById(id).value="L'image a été supprimer";
  document.getElementById(id).disabled=true;
  document.getElementById(id).style.backgroundColor="darkgrey";
  document.getElementById(id).style.width="60%";
    document.getElementById("suppImg").value=""+document.getElementById("suppImg").value+id+";";
  }
  
</script>