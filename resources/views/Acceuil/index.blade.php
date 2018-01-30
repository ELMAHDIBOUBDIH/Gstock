  @extends('layouts.admin')

@section('content')
 <div class="grid simple ">
<div class="grid-title no-border"
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
           <div class="grid-body no-border">
              <div class="row-fluid">
                <h3>Login <span class="semi-bold"></span></h3>
               
                <br>
                <div class="row form-row">
               <form action="" method="POST" >
                  
                
                  <div class="input-append col-md-10 col-sm-10 primary">
                  
                    <input id="appendedInput" class="form-control" placeholder="someone@example.com or username" type="text">
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-align-justify"></i> </span> </div>
                </div>
                <div class="row form-row">
                  <div class="input-append col-md-10 col-sm-10 primary">

                    <input id="appendedInput2" class="form-control" placeholder="your password" type="password">
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-lock"></i> </span> </div><br>
                    <button type="submit" class="btn btn-primary btn-cons-md" style="margin-left: 17%;width: 47%;font-size: 26px;">Connecter</button>
                </div>
                </form>
              </div>
             
            </div>
               
                
         </div> 
    </div>
   
    <div class="container">
    <div class="row vertical-offset-100">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
          <div class="panel-body">
            <form accept-charset="UTF-8" role="form">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                  </label>
                </div>
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
            </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
@stop