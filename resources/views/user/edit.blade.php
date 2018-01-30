@extends('layouts.admin')

@section('content')


  
<div class="container">
  <div class="col-md-10">
<div class="grid simple ">
        <div class="grid-title no-border">
            <h4>{{ trans('text.edit-user')}}</h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a>
            <a href="#grid-config" data-toggle="modal" class="config"></a>
            <a href="javascript:;" class="reload"></a>
            <a href="{{ route('dashboard::user.index') }}" class="remove"></a>
        </div>
    </div>
    <div class="grid-body no-border">
        <div class="add-element box">
            @if (count($errors) > 0)
            <div class="alert alert-danger" >
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
           
          
          <form class="form-horizontal" action="{{route('dashboard::user.update',$user->id)}}" method="POST" enctype="multipart/form-data" style="width: 100%;margin: 10%;" name="form1">
            {{csrf_field() }}
         
                <div class="{{ $errors->has('name') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.name')}}</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter nom de cleint"
                        name="name" value="{{$user->name}}" >
                    </div>
                </div>
                 <div class="{{ $errors->has('username') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.username')}}</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter nom de cleint"
                        name="username" value="{{$user->username}}" >
                    </div>
                </div>
                <div class="{{ $errors->has('email') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.email')}}</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="form1Name" placeholder="Enter Disignation"
                        name="email" value="{{$user->email}}" required>
                    </div>
                    </div>
            <div class='{{ $errors->has('password') ? 'form-group has-error' :'form-group'}}' id="div1" >
                <label class='control-label col-sm-3' >{{trans('text.password')}}</label> 
                 <div class='col-sm-5'><input type='password' class='form-control' id='p2' placeholder='Enter password' name='password' onkeyup='valider()'> <i id='error1' class=' alert-warning'></i>
                </div>
               
          </div>
          <div class='{{ $errors->has('password') ? 'form-group has-error' :'form-group'}}' id="div1" ><label class='control-label col-sm-3' >{{trans('text.password')}}</label>
          <div class='col-sm-5'>
            <input type='password' class='form-control' id='p1' placeholder='répéter password' name='password_confirmation' onkeyup='valider()'><br><i id='error' class=' alert-warning' required></i>
            </div>
            </div>

            
                
 
                <div  style="margin-left: 34%;">
              <button type="submit" class="btn btn-danger" onclick="valider()" >Modifier</button>
              <a href="{{route('dashboard::user.index')}}"> <button type="button" class="btn btn-info" >retour</button></a>
              
            </div>
          </form>
        </div>
      </div>
    </div>
@section('foot')
<script type="text/javascript">
function valider()
{
    if(form1.password.value.length<6)
       {document.getElementById("error1").innerHTML="Too short";} else{document.getElementById("error1").innerHTML="";}
 if(form1.password.value!=form1.password_confirmation.value){

 document.getElementById("error").innerHTML="Passwords do not match";

 }else{ document.getElementById("error").innerHTML="";}
}



</script>
@stop

@stop