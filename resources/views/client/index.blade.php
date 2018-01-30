@extends('layouts.admin')

@section('content')

<div class="page-title">    
    <h3>{{ trans('text.clients-list')}}</h3>      
</div>
<div class="row">
    <div class="col-md-14">
        <div class="grid simple ">
            <div class="grid-title no-border">
               
            </div>
            <div class="grid-body no-border">
 <table class="table table-bordered no-more-tables">
                    <thead>
                        <tr>
                        
                        <th>{{ trans('text.name_society')}}</th>
                        <th>{{ trans('text.name')}}</th>
                        <th>{{ trans('text.image')}}</th>
                        <th>{{ trans('text.tel')}}</th>    
                        <th>{{ trans('text.fax')}}</th>
                        <th>{{ trans('text.mail')}}</th>    
                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                        <td> {{substr($client->name_society,0,30)}}..</a></td>
                           <td>{{substr($client->name,0,30)}}..</td>
                        <td><img src="/Nprojet/public/uploads/images/lg/{{$client->image}}" alt="img produit"  style="width:71px;height: 41px;margin-bottom: -13px;"></td> 
                             <td>{{$client->tel}}</td>
                            <td>{{$client->fax}}</td>
                           

                            <td>{{substr($client->mail,0,20)}}..</td>
                           
<!--  button -->
<td><span class="badge" style="font-size: 25px;" data-toggle="tooltip" data-placement="top" title="{{trans('text.nbcmd')}}">
{{$client->cmdventes->count()}} </span></td>

<td>@if(Auth::user()->acces=="admin")
    <a href="{{route('dashboard::client.edit',$client->id)}}"  class="btn btn-warning" style="margin-left: 0%"
    data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}">
        <span class="glyphicon glyphicon-edit " style=""></span>
    </a>
    
    <!-- button -->
    <a href="" hidden="true" ></a>
    <a href=""   class="btn btn-danger" data-toggle="modal" data-target="#modal{{$client->id}}" data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}">
        <span class="glyphicon glyphicon-trash  "  ></span>
    </a>
    @endif
    
    <a href="{{ route('dashboard::client.show',$client->id )}}" class="btn btn-success "  class="btn btn-success "  data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}" >
        <span class="glyphicon glyphicon-fullscreen "  style=""></span>
    </a>
 <!--model conferm supp-->
 <div class="modal fade" id="modal{{$client->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 24%;    width: 36%;">
        <!-- Modal content-->
        <div class="modal-content" style="color: white;font-size: 28px;">
         
            <div class="modal-body" style="background-color: rgba(39, 43, 39, 0.98);">
                <p>voulez vous vraiment supprimer le client : <strong>{{$client->name}}</strong></p>
            </div>
           
            <div >
                <a href="{{route('dashboard::client.destroy',[$client->id,$client->cmdventes->count()])}}">
                <button type="button" class="btn btn-primary" style="    margin-left: 22%;">OUI</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">NON</button>
          
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
                     <!--message worning-->
                <?php if(isset($_GET['action'])){ if($_GET['action']==0) { ?>
                <p>impossible de supprimer ce client  parce qu il possède encore des commandes de vent..</p>
                 <?php  } } ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php } ?>
<!--end message creation and edit message-->
                <nav aria-label="Page navigation" class="pagination-container">
                    {{ $clients->links() }}
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

