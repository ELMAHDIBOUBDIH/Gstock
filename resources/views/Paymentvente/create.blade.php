@extends('layouts.admin')

@section('content')


  
<div class="container">
  <div class="col-md-10">
<div class="grid simple ">
        <div class="grid-title no-border">
         
            
            
        
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
            <h4> <span class="semi-bold" >{{ trans('text.payement_vente')}}</span></h4>
          
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" style="width: 100%;">
            {{csrf_field() }}
            <div class="form-group">
                    <label class="control-label col-sm-3" >{{trans('text.id_cmd')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" 
                         value="{{$commande_vente->id}}" name="cmd_id" readonly="">
                    </div>
                    <div class="form-group">
                    <div class="col-sm-7">
                        <input type="hidden" class="form-control" id="form1Name" 
                         value="{{$commande_vente->invoicevente->id}}" name="Invoice_id" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" >{{trans('text.date')}}</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" id="form1Name" placeholder="Enter nom de cleint"
                        name="date"  required>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-3" >{{trans('text.montant')}}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="form1Name" value="{{$commande_vente->total}}"
                        name="total"  readonly="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" >{{trans('text.rest_a_paye')}}</label>
                    <div class="col-sm-7">
        <input type="text" class="form-control" id="form1Name" name="rest" value="{{$commande_vente->invoicevente->credit}}" readonly="">
                    </div>
                </div >

                  <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('text.mode_payement')}}</label>
                    <div class="col-sm-7">
                            <select  class="form-control" id="sel2" name="type">
                             <option value="ESPECE">ESPECE</option>
                             <option value="CHEQUE">CHEQUE</option>
                         </select>
                    </div>
                </div>
                <div class="{{ $errors->has('payer') ? 'form-group has-error' :'form-group'}}">
                    <label class="control-label col-sm-3" >{{trans('text.paye')}}</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="form1Name" placeholder="0.00"
                        name="payer" min="0" max="{{$commande_vente->Invoicevente->credit}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('text.description')}}</label>
                    <div class="col-sm-7">
                        <textarea class="form-control " rows="4" maxlength="400" id="comment" name="description" placeholder="Enter la descreption" ></textarea>
                    </div>
                </div>
               
                
                <<div class="modal-footer bg-success">
              <button type="submit" class="btn btn-danger"  >valider</button>
              <a href=""> <button type="button" class="btn btn-info" >retour</button></a>
              
            </div>
          </form>
        </div>
      </div>
    </div>


@stop