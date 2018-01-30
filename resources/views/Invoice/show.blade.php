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
        <center> <font size="5">date de commande : {{$Invoice->date}}<br><b>Facture {{$Invoice->invoice_type}} N°:
        {{$Invoice->reference_cmd}}/{{$date->year}}  </b> </font><br>
        </center>
      </td>
    </tr>
  </tbody>
</table>
 <table class="table" style="width: 51%;margin-left: 65%;margin-top: -319px;">
  
    <tbody>
    <tr><td><h4 style="color: black;font-weight: 700; ">date facturation le : {{$Invoice->date}}</h4>  </td></tr>
       
      <tr>
       
       <td rowspan="2" id="infoprovider" style="padding-left: 4%;">
        <b>  <h4 style="color: black;font-weight: 700; ">
        Fournisseur n° :{{$provider->name}}<br>
        raison Social :{{$provider->name_society}}<br>
        nom :{{$provider->name}}<br>
        adresse :{{$provider->adresse}}<br>
        tel :{{$provider->tel}}<br>
        fax :{{$provider->fax}}<br>
        email :{{$provider->email}}<br></h4>
        </b>
      </td>
      </tr>
      
    </tbody>
  </table>
<!--liste des ligne achat-->
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
          @foreach($commande_achat->achat_lignes as $Ligneachat)
              <tr>
                  <td> {{$Ligneachat->article->id}}</td>
                  <td>{{$Ligneachat->article->name}}</td>
                  <td>{{$Ligneachat->article->Brand}}</td>
                  <td>{{$Ligneachat->article->category->name}}</td>
                  <td>{{$Ligneachat->article->prix_achat}}</td>
                            
                  <td>{{substr($Ligneachat->qnt_cmd ,0,6)}}</td>
                  <td>{{$Ligneachat->TVA }} %</td>
                  <td>{{$Ligneachat->T_HT}}</td>
                  <td>{{$Ligneachat->T_TTC}}</td>

                            <!--  button -->
                            
              </tr>
                        @endforeach
                       
                    </tbody>
                </table>
<!--table-->

<?php $ToTAL_ht=0; ?>
 @foreach($commande_achat->achat_lignes as $Ligneachat)
  <input type="hidden" value="{{$ToTAL_ht=$ToTAL_ht+($Ligneachat->T_HT) }}">  

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
      <td><font color="red"><b>{{($commande_achat->total)-($ToTAL_ht)}} DH</b></font></td>
       <td><font color="red"><b>{{$commande_achat->total}} DH</b></font></td> 
      </tr>
      
    </tbody>
  </table>

 @section('foot')
 <style> 
#infoprovider {
    
  

     border-width:5px;  
    border-left-style:ridge;
}
</style>
 @stop

@stop