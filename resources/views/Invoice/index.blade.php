@extends('layouts.admin')

@section('content')

<div class="page-title">	
    <h3>{{ trans('text.facture-achat')}}</h3>	
   
</div>
<div class="row">

    <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">             
 <br><br><br>           
<div class="grid-body no-border">
    <table class="table table-bordered">
        <thead>
            <tr style="background-color: #c2d6d6;color:black;">
                <th>{{ trans('text.numcommande')}}</th>
                <th>{{ trans('text.provider')}}</th>
                <th>{{ trans('text.date-cmd-valide')}}</th>
                <th>{{trans('text.montant-total')}}</th>
                <th>{{ trans('text.credit')}}</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($Invoices as $Invoice)
            <tr>
                <td> {{$Invoice->commande_achat->id}}</td>
                <td>{{$Invoice->commande_achat->provider->name}}</td>
                <td>{{$Invoice->date}}</td>
                <td>{{$Invoice->commande_achat->total}}</td>
                <td>{{$Invoice->credit}}</td>
                
                <!--  button -->
                <td>
                @if(Auth::user()->acces=="admin")
        <a href="{{route('dashboard::Invoice.edit',$Invoice->id)}}"      class="btn btn-warning" style="margin-left:0%" data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}">
                <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <!-- button -->
                    <a href="{{route('dashboard::Payment.index',$Invoice->id)}}"   class="btn" style="font-size: 29px;" 
                    data-toggle="tooltip" data-placement="top" title="{{trans('text.payment')}}">$</a>
                    <a href=""   class="btn btn-danger" data-toggle="modal" data-target="#modal{{$Invoice->id}}">
                        <span class="glyphicon glyphicon-trash  "  style=""></span>
                    </a>@endif
                    <a href="{{route('dashboard::Invoice.show',$Invoice->id)}}"   class="btn btn-success " style="">
                        <span class="glyphicon glyphicon-fullscreen "  data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}"></span>
                    </a>
                    <a href="{{route('dashboard::Invoice.PDF',$Invoice->id)}}"   >
                      <img src="/Nprojet/public/img/pdf.jpg" height="35" width="12%" alt="PDF">
                    </a>
<!--model conferm supp-->
    <div class="modal" id="modal{{$Invoice->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="color: white;font-size: 32px;">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="alert alert-danger" style="width: 100%" style="float: right;">
             
                <p>voulez vous vraiment supprimer la Facture N°: <strong>{{$Invoice->reference_cmd }}<br></strong>
                <strong>remarque : </strong>tout les paiements  concernant cet Facture seront supprimées !</p> 
                </p>
               
                
                
            </div>
            <div class="modal-footer">
            <div style="margin-right: 30%;">
        <a href="{{route('dashboard::Invoice.destroy',$Invoice->id)}}" >
                <button type="button" class="btn btn-primary" id="supp" >DELETE</button> </a>
 
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">Close</button>
          </div>
            </div>
        </div>
        
    </div>
</div>

</td>
<!--end model-->                    
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
    <!--message creation and edit message--> 
<?php
if(isset($_GET['message']))
{
?>
@section('foot')
<script type="text/javascript">
$(document).ready(function(){
    // Show the Modal on load
    $("#Modalmessage").modal("show");
    
    // Hide the Modal timer
setTimeout(function(){$('#Modalmessage').modal('hide'); },4000);

    
});    
</script>
@stop

<!--model message reteur ou reponce conferm supp-->
<div class="modal fade" id="Modalmessage" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: #6fdc6f;color: white;font-size: 32px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #6fdc6f;">
                <div class="alert alert-danger" style="width: 100%" style="float: right;">
                    <strong>Message !  :  </strong><?php echo($_GET['message']) ?>
                   
                
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--end message creation and edit message-->
    <nav aria-label="Page navigation" class="pagination-container">
        {{ $Invoices->links() }}
    </nav>
</div>
</div>
</div>
</div>


@section('foot')
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>



@stop

@stop

