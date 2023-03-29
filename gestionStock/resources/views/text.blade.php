<?php  use App\Models\user ;
use App\Models\Article ;
use App\Models\Salle ;
use App\Models\Personne ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    .navbar{
        width:85%;  
        display:flex;
        align-items:center;
        align-content:space-between;
    }
    
    .navbar ul li a{ 
        
        text-transform:uppercase;

    }
    *{
        margin:0;
        padding:0;
        font-family:sans-serif;
    }
    .test{
        width:100%;
        height:100vh;
        background-image:linear-gradient(rgb(0,0,0,0.75),rgb(0,0,0,0.75)),url(images/img.jpg);
        background-size:cover;
        background-position:center;
    } 
    .logo{
        width: 70px;
        cursor: pointer;
        position: relative;
        top:90px;
        margin:0 45%;
        
    } 
    .content{
        width:100%;
        position: absolute;
        top:50%;
        transform:translateY(-50%);
        text-align:center;
        color:#fff;
    }
    .content h1{
        font-size:9000px;
        margin-top:80px;
    }
    .content p{
        margin:20px auto;
        font-weight:1000;
        line-height:25px;
    }
   .button{
        width:200px;
        padding:15px 0;
        text-align:center;
        top:50px;
        margin:200 px 10px;
        border-radius:25px;
        font-weight:bold;
        border:2px solid #009688;
        background:transparent;
        color:#fff;
        cursor: pointer;
        position:relative;
        overflow:hidden;
    }
    .span{
        background:#009688;
        height:100%;
        width:0;
        border-radius:25px;
        position:absolute;
        left:20px;
        bottom:0;
        z-index:-1;
        transition:0.5s;
    }
    .button:hover span{
        width:100%;
    }
    .button:hover{
        border:none;

    }
    .box{
       
        font-size:40px;
        font-weight:bold;
        opacity:0;
        margin-top:-10px;
        position:absolute;
        width:100%;
        text-align:centre;
        font-family:century gothic;
    }
  .b1   {
    animation:ani1 3.5s infinite;
  }
  .b2 {
    animation:ani2 3.5s  infinite;
  }
  @keyframes ani1 {
    10%{
        opacity:1;
    }
    20%{
        opacity:1;
    }
    30%{
        opacity:0;
    }
    
  }
  @keyframes ani2{
    70%{
        opacity:0;
    }
    80%{
        opacity:1;
    }
    90%{
        opacity:0;
    }
    
  }




     

        
    
