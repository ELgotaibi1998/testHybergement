<?php  use App\Models\user ;
use App\Models\Article ;
use App\Models\Salle ;
use App\Models\Personne ;
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Gestion de stock</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel = "icon" href ="/images/usmba.png" 
            type = "image/x-icon">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
      @media print{
       .btn{
          display:none;
       }   
      }
       
    .navbar ul li a{ 
        
        text-transform:uppercase;

    }
    #not{
      /* position: relative; */
      padding-left:-300px;
      margin-left:-300px; 
    }
     
   </style>
</head>
<body onresize="resiz()">
        <div class="">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm "  >
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/home') }}">
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
                                    <li><a class="dropdown-item" href="/facture ">Facture T</a></li>
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
                                    <li><a class="dropdown-item" href="{{route('fournisseurs.index')}}">Consulter les Fournisseur</a></li>
                                  </ul>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" style="display:flex " aria-current="page" href="{{route("mouvements.index")}}">  <p style="margin-left:10px ">Mouvements</p>   
                                    </a>
                              </li>
                               
                                <li class="nav-item">
                                  <a class="nav-link active" style="display:flex " aria-current="page" href="{{route("affectations.index")}}">  <p style="margin-left:10px ">Affectation</p>    
                                    </a>
                              </li>
                              <li class="nav-item ">
                                <a class="nav-link active" style="display:flex " aria-current="page" href="{{route("demandes.index")}}">  <p style="margin-left:10px ;color:white ">Demandes</p>   
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
                                <li class="nav-item dropdown" id="notf">
                                  
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
                                @if (Auth::user())
                                <li class="nav-item ">
                                  <a class="nav-link active" style="display:flex " aria-current="page" href="{{route("demandes.index")}}">  <p style="margin-left:10px ;color:white ">Demandes</p>   
                                    </a>
                              </li>
                                @endif
                              
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
          
              <main class="container"  >
                @yield('content')
              </main>
    </div>
</body>
</html>
<script>
 window.onload=resiz;
 function resiz() {
  if(window.innerWidth<700){  
  document.getElementById('notf').innerHTML=`<a class="nav-link active"   aria-current="page" href="{{route("notifications.index")}}">  <p style="margin-left:10px ;color:white ">Notifications</p>   
                                      </a>`;
 
     }
     else  
     document.getElementById('notf').innerHTML= `<a id="notf" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px ;color:white">
                                                
      @if (auth()->user())
                                               @if ( count(auth()->user()->unreadnotifications)!=0 )
                                                  <span style="border-radius:40%;padding-left:5px;padding-right:5px;font-size:13px;color:white;background-color:red;position:relative;left:32px;top:-12px">{{count(auth()->user()->unreadnotifications)}}</span>
                                                @endif
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                                </svg> 
                                  </a><ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="not">
                                  @foreach (auth()->user()->notifications as $n)
                                  @if ($n->read_at==null)
                                  @if (isset($n->data['article']) )
                                                  <li style="background-color: rgb(171, 171, 189)"><form action="{{route("notifications.update",['notification'=>$n->id])}}" method="post">@csrf @method("put")
                                                    <a class="dropdown-item" href="{{route('articles.show',['article'=>$n->data['article_id']])}}"> {{"L'article ".$n->data['article']." a une quantité de ".$n->data['qteStock']}} | <button>ok</button> </a></form></li>
                                                @else
                                                  <li style="background-color: rgb(171, 171, 189)"><form action="{{route("notifications.update",['notification'=>$n->id])}}" method="post">@csrf @method("put")
                                                    <a class="dropdown-item" href="{{route('demandes.show',['demande'=>$n->data['demande_id']])}}"> 
                                                    @if ( isset($n->data['demandeurS']) )
                                                    {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::withTrashed()->where("id",$n->data['articleD'])->get()[0]->designation." pour  la salle ".Salle::find($n->data['demandeurS'])->nom }} 
                                                    @else
                                                    {{  User::withTrashed()->where("id",$n->data['user'])->get()[0]->name."  a demander  L'article ".Article::withTrashed()->where("id",$n->data['articleD'])->get()[0]->designation." pour  le personnel ".Personne::find($n->data['demandeurP'])->nom }} 
                                                    @endif
                                                  | <button>ok</button></form> </a></li>
                                                @endif
                                  @else
                                                @if (isset($n->data['article']) )
                                                  <li > <a class="dropdown-item" href="{{route('articles.show',['article'=>$n->data['article_id']])}}"> {{"L'article ".$n->data['article']." a une quantité de ".$n->data['qteStock']}} </a></li>
                                                @else
                                                  <li >
                                                    <a class="dropdown-item" href="{{route('demandes.show',['demande'=>$n->data['demande_id']])}}"> 
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
                              @endif
                                  </ul>`}
    //  document.addEventListener("change",resiz() );
    
</script>

{{-- <main class="py-4">
    @yield('content')
</main> --}}