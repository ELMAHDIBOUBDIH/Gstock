@extends('layouts.admin')

@section('content')


<div class="page-title">	
    <h3>{{ trans('text.articles-list')}}</h3><br>	
    
</div>

  </div>

  <div class="well">
<a onclick="visible(this)" ><img src="/Nprojet/public/img/search.png" alt="search"   id="Rch"  width="5%"></a>


   <table     style="float:right;margin-right: 22%;visibility: hidden;"  id="tbl">
   <tbody><tr>

   <td><h4> {{trans('text.disignation')}}&nbsp;:</h4></td>
   <td><input type="text" class="form-control" id="design"></td>
   <td width="20%"></td>
   <td><h4>&nbsp;{{ trans('text.categorie')}}&nbsp;:&nbsp;</h4></td>
   <td>
   <select class="form-control" id="cat">
   <option value="0">tout</option>
   @foreach($categorys as $category)
   <option value="{{$category->id}}">{{$category->name}}</option>}
   option
   @endforeach
            
  </select> 
   </td> 
   </tr>
   </tbody>
   </table>
  </div>

<div class="row">
    <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">

                <div class="tools">	<a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            
            <div class="grid-body no-border">
            <br><br><br>
            @if(session()->has('message'))
<div class="alert alert-danger" >
{{session()->get('message')}}
</div>
@endif
                <table class="table table-bordered no-more-tables">
                    <thead>

                        <tr>
                            <th>{{ trans('text.reference')}}</th>
                            <th>{{ trans('text.disignation')}}</th>
                            <th>{{ trans('text.marque')}}</th>
                            <th>{{ trans('text.categorie')}}</th>
                            <th>{{ trans('text.image')}}</th>

                            <th>{{ trans('text.prix_A')}}</th>
                            <th>{{ trans('text.prix_V')}}</th>
                            <th>{{ trans('text.qnt_stock')}}</th>
                            <th >{{ trans('text.qnt_min')}}</th>
                           @if(Auth::user()->acces=="admin") <th ">{{ trans('text.options')}}</th>@endif
                        </tr>
                    </thead>
                    <tbody id="dataTable">

                        @foreach($articles as $article)
                        <tr>
                            <td > {{substr($article->barre_code,0,6)}}</td>
                            <td>{{substr($article->name,0,6) }}</td>
                            <td>{{substr($article->Brand,0,6) }}</td>
                            <td>{{$article->category->name }}</td>
                            <td><img src="/Nprojet/public/uploads/images/lg/{{$article->image }}" alt="img produit"  style="width: 71px;height: 41px;
                                     margin-bottom: -13px;"></td>

                            <td>{{substr($article->prix_achat,0,6) }}</td>
                            <td>{{substr($article->prix_vente ,0,6)}}</td>
                            <td>{{substr($article->available_qnt ,0,6)}}</td>
                            <td>{{substr($article->min_qnt,0,6) }}</td>

                            <!--  button -->
                            <td>@if(Auth::user()->acces=="admin")
                                <a href="{{route('dashboard::article.edit',$article->id)}}"  class="btn btn-warning" 
                                data-toggle="tooltip" data-placement="top" title="{{trans('text.edit')}}">
                                    <span class="glyphicon glyphicon-edit " style=""></span>
                                </a>

                                <!-- button -->
                                <a   class="btn btn-danger" 
                                  data-placement="top" title="{{trans('text.delete')}}" data-toggle="modal" data-target="#Modalsupp{{$article->id}}" >
                                    <span class="glyphicon glyphicon-trash  "  style=""></span>
                                </a>@endif

                                <a href="{{ route('dashboard::article.show',$article->id )}}" class="btn btn-success "  data-toggle="tooltip" data-placement="top" title="{{trans('text.afichier')}}">
                                    <span class="glyphicon glyphicon-fullscreen "  style=""></span>
                                </a>
<!--model conferm supp-->
<div class="modal fade" id="Modalsupp{{$article->id}}" role="dialog">
    <div class="modal-dialog"  style="margin-top: 24%;    width: 36%;">
        <!-- Modal content-->
        <div class="modal-content" style="color: white;font-size: 28px;">
         
            <div class="modal-body" style="background-color: rgba(39, 43, 39, 0.98);">
                <p>voulez vous vraiment supprimer <center>{{$article->name}}</center></p>
            </div>
           
            <div >
                <a href="{{route('dashboard::article.destroy',$article->id)}}">
                <button type="button" class="btn btn-primary" style="    margin-left: 22%;">OUI</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:30%;">NON</button>
          
            </div>
        </div>
        
    </div>
</div>

<!--end model-->                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation" class="pagination-container">
                    {{ $articles->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@section('foot')
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/javascript">

 $("#design").on("keyup", function(){
     $design=document.getElementById('design').value;
$cat=document.getElementById('cat').value;
        $.ajax({
         type : 'get',
         url  : "{{route('dashboard::article.search')}}",
         data : {'design' : $design,'cat':$cat},
         success:function(data){
          if(data.no!=="")
          {$('#dataTable').html(data);}
          

        }});
    });; 
  $("#cat").on("change", function(){
$design=document.getElementById('design').value;
$cat=document.getElementById('cat').value; 

        $.ajax({
         type : 'get',
         url  : "{{route('dashboard::article.search')}}",
         data : {'design' : $design,'cat':$cat},
         success:function(data){
          if(data.no!=="")
          {$('#dataTable').html(data);}
          

        }});
    });; 
</script>
<script type="text/javascript">
function visible(attr)
{
 var   x=document.getElementById('tbl');
y=document.getElementById('Rch');
 
    if(x.style.visibility=="hidden")
    {
       x.style.visibility="visible";
      y.style.width="6%";
    }else
    {
 x.style.visibility="hidden";
 y.style.width="5%";
    }
}

</script>
@stop
@stop

