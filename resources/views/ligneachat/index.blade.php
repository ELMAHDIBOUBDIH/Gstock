@extends('layouts.admin')

@section('content')

<div class="page-title">	
    
  
</div>
<div class="row">

    <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">

                <div class="tools">	
                    <a href="{{route('dashboard::cmdachat.index')}}" class="remove"></a>
                </div>
            </div>
            <div class="grid-body no-border">
<h3>{{ trans('text.ligne_achat')}}</h3> 
<br><br><br>  
<!--span nomber article commander et button valider cmd-->
<div style="float: right;">
<a href="{{route('dashboard::Invoice.store',$commande_achat->id)}}"><button type="button" class="btn  btn-lg"  style="font-size: 25px;background-color: #0b17a7;color: white;margin-left: -82%;padding: 10%;">valider</button></a>
<a href="{{route('dashboard::cmdachat.index')}}" title=""><button type="button" class="btn  btn-lg"  style=";font-size: 25px;background-color: #ab0778;color: white;padding: 10%;">Refuse</button></a>
</div>         
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

<br><br>
<div>
@if(($commande_achat->achat_lignes()->count())!=0)

                   
<span class="badge" style="font-size: 25px;">{{ trans('text.nb-acticle-cmd')}} : 
{{$commande_achat->achat_lignes()->count()}}</span> 

@endif
</div>
<table class="table table-striped table-bordered" style="min-width:73%;width:auto;">
    <tr style="background-color:rgba(2, 142, 0, 0.41);">
        
        <td><b>{{ trans('text.nom-produit')}}:</b></td>
        <td><b>{{ trans('text.TVA')}}:</b></td>
        <td><b>{{ trans('text.prix_U')}}:</b></td>
        <td><b>{{ trans('text.qnt-cmd')}}:</b></td>
        
    </tr>
    <tr style="background-color:rgba(2, 142, 0, 0.41);">
        <form method="POST" action="{{route('dashboard::Ligneachat.store',$commande_achat->id)}}" >
        {{csrf_field() }}
            <td>
                <select class="selectpicker"  name="id_article" id="fname" onclick="changeText(arr={{$articles}})" required>
                     @foreach($categorys as $category)
                <optgroup   label="{{$category->name}}">
                    @foreach($category->articles as $a)
                    <?php $comp = 0 ?>
                    @foreach($commande_achat->achat_lignes as $ligne)
                    @if(($ligne->id_article) == ($a->id))
                    <?php $comp = 1; break; ?>
                    @endif
                    @endforeach
                    <?php if($comp == 0) { ?>
                    <option value="{{$a->id}}">{{$a->name}}</option>
                    <?php } ?>
                    @endforeach
                </optgroup>
                @endforeach
                </select>
            </td>
            <td>
                <div class="input-group  col-md-8">
                    <input type="text" class="form-control" name="TVA"  placeholder="Enter TVA" value="0"><span class="input-group-addon " style="color: red;">
                    <i >%</i>
                </span>
            </div>
        </td>
        <td>
                <div class="input-group  col-md-12">
                    <input type="text" class="form-control" name="prix_unitaire" id="pri" required>
            </div>
        </td>
        <td>
            <input type="number" min="1" name=" qnt_cmd" class="form-control" required="" pattern="\S+" value="1" required>
        </td>
        <td colspan="6"><input type="submit" value="{{trans('text.ajouter')}}" name="ajouter" class="btn btn-primary"></td>
    </tr>
</form>
</tbody>
</table>

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
<td><a href="#"" data-toggle="modal" data-target="#myModal_image"><img src="/Nprojet/public/uploads/images/lg/{{$Ligneachat->article->image }}" alt="img produit"  style="width: 71px;height: 41px;margin-bottom: -13px;"></a></td>

                            <td>{{$Ligneachat->prix_unitaire }}</td>
                            
                            <td>{{substr($Ligneachat->qnt_cmd ,0,6)}}</td>
                            <td>{{substr($Ligneachat->TVA ,0,6)}}</td>
                            <td>{{substr($Ligneachat->T_HT,0,6) }}</td>
                            <td>{{substr($Ligneachat->T_TTC,0,6) }}</td>

                            <!--  button -->
                            <td>
            <a href="{{route('dashboard::Ligneachat.edit',$Ligneachat->id)}}"  class="btn btn-warning" >
                                    <span class="glyphicon glyphicon-edit " style=""></span>
                                </a>

                                <!-- button -->
           <a href=""   class="btn btn-danger" data-toggle="modal" data-target="#modal{{$Ligneachat->article->id}}">
            <span class="glyphicon glyphicon-trash  "  style=""></span>
            </a>
            <!--show image in modal -->
<div class="modal fade" id="myModal_image" role="dialog"  style="">
  <div class="modal-dialog" style="width: 70%;margin-top: 9%;">
    <div class="well">
      
      <div class="modal-body">
        <img   class="img-thumbnail" src="/Nprojet/public/uploads/{{$Ligneachat->article->image }}" alt="img produit"  style="width: 100%;height: 14cm;">
        <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">&times;</button>
        
      </div>
    </div>
  </div>
</div>
<!--end modal -->
<!--model conferm supp-->
    <div class="modal" id="modal{{$Ligneachat->article->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: #6fdc6f;color: white;font-size: 32px;">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #6fdc6f;">
             
                <p>voulez vous vraiment supprimer</p>  
            </div>
            <div class="modal-footer">
            <div style="margin-right: 30%;">
        <a href="{{route('dashboard::Ligneachat.destroy',[$commande_achat->id,$Ligneachat->id])}}" title="">
                <button type="button" class="btn btn-primary" id="supp" >DELETE</button> </a>
 
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">Close</button>
          </div>
            </div>
        </div>
        
    </div>
</div>

</td>
<!--end model-->   
                               
                        </td>
                        </tr>
                        @endforeach
                        <tr style="background-color:rgba(194, 214, 214, 0.49);">
                        <td colspan="7"></td>
                       <td colspan="2"><font color="red"> <b>{{ trans('text.M-Total')}}</b></font></td>
                       <td colspan="3"><font color="red"><b>{{$commande_achat->total}}</b></font></td>
  
                        </tr>
                    </tbody>
                </table>

                <nav aria-label="Page navigation" class="pagination-container">
                    {{ $ligneachats->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

<!--change auto prix_U-->
@section('foot')
<script>
function changeText(arr) {
    x = document.getElementById("fname").value
    document.getElementById("pri").value = arr[x-1].prix_achat;
}

</script>
<style type="text/css">
.modal-body  #close{margin-top: -27.5cm;margin-left: 96.5%;}
input.inputcmd   {
    background-color: #f8fdb3;
    font-size: 16px;
    color: red;
}
</style>
@stop
  


@stop

