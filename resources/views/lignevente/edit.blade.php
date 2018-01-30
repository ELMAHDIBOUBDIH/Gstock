@extends('layouts.admin')

@section('content')


<h4>{{ trans('text.edit-ligne-vente')}}</h4>  

<div class="row">
  <div class="col-md-12">
    <div class="grid simple ">
      <div class="grid-title no-border">
        <div class="tools"> <a href="javascript:;" class="collapse"></a>
        <a href="#grid-config" data-toggle="modal" class="config"></a>
        <a href="javascript:;" class="reload"></a>
        <a href="{{ route('dashboard::client.index') }}" class="remove"></a>
      </div>
      <h4> <span class="semi-bold" >{{ trans('text.edit-lignevente')}}</span></h4>
      
      <table class="table table-striped table-bordered" style="min-width:52%;width:auto;margin-left: 24%;">
        
        <tr>
          <form method="POST" action="{{route('dashboard::Lignevente.update',$lignevente->id)}}" >
            {{csrf_field() }}
            <td><b>{{ trans('text.nom-produit')}}:</b></td>
            <td>
            <div class="input-group  col-md-12">
              <input type="text" class="form-control" name="id_article" id="TV" style="width: 66%;" value="{{$lignevente->id_article}}" readonly="">
            </div>
           </td>
          </tr>
          <tr>
            <td><b>{{ trans('text.TVA')}}:</b></td>
            <td>
              <div class="input-group  col-md-8">
                <input type="text" class="form-control" name="TVA"  placeholder="Enter TVA" value="{{$lignevente->TVA}}"><span class="input-group-addon " style="color: red;" >
                <i >%</i>
              </span>
            </div>
          </td>
        </tr>
        <tr>
          <td><b>{{ trans('text.prix_U')}}:</b></td>
          <td>
            <div class="input-group  col-md-12">
              <input type="text" class="form-control" name="prix_unitaire" id="TV" style="width: 66%;" value="{{$lignevente->prix_unitaire}}" required>
            </div>
          </td>
        </tr>
        <tr>
          <td><b>{{ trans('text.qnt-cmd')}}:</b></td>
          <td>
            <input type="number" min="1" name=" qnt_cmd" class="form-control" required="" pattern="\S+" value="{{$lignevente->qnt_cmd}}" style="width: 66%;" required>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <button type="submit" class="btn btn-danger"  >Modifier</button>
            <a href="{{ route('dashboard::Lignevente.index',$lignevente->vente_lignes_commande_id)}}"> <button type="button" class="btn btn-info" >retour</button></a>
          </td>
        </tr>
      </form>
    </tbody>
  </table>
  
  
  
</div>
</div>
</div>

@section('foot')
<script>
function changeText(arr) {
    x = document.getElementById("fname").value
    document.getElementById("TV").value = arr[x-1].prix_vente;
}
</script>
@stop
@stop