@extends('layouts.app')

@section('content')  
@if (Auth::user() and Auth::user()->role=="admin")
    


<div  style="display: flex;flex-wrap:wrap; padding-top:10px;  width:100%;
background-size:cover;
background-position:center;" class="justify-content-center" >
        <div class="col-md-2" style="margin: 4px;width:200px">
          <a href="{{route('categories.index')}}">  <div class="card">
                <div class="card-header"> CATEGORIES </div>

                <div class="card-body">
                    {{ $categories  }}
                </div>
            </div></a>
        </div>  
        <div class="col-md-2" style="margin: 4px;width:200px">
            <a href="{{route('articles.index')}}">
            <div class="card">
                <div class="card-header"> ARTICLES </div>

                <div class="card-body">
                    {{count($bords)}}
                </div>
            </div></a>
        </div>  
        <div class="col-md-2" style="margin :  4px;width:200px ">
            <a href="{{route('demandes.index')}}">
            <div class="card">
                <div class="card-header"> DEMANDES </div>

                <div class="card-body">
                    {{count($demandes)}}
                </div>
            </div></a>
        </div>
        <div class="col-md-2" style="margin: 4px;width:200px"> <a href="{{route('affectations.index')}}">
            <div class="card">
                <div class="card-header"> AFFECTATIONS </div>

                <div class="card-body">
                    {{$affectations}}
                </div>
            </div></a>
        </div>
       
</div>
<input type="hidden" id="info" value="{{json_encode($mouvements)}}">
<div><br><br>
    <div style="width: 50%;margin-left:20% " >

        <h5>les mouvements par  mois  </h5>
        Tapez l'année : <input type="text" placeholder="année" id="annee"> <br>
        Tapez le mois : <input type="text" placeholder="mois" id="mois"> 
        <button onclick="f(document.getElementById('annee').value,document.getElementById('mois').value)">Consulter</button>
        <canvas id="myChart"    ></canvas>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <script>
        // document.onload=f();
        function f(anne=2023,mois=3){
        const ctx = document.getElementById('myChart');
      let info=JSON.parse(document.getElementById("info").value) ;
    //  let t=info.map((obj)=>[obj.dateEntrer,obj.dateSortie] )
    // let date= Array.from(new Set(t.flat()))  ; 
    //   date=date.map((e)=> {let v=new Date(e);if(v.getFullYear()=="2023") return v ;}).sort();
     
    //  console.log(date);
    //  let months=date.map((e)=> { if(e!=undefined) return e.getMonth() ;});
     
     let xE=[];
     let xS=[];
     info.forEach(obj => {
        if(obj.dateEntrer!=null ) {
        const element =new Date(obj.dateEntrer ); 
            if(element.getFullYear()==anne && element.getMonth()+1==mois){
                xE.push({id:obj.QEntrer,dateE:element.getDate() }) ;
            }
        }
         if(obj.dateSortie!=null )  { 
            const e=new Date(obj.dateSortie );
            if(e.getFullYear()==anne && e.getMonth()+1==mois){
                xS.push({id:obj.qteSortie,dateS:e.getDate() }) ;
            } }
     });
     let e=Array.from(new Set(xE.map((obj)=>obj.dateE)));
  let n=Array.from(new Set(xS.map((obj)=>obj.dateS)));
  let tE=[];
  let tS=[];
  for(let i=0;i<e.length;i++){ 
    let s=0;
        for (let index = 0; index < xE.length; index++) {
            if(xE[index].dateE==e[i]){
             s+=xE[index].id;
            } 
        } 
        tE.push({qE:s,dateE:e[i]})
    }
    for(let i=0;i<n.length;i++){ 
    let s=0;
        for (let index = 0; index < xS.length; index++) {
            if(xS[index].dateS==n[i]){
             s+=xS[index].id;
            } 
        } 
        tS.push({qS:s,dateS:n[i]})
    }
     console.log(tE);
     console.log(info);
     let dataE=[];
     let dataS=[];
     for(let i=0;i<32;i++){ 
        let s=0;
        for (let index = 0; index < tE.length; index++) {
            if(tE[index].dateE==i){
             s=tE[index].qE;
            }
           
        } 
        dataE.push(s);
        s=0;
        for (let index = 0; index < tS.length; index++) {
            if(tS[index].dateS==i){
             s=tS[index].qS;
            } 
        } dataS.push(s);
     }
     console.log(dataE);
     console.log(dataS);
        new Chart(ctx, {
          type: 'line',
          data: {
            labels:Array.from(Array(31).keys()) ,
            datasets: [{
              label: '# Entrer',
              data: dataE,
              borderWidth: 1
            },{
              label: '# Sortie',
              data: dataS,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    }

        
      </script>
</div>
@elseif(Auth::user() and Auth::user()->role=="user" )
    <?php   echo redirect()->route("articles.index") ; ?>
@endif

<style>
    a{
        text-decoration: none;
    }
    .col-md-2:hover{ 
        width: 300px;  
    }
    .card:hover{ 
        background-color: rgb(171, 205, 209);
        color:white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 20px;
    }
</style>
@endsection
{{-- <div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"> </div>

            <div class="card-body">
                
            </div>
        </div>
    </div>
</div> --}}
