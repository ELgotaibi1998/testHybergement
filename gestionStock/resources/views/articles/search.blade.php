@extends("layouts.app")
@section("content")
<div class="container">
      <div>
          Categorie : <select name="categorie" id="categorie"  required>
            @foreach ($categories as $cat)
              <option value="{{$cat->id}}">{{$cat->categorie}}</option>
            @endforeach
            </select>
            Emplacement : <select name="emplacement" id="emplacement" required>
              @foreach ($emplacements as $lieu)
                <option value="{{$lieu->id}}">{{$lieu->emplacement}}</option>
              @endforeach
            </select>
            Reference : <input type="text" name="reference" id="reference">
            Désignation : <input type="text" name="designation" id="designation">
            <button id='btn' onclick="f()" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg></button>
      </div><br><hr>
      <div id="listArticle"></div>
</div>
@endsection
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