@extends("layouts.app")
@section("content")
<br>
 <h1>Ajouter un Matériels</h1>
       <hr >
       <form action="{{route("articles.store")}}" method="post" enctype="multipart/form-data">
        @csrf
          <table class="table "  >
            <tr><td>Catégorie</td> <td><select name="categorie"  required>
            @foreach ($categories as $cat)
              <option value="{{$cat->id}}" @if(old("categorie")==$cat->id)
                selected
              @endif>{{$cat->categorie}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Emplacement</td> <td><select name="emplacement"  required>
            @foreach ($emplacements as $lieu)
              <option value="{{$lieu->id}}" @if (old("emplacement")==$lieu->id)
                selected
              @endif>{{$lieu->emplacement}}</option>
            @endforeach
          </select></td> </tr>
          <tr><td>Reference</td> <td><input type="text" name="reference" value="{{old("reference")}}" required><p class="text-danger"> @error('reference')
            {{$message}} <br><a href="{{'/getRef?reference='.old('reference')}}">Voir l'article</a>

          @enderror</p></td> </tr>
          <tr><td>Designation</td> <td><input type="text" name="designation" value="{{old("designation")}}" required></td> </tr>
          <tr><td>Prix Unitaire</td> <td><input type="text" name="pu" value="{{old("pu")}}" required>  <p class="text-danger">@error("pu")
            {{$message}}
          @enderror</p> </td> </tr>
          <tr><td>Date d'ajout</td> <td><input type="datetime-local" name="dateAjout" required value="{{old('dateAjout')}}"></td> </tr>
          <tr><td>Stock minimal</td> <td><input type="text" name="stockMin" value="{{old("stockMin")}}" required/>   <p class="text-danger">@error("stockMin")
            {{$message}}
          @enderror</p> 
           </td> </tr>
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
          <tr><td>Quantité</td> <td><input type="text" name="qte" value="{{old("qte")}}" required>   <p class="text-danger">@error("qte")
            {{$message}}
          @enderror</p>  </td> </tr>
          <tr><td>Unité</td> <td><select name="unite" required >
            @foreach ($unites as $unite)
              <option value="{{$unite->id}}" @if(old("unite")==$unite->id)
                selected
              @endif>{{$unite->unite}}</option>
            @endforeach
          </select></td> </tr>
           <tr><td>Observations</td><td ><textarea name="observation"  rows="4">{{old("observation")}}</textarea></td></tr>
            <tr><td>Images </td><td><input type="file" name="images[]" multiple width="100%" /></td></tr>
            <tr ><td><a href="{{route('articles.index')}}" class="btn btn-secondary">Retour</a></td><td><input type="submit"  class="btn btn-success" value="Ajouter"></td> </tr>
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
  textarea{
    width: 100%;
  }
  
</style>