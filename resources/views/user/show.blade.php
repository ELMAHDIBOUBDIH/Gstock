@extends('layouts.admin')
@section('content')


<div class="page-title">  
    <h3>{{ trans('text.info-client :')}}{{$client->name}}</h3> 
  
</div>

<div class="container" >
  <div class="col-md-9">
   <div class="grid simple ">
            <div class="grid-title no-border">
                
                <div class="tools"> <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="{{ route('dashboard::client.index') }}" class="remove"></a>
                </div>
            
        
          
           
            
          
          <table class="table " style="">
            
            <tbody>
              
              <tr class="info">
                <td>image :</td>
                <td><a id="Show-image_modal"><img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$client->image }}" alt="img produit"  style="width: 69%;padding-left: 6px;"></a></td>
                
              </tr>
              <tr>
                <td>reference :</td>
                <td>{{$client->name_society }}</td>
                
              </tr>
              <tr class="success">
                <td>Disignation : </td>
                <td>{{$client->name }}</td>
                
              </tr>
              <tr class="danger">
                <td>marque :</td>
                <td>{{$client->image }}</td>
                
              </tr>
              <tr class="info">
                <td>categorie :</td>
                <td>{{$client->tel }}</td>
                
              </tr>
              <tr class="warning">
                <td>prix_A :</td>
                <td>{{$client->fax }}</td>
                
              </tr>
              <tr class="active">
                <td>prix_V :</td>
                <td>{{$client->mail }}</td>
                
              </tr>
            
              
              <tr class="danger">
                <td>descreption</td>
                <td><textarea class="form-control" disabled="disabled" rows="4" id="comment" name="adresse" >{{$client->adresse }}</textarea></td>
                
              </tr>
            </tbody>
          </table>
          <div class="modal-footer bg-active">
            <a href="{{route('dashboard::client.index')}}"> <button type="button" class="btn btn-info" >retour</button></a>
          </div>
        </div>
        </div>
      </div>
 
  <!----------------show image in modal ------>
<div class="modal fade" id="myModal_image" role="dialog"  style="background-color: rgb(245, 245, 195);">
  <div class="modal-dialog" style="width: 70%;margin-top: 9%;">
    <div class="well">
      
      <div class="modal-body">
        <img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$client->image }}" alt="img produit"  style="width: 100%;height: 14cm;">
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