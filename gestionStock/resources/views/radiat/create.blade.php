@extends("layouts.app")
@section("content")
<div class="container">
 <h1>Decision de Radiation</h1>
       <hr >
       <form action="{{route("radiats.store")}}" method="post" >
        @csrf
          <table class="table">
          <tr><td>l'article</td> <td><input type="text"  readonly value="{{$article->designation}}"><input type="hidden" name="article" readonly value="{{$article->id}}"></td> </tr>
          <tr><td>Date Radiat</td> <td><input type="datetime-local" name="dateRadiat" required></td> </tr>
         
          <tr><td>Motif</td> <td><input type="text" name="motif" required></td> </tr>
        
          <tr ><td></td><td><input type="submit"  class="btn btn-danger" value="Supprimer l'article"></td> </tr>
          </table>
        </form>
        <a href="{{route('articles.index')}}" class="btn btn-primary" >Retour</a>
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