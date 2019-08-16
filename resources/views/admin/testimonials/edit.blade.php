@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Testimonial
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('admin.testimonials.index')}}">Testimonials</a></li>
                <li class="active">{{$current->order}}</li>
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
                        <h3 class="box-title">{{$current->title}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="add_testimonial_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                            <label>order</label>
                                            <input type="text" class="form-control" placeholder="testimonial order" name="order" value="{{$current->order}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Text</label>
                                            <textarea id="editor_testimonial" name="text" rows="3" cols="160">{{$current->text}}</textarea>
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
        CKEDITOR.replace('editor_testimonial');

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_testimonial_form').on('submit', function(testimonial){
            var text = CKEDITOR.instances.editor_testimonial.getData();
            event.preventDefault();
            $.ajax({
                url:"{{route('admin.testimonials.update', [$current->id])}}",
                method:"POST",
                data:$("#add_testimonial_form").serialize() + "&text=" + text,
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
