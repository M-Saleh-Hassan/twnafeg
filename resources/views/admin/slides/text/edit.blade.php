@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Slider
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('admin.slides.index')}}"> Slides</a></li>
            <li><a href="{{route('admin.slides.text.index', [$slide->id])}}"> Slide Text {{$slide->order}}</a></li>
                <li class="active">{{$current->text}}</li>
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
                        <h3 class="box-title">{{$current->order}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="add_slide_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Text</label>
                                        <input type="text" class="form-control" placeholder="slide text" name="text" value="{{$current->text}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="text" class="form-control" placeholder="slide Order to show (1 as first) " name="order" value="{{$current->order}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class=" form-control col-md-12" name="type">
                                                <option @if($current->type == 'h1'){{'selected'}} @endif value="h1">h1</option>
                                                <option @if($current->type == 'h2'){{'selected'}} @endif value="h2">h2</option>
                                                <option @if($current->type == 'h3'){{'selected'}} @endif value="h3">h3</option>
                                                <option @if($current->type == 'h4'){{'selected'}} @endif value="h4">h4</option>
                                                <option @if($current->type == 'h5'){{'selected'}} @endif value="h5">h5</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary">Edit</button>

                            </form>
                        </div>
                    </div>
                </div>

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
        $('#add_slide_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{route('admin.slides.text.update', [$current->id])}}",
                method:"POST",
                data:$("#add_slide_form").serialize(),
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
