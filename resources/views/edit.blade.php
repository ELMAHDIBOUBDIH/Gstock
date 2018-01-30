@extends('layouts.admin')
@section('head')
<link rel="stylesheet" href="{{URL::asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
@stop
@section('content')
<div class="page-title">	
    <h3>{{ trans('text.edit-annonces')}}</h3>		
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="grid simple ">
            <div class="grid-title no-border">
                <h4>{{ trans('text.edit')}}</h4>
                <div class="tools">	<a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
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
                    
                </div>

            </div>
        </div>
    </div>
</div>

@stop
@section('foot')
<script type="text/javascript" src="{{URL::asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
<script>
$(document).ready(function () {
    $('.fileinput').fileinput();
});
</script>

@stop
