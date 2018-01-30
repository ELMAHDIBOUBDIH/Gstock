@extends('layouts.admin')
@section('content')
<div class="page-title">	
    <h3>{{ trans('text.edit-annonces')}}</h3>		
</div>
<div class="row">
    <div class="col-md-12">
        <div class="grid simple ">
            <div class="grid-title no-border">
                <h4>{{ trans('text.edit-annonces')}}</h4>
                <div class="tools">	<a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="grid-body no-border">
                <table class="table no-more-tables">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 25%;">{{ trans('text.title')}}</th>
                            <th style="width: 13%;">{{ trans('text.place')}}</th>
                            <th style="width: 20%;">{{ trans('text.category')}}</th>
                            <th style="width: 10%;">{{ trans('text.date')}}</th>
                            <th class="text-center" style="width: 12%;">{{ trans('text.active')}}</th>
                            <th class="text-left" style="width: 15%; padding-left: 80px;">{{ trans('text.options')}}</th>
                        </tr>
                    </thead>
                   
                </table>
               
            </div>
        </div>
    </div>
</div>

<div class="modal  delet-modal fade"  id="delet_annonce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  role="form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('text.are-you-sure')}}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('text.no')}}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('text.yes')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('foot')
<script>
    $(document).ready(function () {
        btnActivate();
        btnDesactivate();
        btnDelete();
        btnDesrecomande();
        btnRecomande();
    });
    function btnDelete() {
        $(".btn_delet_annonce").click(function (event) {
            event.preventDefault();
            var id = $(this).data("id");

            $("#delet_annonce form").attr("action", "{{ url('an-admin/annonce/') }}/" + id);

            $('#delet_annonce').modal('show');
        });
    }
    ;
    function btnActivate() {
        $(".btn_activate").click(function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({//create an ajax request to load_page.php
                type: "GET",
                url: "{{ url('an-admin/annonce/activate/') }}/" + id,
                data: {id: id},
                dataType: "json", //expect html to be returned
                success: function (response) {
                    $("#activation-" + id).html(response.html);
                    $("#model-" + id).remove();
                    btnDesactivate();
                }
            });
        });
    }
    ;
    function btnDesactivate() {
        $(".btn_desactivate").click(function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({//create an ajax request to load_page.php
                type: "GET",
                url: "{{ url('an-admin/annonce/desactivate/') }}/" + id,
                data: {id: id},
                dataType: "json", //expect html to be returned
                success: function (response) {
                    $("#activation-" + id).html(response.html);
                    $("#model-" + id).remove();
                    btnActivate();
                }
            });
        });
    }
    function btnRecomande() {
        $(".btn_recomande").click(function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({//create an ajax request to load_page.php
                type: "GET",
                url: "{{ url('an-admin/annonce/recomande/') }}/" + id,
                data: {id: id},
                dataType: "json", //expect html to be returned
                success: function (response) {
                    $("#recomandation-" + id).html(response.html);
                    btnDesrecomande();
                }
            });
        });
    }
    ;
    function btnDesrecomande() {
        $(".btn_desrecomande").click(function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({//create an ajax request to load_page.php
                type: "GET",
                url: "{{ url('an-admin/annonce/desrecomande/') }}/" + id,
                data: {id: id},
                dataType: "json", //expect html to be returned
                success: function (response) {
                    $("#recomandation-" + id).html(response.html);
                    btnRecomande();
                }
            });
        });
    }
</script>
@stop
@stop
