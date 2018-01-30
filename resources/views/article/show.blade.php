@extends('layouts.admin')
@section('content')


<div class="page-title">  
    <h3>{{ trans('text.info-article')}} : {{$article->name}}</h3> 
  
</div>
<div class="container" >
  <div class="col-md-6" style="margin-left: 15%;">
   <div class="grid simple ">
            <div class="grid-title no-border">
                
                <div class="tools"> <a href="javascript:;" class="collapse"></a>
                    
                    
                    <a href="{{ route('dashboard::article.index') }}" class="remove"></a>
                </div>
          <table class="table table-bordered no-more-tables">
            
            <tbody>
              
              <tr>
                <td>image :</td>
                <td><a id="Show-image_modal"><img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$article->image }}" alt="img produit"  style="width: 15%;padding-left: 6px;"></a></td>
                
              </tr>
              <tr>
                <td>reference</td>
                <td>{{$article->barre_code }}</td>
                
              </tr>
              <tr >
                <td>Disignation</td>
                <td>{{$article->name }}</td>
                
              </tr>
              <tr >
                <td>marque</td>
                <td>{{$article->Brand }}</td>
                
              </tr>
              <tr >
                <td>categorie</td>
                <td>{{$article->category_id }}</td>
                
              </tr>
              <tr>
                <td>prix d'achat</td>
                <td>{{$article->prix_achat }}</td>
                
              </tr>
              <tr>
                <td>prix de vente </td>
                <td>{{$article->prix_vente }}</td>
                
              </tr>
              <tr>
                <td>quantité de stock</td>
                <td>{{$article->available_qnt }}</td>
                
              </tr>
              <tr>
                <td>quantité minimal</td>
                <td>{{$article->min_qnt }}</td>
                
              </tr>
              
              <tr>
                <td>descreption</td>
                <td><textarea class="form-control input-lg " disabled="disabled" rows="3" id="comment" name="description" >{{$article->description }}</textarea></td>
                
              </tr>
            </tbody>
          </table>
          <center>
            <a href="{{route('dashboard::article.index')}}"> <button type="button" class="btn btn-info" >retour</button></a>
          </center>
        </div>
        </div>
      </div>
 
  <!----------------show image in modal ------>
<div class="modal fade" id="myModal_image" role="dialog"  style="background-color: rgb(245, 245, 195);">
  <div class="modal-dialog" style="width: 70%;margin-top: 9%;">
    <div class="well">
      
      <div class="modal-body">
        <img   class="img-thumbnail" src="/Nprojet/public/uploads/images/lg/{{$article->image }}" alt="img produit"  style="width: 100%;height: 14cm;">
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