</style>
<body>
    <div class='test'>
        <div class='navbar'>
            
            <nav class="navbar navbar-expand-md shadow-sm "  >
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/usmba.png" alt="Accueil" width="40px">
                    </a>
                       
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <div class="position-sticky pt-3">
                           
                          </div>
                        <ul class="navbar-nav me-auto">
                                @if (Auth::user() and Auth::user()->role=="admin")
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px;color:white ">   Ajouter  
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('categories.create')}}">Catégorie</a></li>
                                    <li><a class="dropdown-item" href="{{route('articles.create')}}">Matériel</a></li>
                                    <li><a class="dropdown-item" href="{{route('fournisseurs.create')}}">Fournisseur</a></li>
                                    <li><a class="dropdown-item" href="{{route('affectations.create')}}">Affectation</a></li>
                                    <li><a class="dropdown-item" href="{{route('factures.create')}}">Facture</a></li>
                                  </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px;color:white ">   Catégories  
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      @foreach (App\Models\Categorie::all() as $cat )
                                         <li><a class="dropdown-item" href="{{route('articles.index',['id'=>$cat->id])}}">{{$cat->categorie}}</a></li>
                                      @endforeach
                                     
                                    </ul>
                                  </li>
                                
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px;color:white ">   Matériel 
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('articles.index')}}"> Matériel</a></li>
                                    <li><a class="dropdown-item" href="{{route('radiats.index')}}">Radiats</a></li>
                                    
                                  </ul>
                                </li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px;color:white "> Factures
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                    <li><a class="dropdown-item" href="{{route('bonCmds.index')}}">Consulter les Bon de commandes</a></li>
                                    <li><a class="dropdown-item" href="{{route('marches.index')}}">Consulter les Marchés</a></li>
                                  </ul>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" style="color:#fff"  aria-current="page" href="{{route("fournisseurs.index")}}">   Fournisseurs  
                                    </a>
                              </li>
                                <li class="nav-item">
                                  <a class="nav-link active"  style="color:#fff" aria-current="page" href="{{route("affectations.index")}}">  Affectation    
                                    </a>
                              </li>
                              <li class="nav-item ">
                                <a class="nav-link active" style="color:#fff" aria-current="page" href="{{route("demandes.index")}}">   Demandes   
                                  </a>
                            </li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px;color:white "> Autre
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('utilisateurs.index')}}">Utilisateurs</a></li>
                                    <li><a class="dropdown-item" href="{{route("emplacements.index")}}">Emplacements</a></li>
                                        <li><a class="dropdown-item" href="{{route("personnes.index")}}"> Personnels</a></li>
                                        <li><a class="dropdown-item" href="{{route('salles.index')}}">Salles</a></li>
                                    <li><a class="dropdown-item" href="{{route('unites.index')}}">Unités</a></li>
                                  </ul>
                                </li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px ;color:white">
                                                @if (count(auth()->user()->unreadnotifications)!=0 )
                                                  <span style="border-radius:40%;padding-left:5px;padding-right:5px;font-size:13px;color:white;background-color:red;position:relative;left:32px;top:-12px">{{count(auth()->user()->unreadnotifications)}}</span>
                                                @endif
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                                </svg> 
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  @foreach (auth()->user()->notifications as $n)
                                  @if ($n->read_at==null)
                                                @if (isset($n->data['article']) )
                                                  <li style="background-color: rgb(171, 171, 189)"><form action="{{route("notifications.update",['notification'=>$n->id])}}" method="post">@csrf @method("put")
                                                    <a class="dropdown-item" href=""> {{"L'article ".$n->data['article']." a une quantité de ".$n->data['qteStock']}} | <button>ok</button> </a></form></li>
                                                @else
                                                  <li style="background-color: rgb(171, 171, 189)"><form action="{{route("notifications.update",['notification'=>$n->id])}}" method="post">@csrf @method("put")
                                                    <a class="dropdown-item" href=""> 
                                                    @if ( isset($n->data['demandeurS']) )
                                                    {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  la salle ".Salle::find($n->data['demandeurS'])->nom }} 
                                                    @else
                                                    {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  le personnel ".Personne::find($n->data['demandeurP'])->nom }} 
                                                    @endif
                                                  | <button>ok</button></form> </a></li>
                                                @endif
                                  @else
                                                @if (isset($n->data['article']) )
                                                  <li > <a class="dropdown-item" href=""> {{"L'article ".$n->data['article']." a une quantité de ".$n->data['qteStock']}} </a></li>
                                                @else
                                                  <li >
                                                    <a class="dropdown-item" href=""> 
                                                      @if ( isset($n->data['demandeurS']) )
                                                      {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  la salle ".Salle::find($n->data['demandeurS'])->nom}} 
                                                      @else
                                                      {{   User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::find($n->data['articleD'])->designation." pour  le personnel ".Personne::find($n->data['demandeurP'])->nom}} 
                                                      @endif 
                                                    </a>
                                                  </li>
                                              @endif
                                  @endif
                              @endforeach
                                  </ul>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px;color:white ">   Catégories 
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach (App\Models\Categorie::all() as $cat )
                                       <li><a class="dropdown-item" href="{{route('articles.index',['id'=>$cat->id])}}">{{$cat->categorie}}</a></li>
                                    @endforeach
                                   
                                  </ul>
                                </li> 
                                <li class="nav-item ">
                                    <a class="nav-link active" style="display:flex " aria-current="page" href="{{route("articles.index")}}">  <p style="margin-left:10px ;color:white ">Matériels</p>   
                                      </a>
                                </li>
                              
                             @endif
                             
                          
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}" style="margin-left:10px ">{{ __('Login') }}</a>
                                    </li>
                                @endif
            
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}" style="margin-left:10px ">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
            
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
</div>
<img src="images/usmba.png"  class="logo">

        <div class="content">
        <!-- <h1>GESTION STOCK</h1> -->
       <div class=" box b1"><h6><p id='hh'>Ecole Nationale des Sciences Appliquées</p></h6> </div>
       <div class=" box b2"><h6><p >L’université Sidi Mohamed Ben Abdellah</p></h6></div> 
        <div>
    <a href="{{route('login')}}"><button type="button" class="button"><span class="span"></span>Connecter</button></a>
   <a href="{{route('register')}}"> <button type="button" class="button"><span class="span"></span> S'inscrire</button></a>
</div>
    </div>
 

 
    
</body>

    


    
</html>