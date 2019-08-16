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
            <li class="active">Slides</li>
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
                        <h3 class="box-title">Add new slide</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="add_slide_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Order</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slide Order to show (1 as first) " name="order">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image</label><br>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                                    Choose Image
                                                </button>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="image_chosen"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Add Image Modal -->
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog" style="width:80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Choose Image</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <select class="media_slide_select form-control col-md-12" name="image">
                                                            <option value=""></option>
                                                            @foreach ($media as $one)
                                                                <option data-img-label="<a target='_blank' href='{{asset('')}}{{$one->link}}'>{{$one->original_name}}</a>'" data-img-src="{{asset('')}}{{$one->link}}" data-img-class="custom-image" value="{{$one->id}}">{{$one->original_name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

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
                        <h3 class="box-title">All Slides</h3>
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
                                    @foreach ($slides as $slide)
                                        <tr id="row{{$slide->id}}">
                                            <td>{{$slide->order}}</td>
                                            <td>
                                                <a  href="{{route('admin.slides.text.index', [$slide->id])}}" class="btn btn-info" data-content="{{$slide->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    <span>text</span>
                                                </a>

                                            </td>
                                            <td>
                                                <a  href="{{route('admin.slides.edit', [$slide->id])}}" class="btn btn-primary" data-content="{{$slide->id}}">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete" data-content="{{$slide->id}}">
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

    $(".media_slide_select").imagepicker(
        {
            show_label: true
        }
    )

    $(document).ready(function(){
        var t = $('#example').DataTable({
            "order": [[ 0, "desc" ]]
        });

        $( ".media_slide_select" ).change(function() {
            $('#modal-default').modal('hide');
            $(".image_chosen").html($(" .media_slide_select option:selected").text());
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_slide_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('admin.slides.save') }}",
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
                            data.slide_order,
                            '<a  href="' + data.slide_link_text +'" class="btn btn-info" data-content="data.slide_id"><i class="fa fa-eye"></i><span> text</span></a>',
                            '<a  href="' + data.slide_link_edit +'" class="btn btn-primary" data-content="data.slide_id"><i class="glyphicon glyphicon-edit"></i><span> Edit</span></a>',
                            '<button type="button" class="btn btn-danger delete" data-content="' + data.slide_id + '"><i class="glyphicon glyphicon-trash"></i><span> Delete</span></button>'
                        ] ).draw().node();

                        $( rowNode )
                            .css( 'color', 'red' )
                            .attr('id', 'row' + data.slide_id );
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
                    url: '{{route("admin.slides.delete")}}',
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
