@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            option
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('admin.forms.index')}}">forms</a></li>
                <li><a href="{{route('admin.forms.elements.edit',[$form_id, $element_id])}}">elements</a></li>
                <li class="active">{{$current->value}}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
            | Your Page Content Here |
            -------------------------->
            <div class="col-md-12">
                <div class="box box-warning box-solid">
                    <div class="overlay hidden">
                            <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$current->value}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="update_option_option" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>value</label>
                                        <input type="text" class="form-control" placeholder="option value" name="value" value="{{$current->value}}">
                                    </div>

                                    <div class="form-group">
                                            <label>active</label>
                                            <label class="switch">
                                                <input type="checkbox" name="active"  value="1" @if($current->active) checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                    </div>

                                    <div class="form-group">
                                            <label>default</label>
                                            <label class="switch">
                                                <input type="checkbox" name="default"  value="1" @if($current->default) checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>

                @includeWhen(in_array($current->type, ['checkbox', 'select', 'radio']) , 'admin.forms.options.options')

            </div>
        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('js')
<script>


    $(document).ready(function(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#update_option_option').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{route('admin.forms.elements.options.update', [$form_id, $element_id, $current->id])}}",
                method:"POST",
                data:$("#update_option_option").serialize(),
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('hidden');
                },
                success:function(data)
                {
                    if(data.errors == '')
                    {
                        alert(data.message);
                    }
                    else{
                        var errors_message = '';
                        $.each(data.errors, function( index, value ) {
                            errors_message += value + '  ......  ';
                        });
                            alert( errors_message );
                    }
                    $(".overlay").toggleClass('hidden');
                }
            })
        });
    });

</script>

@endsection
