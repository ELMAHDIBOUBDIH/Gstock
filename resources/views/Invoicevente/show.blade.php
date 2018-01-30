@extends('layouts.admin')
@section('content')


<div class="page-title">  
    <h3>{{ trans('text.info-article')}} : </h3> 
  
</div>
<div class="row" >
  <div class="col-md-12">
   <div class="grid simple ">
            <div class="grid-title no-border" >
                
                <div class="tools"> <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="" class="remove"></a>
                </div>
       
<table  style="margin-top: 6%;width:100%;" border="1px">
  <tbody>
    <tr>
      <td colspan="4" style="width: 55%;padding: 3%;">
        <img src="/Nprojet/public/img/logo.png" height="100" width="160"><br>
        <h4 style="color: black;font-weight: 700;"> <br>DrStock<br>
        hay afrag rue 30<br>
        Tiznit<br>
        0661554997</h4>
      </td>
      
    </tr>
    <tr>
     
      <td style="border-width:5px;
        border-bottom-style:outset;">
        <center> <font size="5">date de commande : {{$Invoicevente->date}}<br><b>Facture {{$Invoicevente->Invoicevente_type}} N°:
        {{$Invoicevente->reference_cmd}}/{{$date->year}}  </b> </font><br>
        </center>
      </td>
    </tr>
  </tbody>
</table>
 <table class="table" style="width: 51%;margin-left: 65%;margin-top: -319px;">
  
    <tbody>
    <tr><td><h4 style="color: black;font-weight: 700; ">date facturation le : {{$Invoicevente->date}}</h4>  </td></tr>
       
      <tr>
       
       <td rowspan="2" id="infoclient" style="padding-left: 4%;">
        <b>  <h4 style="color: black;font-weight: 700; ">
        Clinet n° :{{$client->name}}<br>
        raison Social :{{$client->name_society}}<br>
        nom :{{$client->name}}<br>
        adresse :{{$client->adresse}}<br>
        tel :{{$client->tel}}<br>
        fax :{{$client->fax}}<br>
        email :{{$client->email}}<br></h4>
        </b>
      </td>
      </tr>
      
    </tbody>
  </table>
<!--liste des ligne vente-->
<br><br><br><br><br><br><br><br>
 <table class="table" style="margin-top: 12%;" border="1px">
                    <thead>
                        <tr style="background-color: #c2d6d6;color:black;">
                            <th>{{ trans('text.N°produit')}}</th>
                            <th>{{ trans('text.disignation')}}</th>
                            <th>{{ trans('text.marque')}}</th>
                            <th>{{ trans('text.categorie')}}</th>
                            
                            <th>{{ trans('text.prix_A')}}</th>
                            <th>{{ trans('text.qnt_cmd')}}</th>
                            <th >{{ trans('text.TVA')}}</th>
                            <th ">{{ trans('text.T_TH')}}</th>
                            <th ">{{ trans('text.T_TTC')}}</th>
                        </tr>
                    </thead>
                    <tbody>
          @foreach($commande_vente->vente_lignes as $Lignevente)
              <tr>
                  <td> {{$Lignevente->article->id}}</td>
                  <td>{{$Lignevente->article->name}}</td>
                  <td>{{$Lignevente->article->Brand}}</td>
                  <td>{{$Lignevente->article->category->name}}</td>
                  <td>{{$Lignevente->article->prix_vente}}</td>
                            
                  <td>{{substr($Lignevente->qnt_cmd ,0,6)}}</td>
                  <td>{{$Lignevente->TVA }} %</td>
                  <td>{{$Lignevente->T_HT}}</td>
                  <td>{{$Lignevente->T_TTC}}</td>

                            <!--  button -->
                            
              </tr>
                        @endforeach
                       
                    </tbody>
                </table>
<!--table-->

<?php $ToTAL_ht=0; ?>
 @foreach($commande_vente->vente_lignes as $Lignevente)
  <input type="hidden" value="{{$ToTAL_ht=$ToTAL_ht+($Lignevente->T_HT) }}">  

      @endforeach
<br><br><br>
<br><br><br>
  <table class="table" style="width: 54%;     margin-top: 11%;">
    <thead>
      <tr style="background-color: rgba(232, 162, 162, 0.62);" >
        <th>TOTAL  HT</th>
        <th>TOTAL TVA</th>
        <th style="background-color: #ff9900;">TOTAL TTC</th>
      </tr>
    </thead>
    <tbody>
      
      <tr style="background-color: rgba(216, 255, 0, 0.55);
}
">
    
     
      <td><font color="red"><b>{{$ToTAL_ht}} DH</b></font></td>
      <td><font color="red"><b>{{($commande_vente->total)-($ToTAL_ht)}} DH</b></font></td>
       <td><font color="red"><b>{{$commande_vente->total}} DH</b></font></td> 
      </tr>
      
    </tbody>
  </table>

 @section('foot')
 <style> 
#infoclient {
    
  

    b  border-width:5px;  
    border-left-style:ridge;
}
</style>
 @stop

@stop