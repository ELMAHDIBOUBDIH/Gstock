@extends('layouts.admin')

@section('content')


  
<div class="container">
  <div class="col-md-10">
     <div>
    <div class="grid simple ">
        <div class="grid-title no-border">
        
            <div class="tools"> 
            <a href="{{ route('dashboard::article.index') }}" class="remove"></a>
        </div>
    </div>
    <div class="grid-body no-border">
         
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
              
            </div>
            @endif
            <h4> <span class="semi-bold" >Modifier un Article</span></h4>
          
          <form class="form-horizontal" action="{{route('dashboard::article.update',$article->id)}}" method="POST" enctype="multipart/form-data" style="width: 100%;">
            {{csrf_field() }}
            <div class="{{ $errors->has('id') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3" >code barre :</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="form1Name" name="barre_code" value="{{$article->barre_code}}" maxlength="10">
              </div>
            </div>
            <div class="{{ $errors->has('name') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3" >Disignation :</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="form1Name" 
                name="name" value="{{$article->name}}" maxlength="10">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" >categorie :</label>
              <div class="col-sm-7">
                <select class="form-control" id="sel2" name="category">
                  @foreach($categorys as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="{{ $errors->has('Brand') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3" >marque :</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="form1Name" placeholder="Enter la marque"
                name="Brand" value="{{$article->Brand}}" maxlength="13">
              </div>
            </div>
            <div class="{{ $errors->has('description') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3">Description :</label>
              <div class="col-sm-7">
                <textarea class="form-control input-lg" rows="2" maxlength="100" id="comment" name="description" placeholder="Enter la descreption" >{{$article->description}}</textarea>
                
              </div>
            </div>
            <div class="{{ $errors->has('prix_achat') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3" >prix achat :</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="form1Name" placeholder="Enter prix vente"
                name="prix_achat" value="{{$article->prix_achat}}" maxlength="10">
              </div>
            </div>
            <div class="{{ $errors->has('prix_vente') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3" >prix vente:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="form1Name" placeholder="Enter prix_vente"
                name="prix_vente" value="{{$article->prix_vente}}"  maxlength="10">
              </div>
            </div>
            <div class="{{ $errors->has('min_qnt') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3" >quantite min:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="form1Name" placeholder="Enter la quantite minimal"
                name="min_qnt" value="{{$article->min_qnt}}" maxlength="10">
              </div>
            </div>
            <div class="{{ $errors->has('available_qnt') ? 'form-group has-error' :'form-group'}}">
              <label class="control-label col-sm-3" >quantite stock:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="form1Name" placeholder="Enter la quantite disponible"
                name="available_qnt" value="{{$article->available_qnt}}" maxlength="10">
              </div>
            </div>
            <div class="form-group">
              
              <label class="control-label col-sm-3" >image :</label>
              <div class="col-sm-7">
                <input type="file" name="image"  value="image" class="file">
              </div>
              
            </div>
            <div class="" style="    margin-left: 26%;">
              <button type="submit" class="btn btn-danger"  >Mise a jour</button>
              <a href="{{route('dashboard::article.index')}}"> <button type="button" class="btn btn-info" >retour</button></a>
              
            </div>
          </form>
        </div>
      </div>
    </div>


@stop