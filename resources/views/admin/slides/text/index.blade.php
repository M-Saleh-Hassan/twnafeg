@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Slide Text
            </h1>
            <ol class="breadcrumb">
            <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.slides.index')}}"> Slides</a></li>
            <li><a href="{{route('admin.slides.edit', [$slide->id])}}"> Slide {{$slide->order}}</a></li>
            <li class="active">Slide Text</li>
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
                        <h3 class="box-title">Add new slide Text</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="add_slide_form" enctype="multipart/form-data">
                                <input type="hidden" value="{{$slide->id}}" name="slide_id">
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Text</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slide text " name="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Order</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slide Order to show (1 as first) " name="order">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Type</label>
                                        <select class="form-control col-md-12" name="type">
                                                <option value="h1">h1</option>
                                                <option value="h2">h2</option>
                                                <option value="h3">h3</option>
                                                <option value="h4">h4</option>
                                                <option value="h5">h5</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- All slides -->
                <div class="box box-warning box-solid">
                    <div class="overlay hidden">
                            <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Current Slide Text</h3>
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
                                <tbody class="slides_body">
                                    @foreach ($slide->text as $text)
                                        <tr id="row{{$text->id}}">
                                            <td>{{$text->order}}</td>
                                            <td>{{$text->text}}</td>
                                            <td>
                                                <a  href="{{route('admin.slides.text.edit', [$slide->id,$text->id])}}" class="btn btn-primary" data-content="{{$text->id}}">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete" data-content="{{$text->id}}">
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
        var t = $('#example').DataTable({
            "order": [[ 0, "desc" ]]
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_slide_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('admin.slides.text.save') }}",
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

                        var rowNode = t.row.add( [
                            data.slide_text_order,
                            data.slide_text_text,
                            '<a  href="' + data.slide_text_link_edit +'" class="btn btn-primary" data-content="data.slide_text_id"><i class="glyphicon glyphicon-edit"></i><span> Edit</span></a>',
                            '<button type="button" class="btn btn-danger delete" data-content="' + data.slide_text_id + '"><i class="glyphicon glyphicon-trash"></i><span> Delete</span></button>'
                        ] ).draw().node();

                        $( rowNode )
                            .css( 'color', 'red' )
                            .attr('id', 'row' + data.slide_text_id );
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
                    url: '{{route("admin.slides.text.delete")}}',
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
