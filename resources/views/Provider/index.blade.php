@extends('layouts.admin')

@section('content')




<div class="row">
    <div class="col-md-14">
        <div class="grid simple ">
            <div class="grid-body no-border">
            
                <table class="table table-bordered no-more-tables">
                <div class="page-title">
               <h3>{{ trans('text.providers-list')}}</h3>
                 </div>
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
                        @foreach($providers as $provider)
                        <tr>
                        <td> {{substr($provider->name_society,0,30)}}..</a></td>
                           <td>{{substr($provider->name,0,20)}}..</td>
                        <td><img src="/Nprojet/public/uploads/images/lg/{{$provider->image }}" alt="img produit"  style="width:71px;height: 41px;margin-bottom: -13px;"></td> 
                            
                            
                            <td>{{$provider->tel}}</td>
                            <td>{{$provider->fax}}..</td>

                            <td>{{substr($provider->mail,0,20)}}..</td>
 <!--span count cmd achat-->                          
 <td><a  data-toggle="tooltip" data-placement="top" title="{{trans('text.nbcmd')}}"><span class="badge" style="font-size: 25px;"  >
{{$provider->cmdachats->count()}} </span></a></td>
<!--  button -->
<td>
@if(Auth::user()->acces=="admin")
    <a href="{{route('dashboard::provider.edit',$provider->id)}}"  class="btn btn-warning" style=""
     data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}" >
        <span class="glyphicon glyphicon-edit " style=""></span>
    </a>
    
    <!-- button -->
    <a href=""   class="btn btn-danger" data-toggle="modal" data-target="#modal{{$provider->id}}" >
        <span class="glyphicon glyphicon-trash  "  style=""></span>
    </a>
    @endif
    <a href="{{ route('dashboard::provider.show',$provider->id )}}" class="btn btn-success " class="btn btn-success "  data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}">
        <span class="glyphicon glyphicon-fullscreen "  style=""></span>
    </a>
<!--model conferm supp-->
<div class="modal fade" id="modal{{$provider->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 24%;    width: 36%;">
        <!-- Modal content-->
        <div class="modal-content" style="color: white;font-size: 28px;">
         
            <div class="modal-body" style="background-color: rgba(39, 43, 39, 0.98);">
                <p>voulez vous vraiment supprimer <center><strong>{{$provider->name}}</strong></center></p>
            </div>
           
            <div >
                <a href="{{route('dashboard::provider.destroy',[$provider->id,$provider->cmdachats->count()])}}">
                <button type="button" class="btn btn-primary" style="    margin-left: 22%;">OUI</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">NON</button>
          
            </div>
        </div>
        
    </div>
</div>
<!--end model-->
</td>
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
setTimeout(function(){$('#Modalmessage').modal('hide'); },3000);

    
});    
</script>
@stop

<!--model conferm supp-->
<div class="modal fade" id="Modalmessage" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: #6fdc6f;color: white;font-size: 32px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #6fdc6f;">
                <div class="alert alert-danger" style="width: 100%" style="float: right;">
                    <strong>Message !  :  </strong><?php echo($_GET['message']) ?>
                     <!--message worning-->
                <?php if(isset($_GET['action'])){ if($_GET['action']==0) { ?>
                <p>impossible de supprimer ce {{trans('text.fournisseur')}}  parce qu il possède encore des commandes d'achat..</p>
                 <?php  } } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--end message -->
                <nav aria-label="Page navigation" class="pagination-container">
                    {{ $providers->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@section('foot')
<script type="text/javascript">
    $(document).ready(function(){
    $("supp").click(function(){
        $("linksupp").click();
    });
});
</script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
@stop
@stop

