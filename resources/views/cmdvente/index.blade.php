@extends('layouts.admin')
@section('content')
<div class="page-title">
    

  

<div class="row">
    <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">
                <div class="grid-body no-border">
                <h3>{{ trans('text.sorties-list')}}</h3>
<table class="table table-bordered no-more-tables">
    <thead>
        <tr>
            <th>{{ trans('text.reference')}}</th>
            <th>{{ trans('text.client')}}</th>
            <th>{{ trans('text.date_cmd')}}</th>
            <th>{{ trans('text.montant')}}</th>
            
        </tr>
    </thead>
    <tbody style="font-weight: bold;">
        @foreach($cmdventes as $cmdvente)
        <tr>
            <td> {{$cmdvente->id}}</td>
            <td>{{$cmdvente->client->name}}</td>
            <td>{{$cmdvente->date}}</td>
            <td>{{$cmdvente->total }}</td>
            <td><span class="badge" style="font-size: 25px;">
            {{$cmdvente->etat}}</span></td>
            
            <!--  button -->
            <td style="">
            @if(Auth::user()->acces=="admin")
                <a href="{{route('dashboard::cmdvente.edit',$cmdvente->id)}}"  class="btn btn-warning" style="" data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}">
                    <span class="glyphicon glyphicon-edit " style=""></span>
                </a>
                
                <a href=""   class="btn btn-danger" style="" data-toggle="modal" data-target="#modal{{$cmdvente->id}}">
                    <span class="glyphicon glyphicon-trash  "  style=""></span>
                </a>
                
                <a href="{{route('dashboard::Lignevente.index',$cmdvente->id)}}" class="btn btn-success " style="" data-toggle="tooltip" data-placement="top" title="{{trans('text.payer')}}">
                    <span class="fa fa-shopping-cart"  style=""></span>
                </a>@endif
                <a href="{{ route('dashboard::cmdvente.show',$cmdvente->id)}}" class="btn btn-success "  data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}">
                    <span class="glyphicon glyphicon-fullscreen "  style=""></span>
                </a>
<!--model conferm supp-->
  <div class="modal" id="modal{{$cmdvente->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: rgba(39, 43, 39, 0.98);color: white;font-size: 32px;">
           
            <div class="modal-body" style="background-color: rgba(39, 43, 39, 0.98);">
             
                <p style="    color: #ffffff;"> voulez vous vraiment supprimer la commande<br><strong> remarque : </strong>tout les lignes  concernant cet commande seront supprimées</p>  
            </div>
            <div class="modal-footer">
            <div style="margin-right: 25%;">
 <a href="{{route('dashboard::cmdvente.destroy',$cmdvente->id)}}" title="">
                <button type="button" class="btn btn-primary btn-cons" id="supp" >OUI</button> </a>
 
                <button type="button" class="btn btn-danger btn-cons" data-dismiss="modal" style="margin-left:8%;">NON</button>
          </div>
            </div>
        </div>
        
    </div>
</div>

</td>
<!--end model-->
      
    </tr>
    @endforeach
</tbody>
</table>
<!--message creation and edit message-->
<?php
if(isset($_GET['message']))
{
?>
@section('foot')
<script type="text/javascript">
$(document).ready(function(){
// Show the Modal on load
$("#Modalmessage").modal("show");

// Hide the Modal timer
setTimeout(function(){$('#Modalmessage').modal('hide'); },4000);

});
</script>
@stop
<!--model message reteur ou reponce conferm supp-->
<div class="modal fade" id="Modalmessage" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: rgba(39, 43, 39, 0.98);color: white;font-size: 32px;">
            
            <div class="modal-body" style="background-color: rgba(39, 43, 39, 0.98);">
                <div class="alert alert-danger" style="width: 100%" style="float: right;">
                    <strong>Message !  :  </strong><?php echo($_GET['message']) ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--end message creation and edit message-->
                            <nav aria-label="Page navigation" class="pagination-container">
                                {{ $cmdventes->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
 </div>           
 @stop