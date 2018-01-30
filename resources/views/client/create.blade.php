@extends('layouts.admin')

@section('content')


    <div class="grid simple ">
        <div class="grid-title no-border">
            
            <div class="tools"> 
            <a href="javascript:;" class="reload"></a>
            <a href="{{ route('dashboard::client.index') }}" class="remove"></a>
        </div>
    </div>
    <div class="grid-body no-border">
    <div class="page-title">    
    <h3>{{ trans('text.add-client')}}</h3>      
</div>
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
            <form class="form-horizontal" action="{{route('dashboard::client.store')}}"
                method="POST" enctype="multipart/form-data" style="width: 95%;">
                {{csrf_field() }}
                <div class="{{ $errors->has('name_society') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.name_society')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter nom de la société "
                        name="name_society" value="{{Request::old('name_society')}}" maxlength="30" >
                    </div>
                </div>
                <div class="{{ $errors->has('name') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.name')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter nom de cleint"
                        name="name" value="{{Request::old('name')}}" maxlength="30" required>
                    </div>
                </div>
                <div class="{{ $errors->has('tel') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.tel')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter Disignation"
                        name="tel" value="{{Request::old('tel')}}" maxlength="20">
                    </div>
                </div>
                <div class="{{ $errors->has('fax') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.fax')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter Disignation"
                        name="fax" value="{{Request::old('fax')}}" maxlength="20">
                    </div>
                </div>
                <div class="{{ $errors->has('mail') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.mail')}}</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="form1Name" placeholder="Enter la marque"
                        name="mail" value="{{Request::old('mail')}}" required >
                    </div>
                </div>
                <div class="{{ $errors->has('adresse') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3">{{trans('text.adresse')}}</label>
                    <div class="col-sm-7">
                        <textarea class="form-control " rows="4" maxlength="400" id="comment" name="adresse" placeholder="Enter la descreption" >{{Request::old('adresse')}}</textarea>
                    </div>
                </div>
               
                 <div class="form-group">
                    <label class="control-label col-sm-3" >{{trans('text.image')}} </label>
                    <div class="col-sm-7">
                        <input type="file" name="image"  value="image" class="file">
                    </div>
                </div>
                
                <div class="modal-footer bg-success">
                    <button type="submit" class="btn btn-danger" style="margin-right: 63%;font-size: 28px;" >Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

