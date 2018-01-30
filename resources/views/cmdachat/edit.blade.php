@extends('layouts.admin')

@section('content')

<div class="">
    <div class="grid simple ">
        <div class="grid-title no-border">
            <h4>{{ trans('text.edit-cmdachat')}}</h4>
            <div class="tools"> 
            <a href="{{ route('dashboard::cmdachat.index') }}" class="remove"></a>
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

<div class="col-sm-12">
    <div class="grid simple">
        <div class="grid-title no-border"> 
        <form class="form-horizontal" action="{{route('dashboard::cmdachat.update',$cmdachat->id) }}"
            method="POST" enctype="multipart/form-data" style="width: 95%;">
            {{csrf_field() }}
            <div class="{{ $errors->has('provider_id') ? 'form-group has-error' :'form-group'}}">
                <label class="control-label col-sm-3" >{{trans('text.provider')}}</label>
                <div class="col-sm-8">
                     <input type="text" disabled class="form-control" value="{{$provider->name}}" name="provider_id">
                </div>
            </div>
            <div class="{{ $errors->has('date') ? 'form-group has-error' :'form-group'}}">
                <label class="control-label col-sm-3" >{{trans('text.date_cmd')}}</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="date" >
                    
                </div>   
            </div>
            
              
             
                    <input type="hidden" class="form-control" value="0" name="total">
                    
                  
            </div>
             <div style="margin-left: 58%;">
                    <button type="submit" class="btn btn-danger btn-cons"  >Modifier</button>
                    <a href="{{ route('dashboard::cmdachat.index') }}" >
                    <button type="button" class="btn btn-success btn-cons"  >retour</button></a>
                </div>
        </form>
        
    </div>

</div>
              
       


@stop