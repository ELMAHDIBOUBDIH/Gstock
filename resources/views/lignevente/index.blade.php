@extends('layouts.admin')

@section('content')


<div class="row">

    <div class="col-md-12">
        <div class="grid simple ">
            
            <div class="grid-body no-border">
            <div class="page-title">    
    <h3>{{ trans('text.ligne_vente')}}</h3> 
   
</div>


 <!--span nomber article commander et button valider cmd-->
<div style="float: right;">
@if(($commande_vente->vente_lignes()->count())!=0) 
<a href="{{route('dashboard::Invoicevente.store',$commande_vente->id)}}"><button type="button" class="btn  btn-lg"  style="font-size: 25px;background-color: #0b17a7;color: white;margin-left: -82%;padding: 10%;">valider</button></a>@endif 
<a href="{{route('dashboard::cmdvente.index')}}" title=""><button type="button" class="btn  btn-lg"  style=";font-size: 25px;background-color: #ab0778;color: white;padding: 10%;">Refuse</button></a>
</div>  
         
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
<br><br>
<!--span nomber article commander et button valider cmd-->
<div>
<span class="badge" style="font-size: 25px;">Nomber d'Article commander : 
{{$commande_vente->vente_lignes()->count()}}</span>
</div>
<br><br>
<table class="table table-striped table-bordered" style="min-width:73%;width:auto;">
    <tr style="background-color:rgba(2, 142, 0, 0.41);">
        
        <td><b>{{ trans('text.nom-produit')}}</b></td>
        <td><b>{{ trans('text.TVA')}}</b></td>
        <td><b>{{ trans('text.prix_vente')}}</b></td>
        <td><b>{{ trans('text.qnt-cmd')}}</b></td>
        
    </tr>
<tr style="background-color:rgba(2, 142, 0, 0.41);">
    <form method="POST" action="{{route('dashboard::Lignevente.store',$commande_vente->id)}}" >
        {{csrf_field() }}
        <td>
            
            <select class="selectpicker"  name="id_article" id="fname" onclick="changeText(arr={{$articles}})">
                @foreach($categorys as $category)
                <optgroup   label="{{$category->name}}">
                    @foreach($category->articles as $a)
                    <?php $comp = 0 ?>
                    @foreach($commande_vente->vente_lignes as $ligne)
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
            <input type="text" class="form-control" name="prix_unitaire" id="prix-V" required>
        </div>
    </td>
    <td>
        <input type="number" min="1" name="qnt_cmd" class="form-control" required="" pattern="\S+" value="1" id="qntcmd" required>
    </td>
    <td colspan="6"><input type="submit" value="ajouter" name="ajouter" class="btn btn-primary"></td>
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
                <a href="{{route('dashboard::Lignevente.edit',$Lignevente->id)}}"  class="btn btn-warning" >
                    <span class="glyphicon glyphicon-edit " style=""></span>
                </a>
                <!-- button -->
                <a href="{{route('dashboard::Lignevente.destroy',[$commande_vente->id,$Lignevente->id])}}"   class="btn btn-danger" style="">
                    <span class="glyphicon glyphicon-trash  "  style=""></span>
                </a>
                <!----------------show image in modal ------>
                <div class="modal fade" id="myModal_image" role="dialog"  style="">
                    <div class="modal-dialog" style="width: 70%;margin-top: 9%;">
                        <div class="well">
                            
                            <div class="modal-body">
                                <img   class="img-thumbnail" src="/Nprojet/public/uploads/{{$Lignevente->article->image }}" alt="img produit"  style="width: 100%;height: 14cm;">
                                <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">&times;</button>
                                
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


              
                <nav aria-label="Page navigation" class="pagination-container">
                    {{ $ligneventes->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@section('foot')
<script>
function changeText(arr) {
    x = document.getElementById("fname").value
    document.getElementById("prix-V").value = arr[x-1].prix_vente;
    document.getElementById("qntcmd").max =arr[x-1].available_qnt;
}

</script>
<style type="text/css">
.modal-body  #close{margin-top: -27.5cm;margin-left: 96.5%;;}
input.inputcmd   {
    background-color: #f8fdb3;
    font-size: 16px;
    color: red;
}
</style>
@stop
  


@stop

