  @extends('layouts.admin')

@section('content')
<div class="row"> 
   <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">

<table style="width: 46%;margin-left: 5%;">
    
    <tbody>
        <tr>
            <td><b>{{ trans('text.numcommande')}}: </b></td>
            <td><input type="text" value="{{$commande_achat->id}}" disabled=""  class="inputcmd"></td>
        </tr>
        <tr>
            <td><b>{{ trans('text.provider')}}</b></td>
            <td><input type="text" value="{{$commande_achat->provider->name}}" disabled=""  class="inputcmd"></td>
        </tr>
        <tr>
            <td><b>{{ trans('text.date_cmd')}}</b></td>
            <td><input type="text" value="{{$commande_achat->date}}" disabled=""  class="inputcmd"></td>
        </tr>
        
    </tbody>
</table>
<br><br><br> <br><br><br> 
   <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: #c2d6d6;color:black;">
                            <th>{{ trans('text.N°produit')}}</th>
                            <th>{{ trans('text.disignation')}}</th>
                            <th>{{ trans('text.marque')}}</th>
                            <th>{{ trans('text.categorie')}}</th>
                            <th>{{ trans('text.image')}}</th>
                            <th>{{ trans('text.prix_A')}}</th>
                            <th>{{ trans('text.qnt_cmd')}}</th>
                            <th >{{ trans('text.TVA')}}</th>
                            <th ">{{ trans('text.T_HT')}}</th>
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
<td><a href="#"" data-toggle="modal" data-target="#myModal_image"><img src="/Nprojet/public/uploads/images/lg/{{$Ligneachat->article->image }}" alt="img produit"  style="width: 71px;height: 41px;"></a></td>

                            <td>{{$Ligneachat->prix_unitaire }}</td>
                            
                            <td>{{substr($Ligneachat->qnt_cmd ,0,6)}}</td>
                            <td>{{substr($Ligneachat->TVA ,0,6)}}</td>
                            <td>{{substr($Ligneachat->T_HT,0,6) }}</td>
                            <td>{{substr($Ligneachat->T_TTC,0,6) }}</td>

                            <!--  button -->
                            <td>
                        </tr>
                        @endforeach
                        <tr style="background-color:rgba(194, 214, 214, 0.49);">
                        <td colspan="7"></td>
                       <td colspan="2"><font color="red"> <b>{{ trans('text.M-Total')}}</b></font></td>
                       <td colspan="3"><font color="red"><b>{{$commande_achat->total}}</b></font></td>
  
                        </tr>
                    </tbody>
                </table>
                <!---show image in modal -->
                <div class="modal fade" id="myModal_image" role="dialog"  style="">
                    <div class="modal-dialog" style="width: 70%;margin-top: 9%;">
                        <div class="well">
                            
                            <div class="modal-body">
                                <img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$Ligneachat->article->image }}" alt="img produit"  style="width: 100%;height: 14cm;">  
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
@stop