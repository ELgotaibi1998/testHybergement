@extends("layouts.app")
@section("content")
<div><br>
 @if (Auth::user()!=null and Auth::user()->role=="admin")
 @if ( session("article"))
<div class="alert alert-success" role="alert">
 {{ session("article")}}
</div>
@endif
 <div style="display: flex;flex-wrap:wrap"  width="90%">
  <ul style="width: 40%">
    <li> <span>Categorie :</span>  <select name="categorie" id="categorie"  required>
    @foreach ($categories as $cat)
      <option value="{{$cat->id}}">{{$cat->categorie}}</option>
    @endforeach
    </select></li><br><li></li>
    <li><span>Emplacement : </span>  <select name="emplacement" id="emplacement" required>
      @foreach ($emplacements as $lieu)
        <option value="{{$lieu->id}}">{{$lieu->emplacement}}</option>
      @endforeach
    </select></li>
  </ul>
 <ul style="width: 40%">
  <li><span>Reference :</span>  <input type="text" name="reference" id="reference"></li>
  <li> <li><br></li>
    <span> Désignation :</span> <input type="text" name="designation" id="designation"></li>
 </ul>
    <button id='btn' onclick="f()" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg></button>
  </div><hr>
<u><h1>liste des Matériels</h1></u> <br>
    <div style="display:flex;flex-wrap:wrap" id="listArticle">
        @foreach ($articles as $art)
            <div class="card" style="width: 300px;margin-left:10px;margin-top:10px">
              <h5 class="card-title text-center">{{strtoupper($art->designation)}}</h5>
              <div class="card-body" style="text-align: center">
                @if (count($art->images)!=0)
                  <img src="{{'storage/'.$art->images[0]->image}}"  alt="..." height="150px" >
              @endif
                <p class="card-text">{{"Prix : ".$art->pu."DH"}}</p>
                <p class="card-text">{{"Quantité en stock : ".$art->qteStock}}  {{$art->unite()->withTrashed()->get()[0]->unite}}</p>
                <p class="card-text">{{"Demandes : ". count($art->demandes()->withTrashed()->get() )}}</p>
                <p class="card-text">
                  <?php  $c=0;?>
                  @foreach ($art->demandes()->withTrashed()->get() as $d)
                    @if ($d->affectations()->withTrashed()->get()!=null and count($d->affectations()->withTrashed()->get())!=0)
                    <?php  $c+=1?>
                    @endif
                  @endforeach
                   
                  {{"Affectations : ". $c}}</p>
                <a href="{{route("demandes.create",["article"=>$art->id])}}" class="btn btn-success">Demander l'article</a> | <a href="{{route('articles.edit',['article'=>$art->id])}}" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg></a> | <a href="{{route('articles.show',['article'=>$art->id])}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg></a>
              </div>
            </div>
          @endforeach
      </div>
    </div>
    <script>
      function f(params) {
        let categorie=document.getElementById("categorie").value;
        let emplacement=document.getElementById("emplacement").value;
        let reference=document.getElementById("reference").value;
        let designation=document.getElementById("designation").value;
        let xhr=new XMLHttpRequest();
        xhr.open("GET","/getArticles?categorie="+categorie+"&emplacement="+emplacement+"&reference="+reference+"&designation="+designation);
        xhr.send();
        xhr.onreadystatechange=function(){
          if(xhr.status==200 && xhr.readyState==4){
          let articles=xhr.responseText ;
            document.getElementById("listArticle").innerHTML= articles;
          }
        }
     }
     </script>
  @else
  <u><h1>liste des Matériels</h1></u> <br>
    <div style="display:flex;flex-wrap:wrap" id="listArticle">
        @foreach ($articles as $art)
        <div class="card" style="width: 25rem;margin-left:10px;margin-top:10px">
          <h5 class="card-title">{{strtoupper($art->designation)}}</h5>
          <div class="card-body" style="text-align: center">
            @if (count($art->images)!=0)
            
              <img src={{'/storage/'.$art->images[0]->image}} width="40%" alt="...">
          @endif <br>
          <a href="{{route("demandes.create",["article"=>$art->id])}}" class="btn btn-primary">Demander l'article</a>
        </div>
      </div>
    @endforeach
    </div>
</div>
 @endif
    <div>
      {{$articles->links()}}
    </div>
@endsection

<style>
 
  li{
list-style-type: none;

  }
  span{
    width:20%
  }
  input{
    width:60%
  }
  select{
    width:60%
  }
</style>