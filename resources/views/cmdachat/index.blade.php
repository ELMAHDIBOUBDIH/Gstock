@extends('layouts.admin')

@section('content')

<div class="page-title">
    <h3>{{ trans('text.Entree-list')}}</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">
        <div class="grid-body no-border">
            <table class="table table-bordered no-more-tables">
                <thead>
                    <tr>
                        <th>{{ trans('text.reference')}}</th>
                        <th>{{ trans('text.provider_name')}}</th>
                        <th>{{ trans('text.date_cmd')}}</th>
                        <th>{{ trans('text.montant')}}</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($cmdachats as $cmdachat)
                    <tr>
                        <td> {{$cmdachat->id}}</td>
                        <td>{{$cmdachat->provider->name}}</td>
                        <td>{{$cmdachat->date}}</td>
                        <td>{{$cmdachat->total }}</td>

<td><span class="badge" style="font-size: 25px;">
{{$cmdachat->etat}}</span></td>                        
                        <!--  button -->
                        <td style="">
                        @if(Auth::user()->acces=="admin")
                         <a href="{{route('dashboard::cmdachat.edit',$cmdachat->id)}}"  class="btn btn-warning" style="margin-left: 0%;"  data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}">
                                <span class="glyphicon glyphicon-edit " style=""></span>
                            </a>
                            
                           
               <a href=""   class="btn btn-danger" style="margin-left: 0%;" data-toggle="modal" data-target="#modal{{$cmdachat->id}}">
                                <span class="glyphicon glyphicon-trash  "  style=""></span>
                            </a> 
                            <a href="{{route('dashboard::Ligneachat.index',$cmdachat->id)}}" class="btn btn-success " style="margin-left:0%;" data-toggle="tooltip" data-placement="top" title="{{trans('text.payer')}}">
                                <span class="fa fa-shopping-cart"  style=""></span>
                                </a>@endif
                            <a href="{{ route('dashboard::cmdachat.show',$cmdachat->id )}}" class="btn btn-success "  data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}">
                                    <span class="glyphicon glyphicon-fullscreen "  style=""></span>
                                </a>
                            
                            
               
                                </td>
<!--model conferm supp-->
    <div class="modal" id="modal{{$cmdachat->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: rgba(39, 43, 39, 0.98);color: white;font-size: 32px;">
           
            <div class="modal-body" style="background-color: rgba(39, 43, 39, 0.98);">
             
                <p>voulez vous vraiment supprimer la commande<br><strong> remarque : </strong>tout les lignes  concernant cet commande seront supprimées</p>  
            </div>
            <div class="modal-footer">
            <div style="margin-right: 25%;">
        <a href="{{route('dashboard::cmdachat.destroy',$cmdachat->id)}}" title="">
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
                {{ $cmdachats->links() }}
            </nav>
        </div>
    </div>
</div>
</div>
@section('foot')
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
@stop
@stop

