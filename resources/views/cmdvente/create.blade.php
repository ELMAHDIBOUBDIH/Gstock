@extends('layouts.admin')

@section('content')
<div class="page-title">    
    <h3></h3>        
</div>
<div class="">
    <div class="grid simple ">
        <div class="grid-title no-border">
            <h4>{{ trans('text.add-vente')}}</h4>
            <div class="tools"> 
            <a href="{{ route('dashboard::cmdvente.index') }}" class="remove"></a>
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
            
           
        
        
        
        <form class="form-horizontal" action="{{route('dashboard::cmdvente.store') }}"
            method="POST" enctype="multipart/form-data" style="width: 95%;">
            {{csrf_field() }}
            <div class="{{ $errors->has('barre_code') ? 'form-group has-error' :'form-group'}}">
                <label class="control-label col-sm-3" >{{trans('text.client')}}</label>
                <div class="col-sm-8">
                    <select class="form-control" id="sel2" name="client_id" required>
                        @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="{{ $errors->has('date') ? 'form-group has-error' :'form-group'}}">
                <label class="control-label col-sm-3" >{{trans('text.date')}}</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="date">
                    
                </div>   
            </div>
            
              
             
                    <input type="hidden" class="form-control" value="0" name="total">
                    
                  
            </div>
             <div style="    margin-left: 78%;">
                    <button type="submit" class="btn btn-danger"  >Ajouter</button>
                </div>
        </form>
        
    </div>

</div>
              
       


@stop

