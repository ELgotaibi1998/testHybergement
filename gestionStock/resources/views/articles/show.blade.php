@extends("layouts.app")
@section("content")
<div class="container"><br>
 <h1>Détail  Matériel</h1>
       <hr >
          <table class="table">
            <tr><td>Catégorie</td> <td>
              {{$article->categorie->categorie}}</td> </tr>
          <tr><td>Emplacement</td> <td>{{$article->emplacement()->withTrashed()->get()[0]->emplacement}}</td> </tr>
          <tr><td>Reference</td> <td>{{$article->reference}}</td> </tr>
          <tr><td>Designation</td> <td>{{$article->designation}}</td> </tr>
          <tr><td>Prix Unitaire</td> <td>{{$article->pu." DH"}}</td> </tr>
          <tr><td>Date d'ajout</td> <td>{{$article->dateInscription}}</td></tr>
         
          <tr><td>Quantité</td> <td>{{$article->qteStock." ".$article->unite()->withTrashed()->get()[0]->unite}}</td> </tr>
          <tr><td>Observations</td><td ><p >{{$article->observation}}</p></td></tr>
           <tr><td>Stock minimal</td> <td>{{$article->Stockmin." ".$article->unite()->withTrashed()->get()[0]->unite}}</td >  <tr >
            <tr><td>Stock maximal</td> <td>{{$article->stockMax." ".$article->unite()->withTrashed()->get()[0]->unite}}</td >  <tr >
              <tr><td>Stock d'alert</td> <td>{{$article->alert." ".$article->unite()->withTrashed()->get()[0]->unite}}</td >  <tr >
                <tr><td>Stock minimal</td> <td>{{$article->securite." ".$article->unite()->withTrashed()->get()[0]->unite}}</td >  <tr >
          <tr><td>Images : </td> <td >
            <div style="display: flex;flex-wrap:wrap">
               @foreach ($article->images as $img )
            <div><img src={{'/storage/'.$img->image}} alt="" width="20%">
            @endforeach
            </div>
           </td> </tr>
           <tr><td><a href="{{'https://www.bing.com/images/search?q=image+'.$article->designation.'&form=HDRSC4&first=1'}}">consulté</a></td></tr>
          <td><a href="{{route('articles.index')}}" class="btn btn-secondary" >Retour</a></td> <td></td><td style="margin-right:50%">
              <a class="btn btn-danger" href="{{route('radiats.create',['id'=>$article->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg></a>
            </td> </tr>
          </table>
</div>
@endsection
