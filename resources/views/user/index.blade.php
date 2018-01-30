@extends('layouts.admin')

@section('content')

<div class="page-title">	
    <h3>{{ trans('text.users-list')}}</h3>	
    
</div>


<div class="row">
    <div class="col-md-10">
        <div class="grid simple ">
            <div class="grid-title no-border">
                
                <div class="tools">	<a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="grid-body no-border">
                <table class="table no-more-tables">
                    <thead>
                        <tr>
                        <th>{{ trans('text.name')}}</th>
                    <th>{{ trans('text.username')}}</th>
                        <th>{{ trans('text.mail')}}</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($users as $user)
                        <tr>
                      @if(Auth::user()->name==$user->name ||Auth::user()->name=="admin")
                           <td>{{$user->name}}</td>
                           <td>{{$user->username}}</td>
                           <td>{{$user->email}}</td>  
         
<!--  button -->


<td>
    <a href="{{route('dashboard::user.edit',$user->id)}}"  class="btn btn-warning" style="margin-left: -16%"
    data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}">
        <span class="glyphicon glyphicon-edit " style=""></span>
    </a>
    
    <!-- button -->
    <a href="" hidden="true" ></a>
    @if(Auth::user()->name=="admin" && Auth::user()->name!=$user->name)
    <a href=""   class="btn btn-danger" data-toggle="modal" data-target="#modal{{$user->id}}" data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}">
        <span class="glyphicon glyphicon-trash  "  ></span>
    </a>
    @endif

    <div class="modal" id="modal{{$user->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="color: white;font-size: 32px;">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="alert alert-danger" style="width: 100%" style="float: right;">
             
                <p>voulez vous vraiment supprimer  ?
                </p>
               
                
                
            </div>
            <div class="modal-footer">
            <div style="margin-right: 30%;">
        <a href="{{route('dashboard::user.destroy',$user->id)}}" >
                <button type="button" class="btn btn-primary" id="supp" >DELETE</button> </a>
 
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">Close</button>
          </div>
            </div>
        </div>
        
    </div>
</div>


</td>
@endif
</tr>

@endforeach  

                    </tbody>
                </table>

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
        <div class="modal-content" style="background-color: #6fdc6f;color: white;font-size: 32px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #6fdc6f;">
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
                    {{ $users->links() }}
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

