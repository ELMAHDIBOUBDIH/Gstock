@extends('layouts.admin')
@section('content')




<div class="container" >
  <div class="col-md-6" style="margin-left: 15%;">
   <div class="grid simple ">
            <div class="grid-title no-border">
<div class="page-title">  
<h3>{{ trans('text.info-provider :')}}{{$provider->name}}</h3> 
</div>
                <div class="tools"> 
                    <a href="{{ route('dashboard::provider.index') }}" class="remove"></a>
                </div>

          <table class="table" >
            
            <tbody>
              
              <tr>
                <td>{{ trans('text.image')}}</td>
                <td><a id="Show-image_modal"><img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$provider->image }}" alt="img produit"  style="width: 35%;padding-left: 6px;"></a></td>
                
              </tr>
              <tr>
                <td>{{ trans('text.name_society')}}</td>
                <td>{{$provider->name_society }}</td>
                
              </tr>
              <tr>
                <td>{{ trans('text.name')}}</td>
                <td>{{$provider->name }}</td>
                
              </tr>
              
              <tr>
                <td>{{ trans('text.tel')}}</td>
                <td>{{$provider->tel }}</td>
                
              </tr>
              <tr class="">
                <td>{{ trans('text.fax')}}</td>
                <td>{{$provider->fax }}</td>
                
              </tr>
              <tr>
                <td>{{ trans('text.mail')}}</td>
                <td>{{$provider->mail }}</td>
                
              </tr>
            
              
              <tr>
                <td>descreption</td>
                <td><textarea class="form-control" disabled="disabled" rows="4" id="comment" name="adresse" >{{$provider->adresse }}</textarea></td>
                
              </tr>
            </tbody>
          </table>
          <div style="margin-left: 43%;">
            <a href="{{route('dashboard::provider.index')}}"> <button type="button" class="btn btn-info" >retour</button></a>
          </div>
        </div>
        </div>
      </div>
 
  <!---show image in modal -->
<div class="modal fade" id="myModal_image" role="dialog"  style="background-color: rgb(245, 245, 195);">
  <div class="modal-dialog" style="width: 70%;margin-top: 9%;">
    <div class="well">
      
      <div class="modal-body">
        <img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$provider->image }}" alt="img produit"  style="width: 100%;height: 14cm;">
        <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">&times;</button>
        
      </div>
    </div>
  </div>
</div>
@section('foot')
<script type="text/javascript">


$(document).ready(function(){
$("#Show-image_modal").click(function(){
$("#myModal_image").modal();
});
});
</script>
<style type="text/css">
.modal-body  #close{margin-top: -27.5cm;margin-left: 96.5%;;}
</style>
@stop
@stop