@extends("layouts.app")
@section("content")
<br>
 <u><h1>Ajouter Catégorie</h1></u>

 <hr>
 <br>
          <div class="card" style="width: 18rem;">   <form action="{{route('categories.store')}}" method="post"> @csrf
        <div class="card-body">
       
          Catégorie : <input type="text" name="categorie">
          @error("categorie")
             <p class="text-danger">{{$message}}</p>
          @enderror
          <br>
        </div>
        <div class="card-footer" style="text-align: center">
        <input type="submit" value="Ajouter" class="btn btn-success">
        </div> </form>
      </div>
</div>
@endsection