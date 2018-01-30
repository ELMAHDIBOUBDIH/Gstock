@extends('layouts.admin')
@section('content')
<div class="page-title">
	<h3>{{trans('admin.'.'$title')}}</h3>
</div>
<div class="row">
	<div class="col-md-7" style="margin-left: 10%">
	  @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    <div></div>
                    @endforeach
                </ul>
            </div>
            @endif
		<div class="grid simple ">
<div class="grid-title no-border" style="margin-left: 59px;">
 
					<table class="table" style="background-color: rgba(0, 115, 25, 0.31);;">
						
						<tbody>
						<form  id="form"  style="width:400px;margin-left:40px;">
						<tr>
							
							<td><b>Article&nbsp;:</b></td>
							<td>
								
								<select name="id_art" required="" class="form-control">
								<optgroup>
									<option value="0">Tout</option>
								</optgroup>
									@foreach($categorys as $category)
									<optgroup   label="{{$category->name}}">
										@foreach($category->articles as $a)
										
										
										
										<option value="{{$a->id}}">{{$a->name}}</option>
										
										@endforeach
									</optgroup>
									@endforeach
								</select></td>
							</tr>
							<tr>
								<td><b>Date debut&nbsp;:</b></td>
								<td><input class="form-control" type="date" required="" value="{{Request::old('date_debut')}}" name="date_debut" placeholder="yyyy-mm-jj"  ></td>
							</tr>
							
							<tr>

								<td><b>Date fin&nbsp;:</b></td>
								<td><input class="form-control" type="date" required value="{{Request::old('date_fin')}}" name="date_fin" placeholder="yyyy-mm-jj"  ></td>
								
							</tr>
							<tr>
<td></td>
								<td><input type="radio" name="etat" checked onchange="radiochange(this)">&nbsp;<b>Entree</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="etat" onchange="radiochange(this)">&nbsp;<b>Sortie</b></td>
							</tr>
							<tr>
					<td id="changetext"></td>
					<td ><select id="inputchange" name='id' required='' class='form-control'><optgroup><option value='0'>Tout</option></optgroup> @foreach($providers as $provider)<option value='{{$provider->id}}'>{{$provider->name}} </option> @endforeach </select></td>
							</tr>
							</form>
							<tr>
								<td colspan="2"><center><input class="btn btn-primary" type="button" name="valider" value="rechercher" onclick="action()"></center></td>
								
								
								
							</tr>
							
						</tbody>
						</table>
					
				</div>
			</div>
			
		</div>
@section('foot')
		<script>
		function action(){
			 etat=document.getElementsByName("etat");
			form=document.getElementById("form");
	id_art=document.getElementById("id_art");
	date_debut=document.getElementById("date_debut");
	date_fin=document.getElementById("date_fin");

			if(etat[0].checked==true)
			{
				
    form.action="{{route('dashboard::journal.Entree',"+date_debut+","+date_fin+","+id_art+")}}";
                 form.submit();
			}
			else
			{
    form.action="{{route('dashboard::journal.Sortie',"+date_debut+","+date_fin+","+id_art+")}}";
                 form.submit();    
			}
		}
function radiochange(attr)
{
	etat=document.getElementsByName("etat");
	txt=document.getElementById("changetext");
	inp=document.getElementById("inputchange");
	alert(attr.checked);
	if(etat[0].checked==true)
	{
txt.innerHTML="<b>Fourniseur</b>";
inp.innerHTML="<select  required='' class='form-control'><optgroup><option value='All'>Tout</option></optgroup> @foreach($providers as $provider)<option value='{{$provider->id}}'>{{$provider->name}} </option> @endforeach </select>";
	}else 
	{
	txt.innerHTML="<b>Clinet</b>";	
	inp.innerHTML="<select  required='' class='form-control'><optgroup><option value='All'>Tout</option></optgroup> @foreach($clients as $client)<option value='{{$client->id}}'>{{$client->name}} </option> @endforeach </select>";
	}

}

		</script>
		@stop
@stop