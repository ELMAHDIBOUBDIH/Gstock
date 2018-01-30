@extends('layouts.admin')

@section('content')


    <div class="grid simple ">
        <div class="grid-title no-border">
            <h4>{{ trans('text.add-article')}}</h4>
            <div class="tools"> 
            <a href="{{ route('dashboard::article.index') }}" class="remove"></a>
        </div>
    </div>
    <div class="grid-body no-border">
        <div class="add-element box">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal" action="{{route('dashboard::article.store')}}"
                method="POST" enctype="multipart/form-data" style="width: 97%;">
                {{csrf_field() }}
                <div class="{{ $errors->has('barre_code') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >code barre</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter  le code barre max (13 chiffres)"
                        name="barre_code" value="{{Request::old('barre_code')}}" >
                    </div>
                </div>
                <div class="{{ $errors->has('name') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >Disignation</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter Disignation"
                        name="name" value="{{Request::old('name')}}" maxlength="8">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" >categorie</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="sel2" name="category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="{{ $errors->has('Brand') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >marque</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter la marque"
                        name="Brand" value="{{Request::old('Brand')}}" maxlength="8">
                    </div>
                </div>
                <div class="{{ $errors->has('description') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3">Description</label>
                    <div class="col-sm-7">
                        <textarea class="form-control input-lg" rows="2" maxlength="300" id="comment" name="description" placeholder="Enter la descreption" >{{Request::old('description')}}</textarea>
                    </div>
                </div>
                <div class="{{ $errors->has('prix_achat') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >prix achat</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="prixachat" placeholder="Enter prix achat"
                        name="prix_achat" value="{{Request::old('prix_achat')}}" maxlength="8" onkeyup="myFunction()">
                    </div>
                </div>
                <div class="{{ $errors->has('prix_vente') ? 'form-group has-error' :'form-group'}}" >
                    <label class="control-label col-sm-3" >prix vente</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="prixvente" placeholder="Enter prix_vente"
                        name="prix_vente" value="{{Request::old('prix_vente')}}" maxlength="8">
                    </div>
                </div>
                <div class="{{ $errors->has('min_qnt') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >quantite min</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter la quantite minimal"
                        name="min_qnt" value="{{Request::old('min_qnt')}}" maxlength="8">
                    </div>
                </div>
                <div class="{{ $errors->has('available_qnt') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >quantite stock</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="0.00"
                        name="available_qnt" value="0" maxlength="8">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" >image </label>
                    <div class="col-sm-7">
                        <input type="file" name="image"  value="image" class="file">
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-danger" style="margin-left: 26%;
    font-size: 22px;" >Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('foot')
<script>
function myFunction() {
 var x = document.getElementById("prixachat").value
var y= x *(1.15); 
  
document.getElementById("prixvente").value = (y).toFixed(2);
}
</script>
@stop

@stop

