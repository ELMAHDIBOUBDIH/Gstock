@extends('layouts.admin')
@section('head')
<title>{{trans('admin.'.'$title')}}</title>
@stop
@section('content')



<div class="row">
    <div class="col-md-8">
        <div class="grid simple ">
            
            <div class="grid-body no-border">
            <br><br><br><br>
            @if(session()->has('message'))
<div class="alert alert-danger" >
{{session()->get('message')}}
</div>
@endif
    <table class="" style="width: 86%;margin-left: 6%;" border="1">
                    <thead>
                        <tr>
                            <th>Id_categorie</th>
                            <th>Catégorie</th>
                            <th colspan="3">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{substr($category->name,0,10)}}</td>
                            <td ><textarea class="form-control" rows="2"   DISABLED >{{$category->description}}</textarea></td>

                            <!-- Trigger the modal with a button -->
                          @if(Auth::user()->acces=="admin")  
                            <td>
                              
<a href="{{route('dashboard::category.edit',$category->id)}}"  class="btn btn-warning" style=""
    data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}">
    <span class="glyphicon glyphicon-edit " style=""></span>
</a>
<a href=""   class="btn btn-danger" data-toggle="modal"  data-placement="top" data-target="#Modalsupp">
    <span class="glyphicon glyphicon-trash  "  ></span>
</a>

                          
<!--model conferm supp-->
<div class="modal fade" id="Modalsupp" role="dialog">
    <div class="modal-dialog"  style="margin-top: 24%;    width: 33%;">
        <!-- Modal content-->
        <div class="modal-content" style="color: white;font-size: 28px;">
         
            <div class="modal-body" style="background-color: rgba(39, 43, 39, 0.98);">
                <p>voulez vous vraiment supprimer</p>
            </div>
           
            <div >
                <a href="{{route('dashboard::category.destroy',$category->id)}}">
                <button type="button" class="btn btn-primary" style="    margin-left: 22%;">OUI</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">NON</button>
          
            </div>
        </div>
        
    </div>
</div>
<!--end model-->
                                </td>@endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>



                <nav aria-label="Page navigation" class="pagination-container">
                    {{ $categories->links() }}
                </nav>
            </div>
        </div>
    </div>
@if(Auth::user()->acces=="admin")
    <div class="col-md-4"  style="background-color: #6e9abb;" >
        <div class="grid simple">
            <div class="grid-title no-border" >
                <h4>Ajouter une <span class="semi-bold">catégorie</span></h4>
               
            </div>
            <div class="grid-body no-border" style="background-color: #fff7d9;"> <br>
                <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            <strong>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </strong>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <form class="form-horizontal" action="{{route('dashboard::category.store')}}" method="POST" style="width: 138%">
                            {{csrf_field() }}
                            <div class="{{ $errors->has('name') ? 'form-group has-error' :'form-group'}}">
                                <label class="form-label">Catégorie :</label>
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Enter catégorie" name="name" value="{{Request::old('name')}}"
                                    style="width: 80%">
                                </div>
                            </div>
                            <div class="{{ $errors->has('description') ? 'form-group has-error' :'form-group'}}">
                                <label class="form-label">Description :</label>
                                <div class="controls">
                                    <textarea class="form-control" rows="3" maxlength="200" id="comment" name="description" placeholder="Enter la descreption" style="width: 80%">{{Request::old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-info btn-lg">Ajouter</button>
                                </div>
                            </div>
                        </form>
<!--message creation--> 
<?php
if(isset($_GET['message']))
{
?>

<div class="alert alert-danger" style="width: 130%">
  <strong>Message !  :  </strong><?php echo($_GET['message']) ?>
</div> 
<?php } ?>
<!--end message -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
 @section('foot')
 <style>
    td, th {
    padding-left: 14px;
} 
 </style>
 @stop
@endsection
