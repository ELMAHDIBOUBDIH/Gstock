@extends('layouts.admin')
@section('content')
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="    width: 77%;">
<div class="row">
  <div class="col-md-4" style="margin-left: 34%;margin-top: 17%;">
    <div class="grid simple ">
      <div class="grid-title no-border">

@if (count($errors) > 0)
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
        
        <h4> <span class="semi-bold">modifier une catégorie</span></h4>
        <form class="form-horizontal" action="{{route('dashboard::category.update',$category->id)}}"
          method="POST" style="margin-left: 10%;">
          {{csrf_field() }}
          <div class="{{ $errors->has('name') ? 'form-group has-error' :'form-group'}}">
            <label class="control-label col-sm-3" >Catégorie</label>
            
              <input type="text" class="form-control" id="form1Name" placeholder="Enter catégorie"
              name="name" value="{{$category->name}}">
            
          </div>
          <div class="{{ $errors->has('description') ? 'form-group has-error' :'form-group'}}">
            <label class="control-label col-sm-3">Description</label>
            
              <textarea class="form-control" rows="4" id="comment" name="description" placeholder="Enter la descreption"  value="" maxlength="200">{{$category->description}}</textarea>
              
            
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Modifier</button>
              <a href="{{route('dashboard::category.index')}}" class="btn btn-info" role="button">anuller</a>
            </div>
          </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>

@section('foot')
<script type="text/javascript">
  $(document).ready(function(){
 $("#myModal").modal({backdrop: false});
  });
</script>
@stop


@stop