@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            sessions
            {{-- <small>tashtebk</small> --}}
            </h1>
            <ol class="breadcrumb">
            <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">sessions</li>
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
                        <h3 class="box-title">sessions</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="add_category_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea id="editor_session" name="short_description" rows="3" cols="160">{{$current->short_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Long Description</label>
                                        <textarea id="editor_session1" name="long_description" rows="3" cols="160">{{$current->long_description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Main Image</label><br>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                                    Choose Image
                                                </button>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="image_chosen"><a target='_blank' href='{{asset('')}}{{$current->image->link}}'>{{$current->image->original_name}}</a></p>
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
                                                    <select class="media_category_select form-control col-md-12" name="image_id">
                                                            <option value=""></option>
                                                            @foreach ($media as $one)
                                                                <option @if($current->image_id == $one->id){{'selected'}} @endif data-img-label="<a target='_blank' href='{{asset('')}}{{$one->link}}'>{{$one->original_name}}</a>'" data-img-src="{{asset('')}}{{$one->link}}" data-img-class="custom-image" value="{{$one->id}}">{{$one->original_name}}</option>
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
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row fileupload-buttonbar">
                <div class="col-lg-2">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-success fileinput-button" style="display:block ; margin-bottom:10px">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Add Images...</span>
                        <input type="file" id="fileupload" name="photos[]" data-url="{{route('admin.sessions.upload')}}" multiple="">
                    </span>
                </div>
                <div class="col-lg-9">
                    <div id="progress" class="progress progress-sm active">
                        <div class="progress-bar progress-bar-success progress-bar-striped bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                    <p id="loading"></p>
                </div>
                <div id="files_list"></div>
            </div>
            <div class="box box-warning box-solid collapsed-box">
                <div class="overlay hidden">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">Images</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    {{-- <table id="example" class="table table-bordered table-hover" style="width:100%"> --}}
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>preview</th>
                                <th>name</th>
                                <th>size</th>
                                <th>extension</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($session_images as $media)
                                <tr id="row{{$media->id}}">
                                    <td>{{$counter}}</td>
                                    <td><a href="{{asset('')}}{{$media->link}}"><img src="{{asset('')}}{{$media->link}}" width="120px"  ></a></td>
                                    <td>{{$media->original_name}}</td>
                                    <td>{{$media->size}} KB</td>
                                    <td>{{$media->type}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger delete" data-content="{{$media->id}}">
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
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('js')
<script>
    $(".media_category_select").imagepicker(
        {
            show_label: true
        }
    )

    $(document).ready(function(){
        CKEDITOR.replace('editor_session');
        CKEDITOR.replace('editor_session1');

        $( ".media_category_select" ).change(function() {
            $('#modal-default').modal('hide');
            $(".image_chosen").html($(" .media_category_select option:selected").text());
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_category_form').on('submit', function(event){
            var short_description = CKEDITOR.instances.editor_session.getData();
            short_description = trimString(short_description);

            var long_description = CKEDITOR.instances.editor_session1.getData();
            long_description = trimString(long_description);

            event.preventDefault();
            $.ajax({
                url:"{{route('admin.sessions.update', [$current->id])}}",
                method:"POST",
                data:$("#add_category_form").serialize() + "&short_description=" + short_description + "&long_description=" + long_description,
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

    $(function () {
        var t = $('#example').DataTable({
            "order": [[ 0, "desc" ]]
        });
        $('#fileupload').fileupload({
            disableValidation: true,
            dataType: 'json',
            add: function (e, data) {
                $('#loading').text('Uploading...');
                data.submit();
            },
            done: function (e, data) {
                // console.log(data.result);
                $.each(data.result.files, function (index, file) {
                    $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list'));
                    if ($('#file_ids').val() != '') {
                        $('#file_ids').val($('#file_ids').val() + ',');
                    }
                    $('#file_ids').val($('#file_ids').val() + file.fileID);
                    var rowNode = t.row.add( [
                        {{$counter}},
                        '<a href="{{asset('')}}' + file.link +'"><img src="{{asset('')}}' + file.link +'" width="120px" "></a>',
                        file.name,
                        file.size + ' KB',
                        file.type,
                        '<button type="button" class="btn btn-danger delete" data-content="' + file.fileID + '"><i class="glyphicon glyphicon-trash"></i><span>Delete</span></button>'
                        @php $counter++; @endphp
                    ] ).draw().node();
                    $( rowNode )
                        .css( 'color', 'red' )
                        .attr('id', 'row'+ file.fileID );
                     });
                $('#loading').text('');

            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                  progress + '%'
                );
                $('#loading').text('uploading ' + progress + '%');
            }
        });
        // var overallProgress = $('#fileupload').fileupload('progress');
        // console.log(overallProgress);
    });

    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#example').on('click', '.delete', function(){
        // $(".delete").click(function(){ // not working at page 2 see reason at https://www.gyrocode.com/articles/jquery-datatables-why-click-event-handler-does-not-work/
            if(confirm('Are you sure you want to Delete ?'))
            {
                var content = $( this ).data( "content" );
                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{route("admin.sessions.delete")}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id: content},
                    dataType: 'JSON',
                    beforeSend: function(){
                        $(".overlay").toggleClass('hidden');
                    },
                    /* remind that 'data' is the response of the AjaxController */
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
<style>

    .fileinput-button input {
        position: absolute;
        top: 0;
        left: 0;
        margin: 0;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        cursor: pointer;
    }

    #files_list p{
        border-right: 1px solid #aaa;
        padding: 0 10px;
        display: inline-block;
    }
    .progress{
        margin:10px 0;
    }
    .bar {
        height: 18px;
    }

</style>
@endsection
