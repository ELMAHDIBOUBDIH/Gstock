@extends('layouts.admin')
@section('content')
<div class="row" >
  <div class="col-md-8" style="margin-left: 16%;">
    <div class="grid simple ">
      <div class="grid-title no-border" >
        
        <div class="tools"> <a href="javascript:;" class="collapse"></a>
        <a href="#grid-config" data-toggle="modal" class="config"></a>
        <a href="javascript:;" class="reload"></a>
        <a href="{{route('dashboard::Payment.index',$Invoice->id)}}" class="remove"></a>
      </div>
      <table  style="margin-top: 4%;width:100%;" >
        <tbody>
          <tr>
            <td colspan="4" style="width: 64%;">
              <img src="/Nprojet/public/img/logo.png" height="100" width="160"><br>
              <h4 style="color: black;font-weight: 700;"> <br>DrStock<br>
              hay afrag rue 30<br>
              Tiznit<br>
              0661554997</h4>
              
              
            </td>
            
          </tr>
          <tr>
            <td> <font size="5" style="color: #331204;font-size: 26px;background-color: rgb(191, 187, 49);" >date de commande : {{$Invoice->date}}<br>Reçu Facture {{$Invoice->invoice_type}} N°: A-
            {{$Invoice->reference_cmd}}/{{$date->year}}</font></td>
            
            
            
          </tr>
        </tbody>
      </table>
      <table class="table" style="width:76%;margin-left:49%;
        margin-top:-343px;" >
        
        <tbody>
          <tr><td><h4 style="color: black;font-weight: 700; ">date facturation le : {{$Invoice->date}}</h4>  </td></tr>
          
          <tr>
            
            <td rowspan="2" id="infoprovider" style="padding-left: 4%;">
              <b>  <h4 style="color: black;font-weight: 700;background-color: #cac778; ">
              Fournisseur n° :{{$provider->name}}<br>
              raison Social :{{$provider->name_society}}<br>
              nom :{{$provider->name}}<br>
              tel :{{$provider->tel}}<br>
              fax :{{$provider->fax}}<br>
              email :{{$provider->mail}}<br>
              adresse :<textarea style="max-height:66px;width: 81%;">{{$provider->adresse}}</textarea></h4>
              </b>
            </td>
          </tr>
          
        </tbody>
      </table>
      <br><br><br><br>
      <table border="1px" style="width: 100%;background-color:rgba(31, 29, 29, 0.28);color: black;font-size: 173%;margin-top: 4%;">
        
        <tbody>
          <tr>
            <td>{{ trans('text.date')}}</td>
            <td>{{$payment->date}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.montant')}}</td>
            <td>{{$payment->montant}}   {{trans('text.DH')}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.rest_a_paye')}}</td>
            <td>{{$payment->rest_pay}}   {{trans('text.DH')}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.mode_payement')}}</td>
            <td>{{$payment->type}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.paye')}}</td>
            <td>{{$payment->payer}}   {{trans('text.DH')}}</td>
          </tr>
          <tr>
            <td>{{trans('text.description')}}</td>
            <td>
            <textarea rows="4" cols="50" style="width: 100%;">{{$payment->description}}</textarea></td>
          </tr>
          
        </tbody>
      </table>
    </table>
    <table>
      
    </table>
  </div>
</div>
@stop