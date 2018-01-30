<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="asarach.com" name="author" />

        <!-- BEGIN PLUGIN CSS -->
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <link href="{{URL::asset('assets/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" media="screen"/>
        <!-- END PLUGIN CSS -->
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="{{URL::asset('assets/plugins/boostrapv3/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('assets/plugins/boostrapv3/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('assets/plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('assets/css/animate.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('assets/css/custom-icon-set.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('css/admin.css')}}" rel="stylesheet">
        <!-- END CSS TEMPLATE -->
        <!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
        @yield('head')
    </head>
    <body class="">
        <div class="header navbar navbar-inverse "> 
            <div class="navbar-inner">
                <div class="header-seperation"> 
                    <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                        <li class="dropdown"> 
                            <a id="main-menu-toggle" href="#main-menu"  class="" > 
                                <div class="iconset top-menu-toggle-white"></div> 
                            </a> 
                        </li>		 
                    </ul>
                    <a href="{{ url('/') }}"><img src="{{ URL::asset('img/logo.png/') }}" class="logo" alt=""  data-src="{{ URL::asset('img/logo.png/') }}" data-src-retina="{{ URL::asset('img/logo.png/') }}" width="150" height="45"/></a>
                </div>
                <div class="header-quick-nav" > 
                    <div class="pull-left"> 
                        <ul class="nav quick-section">
                            <li class="quicklinks"> 
                                <a href="#" class="" id="layout-condensed-toggle" >
                                    <div class="iconset top-menu-toggle-dark"></div>
                                </a> 
                            </li>
                        </ul>
                    </div>
                    <div class="pull-right"> 
<ul class="nav quick-section ">
    @if (!Auth::guest())
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
            <div class="top-user">{{ Auth::user()->name }} <span class="iconset top-settings-dark pull-right"></span></div>
        </a>
        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
            <li>
                <a href="{{ url('/la-admin/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>&nbsp;&nbsp;{{ trans('admin.logout')}}
                </a>
                <form id="logout-form" action="{{ url('/la-admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
    @endif
