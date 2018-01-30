@extends('layouts.admin')

@section('content')


  
<div class="container">
  <div class="col-md-10">
<div class="grid simple ">
        <div class="grid-title no-border">
            <h4>{{ trans('text.edit-client')}}</h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a>
            <a href="#grid-config" data-toggle="modal" class="config"></a>
            <a href="javascript:;" class="reload"></a>
            <a href="{{ route('dashboard::client.index') }}" class="remove"></a>
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
            <h4> <span class="semi-bold" >{{trans('text.edit_client')}}</span></h4>
          
          <form class="form-horizontal" action="{{route('dashboard::client.update',$client->id)}}" method="POST" enctype="multipart/form-data" style="width: 100%;">
            {{csrf_field() }}
            <div class="{{ $errors->has('name_society') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.name_society')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter nom de la société "
                        name="name_society" value="{{$client->name_society}}" maxlength="30">
                    </div>
                </div>
                <div class="{{ $errors->has('name') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.name')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter nom de cleint"
                        name="name" value="{{$client->name}}" maxlength="30">
                    </div>
                </div>
                <div class="{{ $errors->has('tel') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.tel')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter Disignation"
                        name="tel" value="{{$client->tel}}" maxlength="12">
                    </div>
                </div>
                <div class="{{ $errors->has('fax') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.fax')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter Disignation"
                        name="fax" value="{{$client->fax}}" maxlength="12">
                    </div>
                </div>
                <div class="{{ $errors->has('mail') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.mail')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter la marque"
                        name="mail" value="{{$client->mail}}" maxlength="30">
                    </div>
                </div>
                <div class="{{ $errors->has('adresse') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3">{{trans('text.adresse')}}</label>
                    <div class="col-sm-7">
                        <textarea class="form-control " rows="4" maxlength="400" id="comment" name="adresse" placeholder="Enter la descreption" >{{$client->adresse}}</textarea>
                    </div>
                </div>
               
                 <div class="form-group">
                    <label class="control-label col-sm-3" >{{trans('text.image')}} </label>
                    <div class="col-sm-7">
                        <input type="file" name="image"  value="image" class="file">
                    </div>
                </div>
                
                <<div class="modal-footer bg-success">
              <button type="submit" class="btn btn-danger"  >Modifier</button>
              <a href="{{route('dashboard::client.index')}}"> <button type="button" class="btn btn-info" >retour</button></a>
              
            </div>
          </form>
        </div>
      </div>
    </div>


@stop