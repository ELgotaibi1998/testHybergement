@extends("layouts.app")
@section("content")
<br>
<p style="text-align: right" > Fès le, {{ date("Y/m/d")}}</p> <br>
<div style="display: flex;justify-content:space-around">
    <p><u> <h3 style="text-align: center" >DECHARGE</h3></u></p>
 <a class="btn btn-info" href="" onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  </svg></a>
</div>
  
<hr>
    <div class="card"  style="padding-left: 2%;padding-right: 2%;margin-bottom: 10px;"> <br>
        <div class="card-header" style="display: flex;justify-content:space-between">
        <div>
            <h6 class="card-title"> Nom du Demandeur : {{ strtoupper( $aff->demandes()->withTrashed()->get()[0]->users()->withTrashed()->get()[0]->name)}}</h6>
            @if ($aff->demandes()->withTrashed()->get()[0]->salle_id!=null)
                 <h6 class="card-title"> Pour la salle : {{ strtoupper( $aff->demandes()->withTrashed()->get()[0]->salles()->withTrashed()->get()[0]->nom)}}</h6>
            @else
            <h6 class="card-title"> Pour le personnel : {{ strtoupper( $aff->demandes()->withTrashed()->get()[0]->personnes()->withTrashed()->get()[0]->nom)}}</h6>
            @endif
           
        </div>
      
      <div>
  
      </div></div>
     
                        <div class="card-body">
                                        <table class="table table-striped table-hover">
                                        <tr><th>Désignation</th><th>Quantité</th><th>Affectation</th><th>Date</th><th>Signature</th></tr>
                                        
                                            <tr><td>{{$aff->demandes()->withTrashed()->get()[0]->articles()->withTrashed()->get()[0]->designation}}</td><td>{{$aff->demandes()->withTrashed()->get()[0]->qteArticle}}</td><td>{{$aff->id}}</td><td>{{$aff->dateReception}}</td><td  > </td></tr>
                                       
                                      
                                        </table>
                        </div>
                        <br>
                        <div class="card-footer">
                             Route d'Imouzzer,Fès,BP 72 Tél:0535600403  ; <a href="https://www.ensaf.ac.ma">www.ensaf.ac.ma</a> 
                        </div>
                        
    </div>
 
@endsection