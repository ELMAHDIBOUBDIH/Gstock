@extends('layouts.admin')
@section('content')
<div class="page-title">
    <h3>{{ trans('text.paiement')}}</h3>
    <a href="{{ route('dashboard::Payment.create',$Invoice->    reference_cmd)}}">
        <button type="button" class="btn btn-info btn-lg">{{ trans('text.add-payment')}}</button>
    </a>
</div>
<div class="row">
    <div class="col-md-14">
        <div class="grid simple ">
            <div class="grid-title no-border">
                
                <div class="tools"> <a href="javascript:;" class="collapse"></a>
                <a href="#grid-config" data-toggle="modal" class="config"></a>
                <a href="javascript:;" class="reload"></a>
                <a href="{{route('dashboard::Invoice.index')}}" class="remove"></a>
            </div>
        </div>
        <div class="grid-body no-border">
            <table class="table no-more-tables">
                <thead>
                    <tr>
                        
                        <th>{{ trans('text.invoice_id')}}</th>
                        <th>{{ trans('text.date')}}</th>
                        <th>{{ trans('text.montant')}}</th>
                        <th>{{ trans('text.rest_a_paye')}}</th>
                        <th>{{ trans('text.mode_payement')}}</th>
                        <th>{{ trans('text.paye')}}</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment) 
                    <tr>
                        <td> {{$payment->invoice_id}}</td>
                        <td>{{$payment->date}}</td>
                        <td>{{$payment->montant}}</td>
                        <td>{{$payment->rest_pay}}</td>
                        <td>{{$payment->type}}</td>
                        <td>{{$payment->payer}} </td>
                       
                        <!--  button -->
                        <td>

                  
                            
                            
                            <!-- button -->
                <a  class="btn btn-danger" data-toggle="modal" data-target="#modal{{$payment->id}}">
                                <span class="glyphicon glyphicon-trash  "  style=""></span>
               </a>
                            
<a href="{{route('dashboard::Payment.show',[$payment->id,$Invoice->id])}}" class="btn btn-success " style="">
                                <span class="glyphicon glyphicon-fullscreen "  style=""></span>
                            </a>
    <a href="{{route('dashboard::Payment.PDF',[$payment->id,$Invoice->id])}}"   >
                      <img src="/Nprojet/public/img/pdf_image.jpg" height="35" width="61" alt="PDF">
                    </a>
<!--model conferm supp-->
    <div class="modal" id="modal{{$payment->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 26%;">
        <!-- Modal content-->
        <div class="modal-content" style="color: white;font-size: 32px;">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="alert alert-danger" style="width: 100%" style="float: right;">
             
                <p>voulez vous vraiment supprimer  ?
                </p>
               
                
                
            </div>
            <div class="modal-footer">
            <div style="margin-right: 30%;">
        <a href="{{route('dashboard::Payment.destroy',[$payment->id,$payment->invoice_id])}}" >
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
              
            </nav>
        </div>
    </div>
</div>
</div>
@stop