</ul>
                    </div>
                </div> 
            </div>
        </div>
        <div class="page-container row-fluid">
            <div class="page-sidebar" id="main-menu"> 
                <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper"> 
                    <ul>	
                        <li class="start {{ Request::is('dashboard') ? 'active' : '' }}"> <a href="{{ route('dashboard::index') }}"> <i class="icon-custom-home"></i> <span class="title">{{ trans('text.dashboard')}}</span> <span class="selected"></span> </a> 
                        </li>
                        <li class="start {{ Request::is('dashboard/categorys') ? 'active' : '' }}"> <a href="{{ route('dashboard::category.index') }}"> <i class="fa fa-folder"></i>  <span class="title">{{ trans('text.categories')}}</span></a></li>   
                        <li class="{{ Request::is('dashboard/articles') || Request::is('dashboard/article/create') ? 'active' : '' }}"> <a "> <i class="glyphicon glyphicon-shopping-cart"></i> <span class="title">{{ trans('text.articles')}}</span>
                        <span class="arrow"></span></a> 
            <ul class="sub-menu" style="display: none;">
              @if(Auth::user()->acces=="admin")
              <li> 
              <a href="{{ route('dashboard::article.create') }}">{{ trans('text.add-article')}} </a> </li>@endif
              <li> <a href="{{ route('dashboard::article.index') }}">{{ trans('text.articles-list')}}</a> </li>  
            </ul>
                        </li> 
                        <li class="{{ Request::is('dashboard/clients') || Request::is('dashboard/client/create') ? 'active' : '' }}"> <a > <i class="glyphicon glyphicon-user"></i> <span class="title">{{ trans('text.clients')}}</span>
                         <span class="arrow"></span></a> 
            <ul class="sub-menu" style="display: none;">
            @if(Auth::user()->acces=="admin")
            <li> <a href="{{ route('dashboard::client.create') }}">{{ trans('text.add-client')}} </a> </li>@endif
              <li> <a href="{{ route('dashboard::client.index') }}">{{ trans('text.clients-list')}}</a> </li>  
            </ul>
                        </li>
                        <li class="{{ Request::is('dashboard/providers') || Request::is('dashboard/provider/create') ? 'active' : '' }}"> <a > <i class="glyphicon glyphicon-user"></i> <span class="title">{{ trans('text.providers')}}</span>
                        <span class="arrow"></span></a>
            <ul class="sub-menu" style="display: none;">
           @if(Auth::user()->acces=="admin")
            <li> <a href="{{ route('dashboard::provider.create') }}">{{ trans('text.add-provider')}} </a> </li>@endif
              <li> <a href="{{ route('dashboard::provider.index') }}">{{ trans('text.providers-list')}}</a> </li>  
            </ul>
                        </li> 
                        <li class="{{ Request::is('dashboard/cmdachats') || Request::is('dashboard/cmdachat/create') ? 'active' : '' }}"> <a > <i class="glyphicon glyphicon-circle-arrow-left"></i> <span class="title">{{ trans('text.entree')}}</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
            @if(Auth::user()->acces=="admin")
            <li> <a href="{{ route('dashboard::cmdachat.create') }}">{{ trans('text.add-cmdachat')}} </a> </li>@endif
              <li> <a href="{{ route('dashboard::cmdachat.index') }}">{{ trans('text.Entree-list')}}</a>
           </li>  
            </ul> 
                        </li>    
                        <li class="{{ Request::is('dashboard/cmdventes') || Request::is('dashboard/cmdvente/create') ? 'active' : '' }}"> <a > <i class="glyphicon glyphicon-circle-arrow-right"></i> <span class="title">{{ trans('text.sortie')}}</span> <span class="arrow"></span></a>
           <ul class="sub-menu" style="display: none;">  @if(Auth::user()->acces=="admin")
           <li> <a href="{{ route('dashboard::cmdvente.create') }}">{{ trans('text.add-vente')}}</a></li>@endif
             <li> <a href="{{ route('dashboard::cmdvente.index') }}">{{ trans('text.sorties-list')}} </a> </li> 
            
           </ul>
          </li>
                        <li class="{{ Request::is('dashboard/Invoices') ? 'active' : '' }}"> <a href="{{ route('dashboard::Invoice.index') }}"> <i class="glyphicon glyphicon-check"></i> <span class="title">{{ trans('text.invoice')}}</span></a>
                         </li>
                        <li class="{{ Request::is('dashboard/Invoiceventes') ? 'active' : '' }}"> <a href="{{ route('dashboard::Invoicevente.index') }}"> <i class="glyphicon glyphicon-check"></i> <span class="title">{{ trans('text.invoicevente')}}</span></a> </li>
                         <li class="{{ Request::is('dashboard/journal') ? 'active' : '' }}"> <a href="{{ route('dashboard::journal.Index') }}"> <i class="  glyphicon glyphicon-list-alt"></i> <span class="title">{{ trans('text.journal')}}</span></a> </li>
                         
                        <li class="{{ Request::is('dashboard/users') ? 'active' : '' }}"> <a href="{{ route('dashboard::user.index') }}"> <i class="glyphicon glyphicon-user"></i> <span class="title">{{ trans('text.user')}}</span>
                         <span class="arrow"></span></a>
                        <ul class="sub-menu" style="display: none;">
            @if(Auth::user()->acces=="admin")
            <li> <a href="{{ route('dashboard::user.create') }}">{{ trans('text.add-user')}} </a> </li>@endif
              <li> <a href="{{ route('dashboard::user.index') }}">{{ trans('text.users-list')}}</a> </li>  
            </ul>
             </li>
                        <li> <a href="{{ route('logout') }}"> <i class="glyphicon glyphicon-off"></i> <span class="title">Déconnexion</span></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <a href="#" class="scrollup">Scroll</a>
            <div class="page-content"> 
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- BEGIN CORE JS FRAMEWORK--> 
        <script src="{{URL::asset('assets/plugins/jquery-1.8.3.min.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('assets/plugins/boostrapv3/js/bootstrap.min.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('assets/plugins/breakpoints.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('assets/plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
        <!-- END CORE JS FRAMEWORK --> 
        <!-- BEGIN PAGE LEVEL JS --> 
        <script src="{{URL::asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>  
        <script src="{{URL::asset('assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS --> 	
        @yield('foot')

        <!-- BEGIN CORE TEMPLATE JS --> 
        <script src="{{URL::asset('assets/js/core.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('assets/js/chat.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('js/admin.js')}}" type="text/javascript"></script>
        <!-- END CORE TEMPLATE JS --> 
        <style>
         
       ul li {
           cursor:pointer;
        } 
        </style>
    </body>
</html>
