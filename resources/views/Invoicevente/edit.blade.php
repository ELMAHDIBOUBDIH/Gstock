@extends('layouts.admin')

@section('content')


<h4>{{ trans('text.edit-client')}}</h4>  

<div class="row">
  <div class="grid simple ">
  <div class="grid-title no-border">

 
      
      
<table class="table table-striped table-bordered" style="min-width:73%;width:auto;    margin-left: 13%;">
    <tr style="background-color:rgba(2, 142, 0, 0.41);">
        
        <td><b>{{ trans('text.numcommande')}}: </b></td>
        <td><b>{{ trans('text.datefacturation')}}</b></td>
        
    </tr>
    <tr style="background-color:rgba(2, 142, 0, 0.41);">
        <form method="POST" action="{{route('dashboard::Invoicevente.update',$Invoicevente->id)}}" >
        {{csrf_field() }}
            
            <td>
                <div class="input-group  col-md-8">
                    <input type="text" class="form-control" name="idfacture"   value="{{$Invoicevente->reference_cmd}}" disabled>
            </div>
        </td>
        <td>
                <div class="input-group  col-md-12">
                    <input type="date" class="form-control" name="date"  required>
            </div>
        </td>
       
        <td colspan="2"><input type="submit" value="modifier" name="ajouter" class="btn btn-primary"> 

        </td>
        <td>
        <a href="{{route('dashboard::Invoicevente.index')}}" title=""><button type="button" class="btn btn-danger" id="close" data-dismiss="modal">annuler</button></a></td>
    </tr>
</form>
</tbody>
</table>
        
       
        
      </div>
    </div>
  </div>
</div>
@stop