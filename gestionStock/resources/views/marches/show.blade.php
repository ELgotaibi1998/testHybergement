@extends("layouts.app")
@section("content")
<br>
<div style="display: flex;justify-content:space-around">
    <p><u> <h3  >Marché</h3></u></p>
 <a class="btn btn-info" href="" onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  </svg></a>
</div>
  
<hr>
    <div class="card"  style="padding-left: 2%;padding-right: 2%;margin-bottom: 10px;"> <br>
        <div class="card-header" style="display: flex;justify-content:space-between">
        <div>
            <h5 class="card-title">Numéro : {{$marche->numMarche}}</h5>
      <p>le {{$marche->dateCmd}}</p>
        </div>
      
      <div>
 <u><p>le  Fournisseur :</p></u>
      <p>Nom :  {{$marche->fournisseurs->nom}}</p>
      <p>Tel :  {{$marche->fournisseurs->tel}}</p>
      <p>Adresse :  {{$marche->fournisseurs->adresse}}</p>
      <p>E-mail :  {{$marche->fournisseurs->email}}</p> 
      </div></div>
     
                        <div class="card-body">
                                        <table class="table table-striped table-hover">
                                        <tr><th>Article</th><th>Qte</th><th>PrixT</th><th>TVA</th><th>PrixTTC</th></tr>
                                        @foreach ($marche->factures as $f )
                                            <tr><td>{{$f->articles->designation}}</td><td>{{$f->qte}}</td><td>{{$f->prixT}}</td><td>{{$f->tva}}</td><td class="prixTTC">{{$f->prixTTC}}</td></tr>
                                        @endforeach
                                      
                                        </table>
                        </div>
                        <br>
                        <div class="card-footer">
                            Total TTC : <b id="total">0 DH</b>
                        </div>
                        
    </div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        let s=0;
        document.querySelectorAll(".prixTTC").forEach(element => {
            s+=parseFloat(element.innerHTML) ;
        });
  document.getElementById("total").innerHTML=" "+s+" DH";
});
</script>
@endsection