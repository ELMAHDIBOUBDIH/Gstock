@extends('layouts.admin')

@section('content')

<div class="page-title">	
    <h3>{{ trans('text.journal_Entree')}}</h3>	
   
</div>
<div class="row">

    <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">             
 <br><br><br>           
<div class="grid-body no-border">
@if($Article == null)
<p>Tout les Entrees des produits  Entre date <strong><?php echo $_GET['date_debut'];?></strong> et <strong><?php echo $_GET['date_fin'];?></strong></p>
@else
<p>Tout les Entrees de produit <strong>{{$Article->name}}</strong>  Entre date <strong><?php echo $_GET['date_debut'];?></strong> et <strong><?php echo $_GET['date_fin'];?></strong></p>
@endif


    <table class="table table-bordered"  >
        <thead >
            <tr style="background-color: #c2d6d6;color:black;" >
                <th>{{ trans('text.numcommande')}}</th>
                <th>{{ trans('text.provider')}}</th>
                <th>{{ trans('text.date-cmd-valide')}}</th>
                @if($Article != null)
               <th>{{trans('text.qnt')}}</th>
                @endif
               
            </tr>
        </thead>
        <tbody>
            @foreach($cmdachats as $cmdachat)
            <tr>
             @if($Article == null)
                 <td> {{$cmdachat->id}}</td>
                <td>{{$cmdachat->provider->name}}</td>
                <td>{{$cmdachat->date}}</td>
                
            
            @else
            @foreach($cmdachat->achat_lignes as $ligne)
               @if($ligne->id_article == $Article->id ) 
                <td> {{$cmdachat->id}}</td>
                <td>{{$cmdachat->provider->name}}</td>
                <td>{{$cmdachat->date}}</td>
                <td>{{$ligne->qnt_cmd}}</td>

                               
                @endif

           @endforeach
            @endif 
            <td>  @if(Auth::user()->acces=="admin")   
           <a href=""   class="btn btn-danger" style="margin-left: 0%;" data-toggle="modal" data-target="#modal{{$cmdachat->id}}">
                                <span class="glyphicon glyphicon-trash  "  style=""></span>
                            </a>@endif
                            <a href="{{ route('dashboard::cmdachat.show',$cmdachat->id )}}" class="btn btn-success "  data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}">
                                    <span class="glyphicon glyphicon-fullscreen "  style=""></span>
                                </a>
                   <a href="{{route('dashboard::Invoice.PDF',$cmdachat->Invoice->id)}}"   >
                      <img src="/Nprojet/public/img/pdf.jpg" height="35" width="12%" alt="PDF">
                    </a>
                                <!--model conferm supp-->
    <div class="modal" id="modal{{$cmdachat->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: #6fdc6f;color: white;font-size: 32px;">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #6fdc6f;">
             
                <p>voulez vous vraiment supprimer la commande<strong>remarque : </strong>tout les lignes  concernant cet commande seront supprimées</p>  
            </div>
            <div class="modal-footer">
            <div style="margin-right: 30%;">
        <a href="{{route('dashboard::cmdachat.destroy',$cmdachat->id)}}" title="">
                <button type="button" class="btn btn-primary" id="supp" >DELETE</button> </a>
 
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">Close</button>
          </div>
            </div>
        </div>
        
    </div>
</div>

</td>
<!--end model-->  
              
            </tr>
            @endforeach
           
        </tbody>
    </table>



    <nav aria-label="Page navigation" class="pagination-container">
        {{ $cmdachats->links() }}
    </nav>
</div>
</div>
</div>
</div>




@stop

