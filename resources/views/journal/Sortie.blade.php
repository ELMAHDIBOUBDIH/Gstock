@extends('layouts.admin')

@section('content')

<div class="page-title">	
    <h3>{{ trans('text.journal_Sortie')}}</h3>	
   
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
    <table class="table table-bordered">
        <thead>
            <tr style="background-color: #c2d6d6;color:black;">
                <th>{{ trans('text.numcommande')}}</th>
                <th>{{ trans('text.client')}}</th>
                <th>{{ trans('text.date-cmd-valide')}}</th>
                @if($Article != null)
               <th>{{trans('text.qnt')}}</th>
                @endif
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($cmdventes as $cmdvente)
            <tr>
            @if($Article == null)
            <td> {{$cmdvente->id}}</td>
                <td>{{$cmdvente->client->name}}</td>
                <td>{{$cmdvente->date}}</td>
                
            @else
            <td> {{$cmdvente->id}}</td>
                <td>{{$cmdvente->client->name}}</td>
                <td>{{$cmdvente->date}}</td>
               @foreach($cmdvente->vente_lignes as $ligne)
               @if($ligne->id_article == $Article->id)
                <td>{{$ligne->qnt_cmd}}</td>
                @endif
               @endforeach
            @endif
            </tr>
            @endforeach
            
                
           
        </tbody>
    </table>



    <nav aria-label="Page navigation" class="pagination-container">
        {{ $cmdventes->links() }}
    </nav>
</div>
</div>
</div>
</div>




@stop

