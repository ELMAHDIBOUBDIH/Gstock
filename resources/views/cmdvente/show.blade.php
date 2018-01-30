@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="grid simple ">
            
     
        <div class="grid-body no-border">
<div class="grid-body no-border">
  <br><br><br>       
<table style="width: 46%;margin-left: 5%;" >
    
    <tbody>
        <tr>
            <td><b>{{ trans('text.numcommande')}}: </b></td>
            <td><input type="text" value="{{$commande_vente->id}}" disabled="" class="inputcmd" style="color:red;"></td>
        </tr>
        <tr>
            <td><b>{{ trans('text.client')}}</b></td>
            <td><input type="text" value="{{$commande_vente->client->name}}" disabled="" class="inputcmd" style="color:red;"></td>
        </tr>
        <tr>
            <td><b>{{ trans('text.Datecmd')}}</b></td>
            <td><input type="text" value="{{$commande_vente->date}}" disabled="" class="inputcmd" style="color:red;"></td>
        </tr>
        
    </tbody>
</table>
<br><br><br><br><br><br>
<table class="table table-bordered">
    <thead>
        <tr style="background-color: #c2d6d6;color:black;">
            <th>{{ trans('text.N°produit')}}</th>
            <th>{{ trans('text.disignation')}}</th>
            <th>{{ trans('text.marque')}}</th>
            <th>{{ trans('text.categorie')}}</th>
            <th>{{ trans('text.image')}}</th>
            <th>{{ trans('text.prix_V')}}</th>
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
            <td><a href="#"" data-toggle="modal" data-target="#myModal_image"><img src="/Nprojet/public/uploads/images/lg/{{$Lignevente->article->image }}" alt="img produit"  style="width: 71px;height: 41px;margin-bottom: -13px;"></a></td>
            <td>{{substr($Lignevente->article->prix_vente,0,6) }}</td>
            
            <td>{{substr($Lignevente->qnt_cmd ,0,6)}}</td>
            <td>{{substr($Lignevente->TVA ,0,6)}}</td>
            <td>{{substr($Lignevente->T_HT,0,6) }}</td>
            <td>{{substr($Lignevente->T_TTC,0,6) }}</td>
            <!--  button -->
            <td>
                
                
                <!----------------show image in modal ------>
                <div class="modal fade" id="myModal_image" role="dialog"  style="">
                    <div class="modal-dialog" style="width: 70%;margin-top: 9%;">
                        <div class="well">
                            
                            <div class="modal-body">
                                <img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$Lignevente->article->image }}" alt="img produit"  style="width: 100%;height: 14cm;">  
                            </div>
                        </div>
                    </div>
                </div>
                
            </td>
        </tr>
        @endforeach
        <tr style="background-color:rgba(194, 214, 214, 0.49);">
            <td colspan="7"></td>
            <td colspan="2"><font color="red"> <b>{{ trans('text.M-Total')}}</b></font></td>
            <td colspan="3"><font color="red"><b>{{$commande_vente->total}}</b></font></td>
            
        </tr>
    </tbody>
</table>
@stop