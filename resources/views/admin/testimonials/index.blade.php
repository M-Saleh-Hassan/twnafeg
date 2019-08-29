@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Testimonials
            </h1>
            <ol class="breadcrumb">
            <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Testimonials</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
            | Your Page Content Here |
            -------------------------->
            <div class="col-md-12">
                <div class="box box-warning box-solid collapsed-box">
                    <div class="overlay hidden">
                            <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Add new testimonial</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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
                                        <input type="text" class="form-control" placeholder="testimonial order" name="order">
                                    </div>

                                    <div class="form-group">
                                        <label>Text</label>
                                        <textarea id="editor_testimonial" name="text" rows="3" cols="160"></textarea>
                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- All testimonials -->
                <div class="box box-warning box-solid">
                    <div class="overlay hidden">
                            <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">All testimonials</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>order</th>
                                        <th>text</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody class="testimonials_body">
                                    @foreach ($testimonials as $testimonial)
                                        <tr id="row{{$testimonial->id}}">
                                            <td>{{$testimonial->order}}</td>
                                            <td>{!!$testimonial->text!!}</td>
                                            <td>
                                                <a  href="{{route('admin.testimonials.edit', [$testimonial->id])}}" class="btn btn-primary" data-content="{{$testimonial->id}}">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete" data-content="{{$testimonial->id}}">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </td>
                                        </tr>
                                        @php $counter++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
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

        var t = $('#example').DataTable({
            "order": [[ 0, "desc" ]]
        });

        $( ".media_testimonial_select" ).change(function() {
            $('#modal-default').modal('hide');
            $(".image_chosen").html($(" .media_testimonial_select option:selected").text());
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_testimonial_form').on('submit', function(testimonial){
            var text = CKEDITOR.instances.editor_testimonial.getData();
            text = trimString(text);
            event.preventDefault();
            $.ajax({
                url:"{{ route('admin.testimonials.save') }}",
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

                        var rowNode = t.row.add( [
                            data.testimonial_order,
                            data.testimonial_text,
                            '<a  href="' + data.testimonial_link_edit +'" class="btn btn-primary" data-content="data.testimonial_id"><i class="glyphicon glyphicon-edit"></i><span> Edit</span></a>',
                            '<button type="button" class="btn btn-danger delete" data-content="' + data.testimonial_id + '"><i class="glyphicon glyphicon-trash"></i><span> Delete</span></button>'
                        ] ).draw().node();

                        $( rowNode )
                            .css( 'color', 'red' )
                            .attr('id', 'row' + data.testimonial_id );
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

    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#example').on('click', '.delete', function(){
            if(confirm('Are you sure you want to Delete ?'))
            {
                var content = $( this ).data( "content" );
                $.ajax({
                    url: '{{route("admin.testimonials.delete")}}',
                    method: 'POST',
                    data: {_token: CSRF_TOKEN, id: content},
                    dataType: 'JSON',
                    beforeSend: function(){
                        $(".overlay").toggleClass('hidden');
                    },
                    success: function (data) {
                        var id= data.id;
                        $( '#row' + id ).html('');
                        $(".overlay").toggleClass('hidden');
                    }
                });
            }
        });
    });

</script>
@endsection
