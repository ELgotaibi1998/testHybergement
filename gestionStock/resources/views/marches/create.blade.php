@extends("layouts.app")
@section("content")
<br>
 <u><h1>Ajouter un Bon de commande</h1></u>

 <hr>
 <br>
          <div class="card"  >   <form action="{{route('marches.store')}}" method="post"> @csrf
        <div class="card-body">
          <table>
            <tr>
              <td> Fournisseur :</td><td><select name="fournisseur" id="">
            @foreach ($fournisseurs as $f)
              <option value="{{$f->id}}">{{$f->nom}}</option>
            @endforeach
          </select> </td>
            </tr>
            <tr>
              <td> Numéro du marché :  </td><td><input type="text" name="numMarche"></td>
            </tr>
            <tr>
              <td>  Date marché : </td><td> <input type="datetime-local" name="dateCmd">  </td>
            </tr>
          </table>
        </div>
        <div class="card-footer" style="text-align: center">
        <input type="submit" value="Ajouter" class="btn btn-success">
        </div> </form>
      </div>
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