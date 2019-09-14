@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Events
            </h1>
            <ol class="breadcrumb">
            <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Events</li>
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
                        <h3 class="box-title">Add new event</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="add_event_form" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Form</label>
                                    <select class="form-control" name="form_id">
                                        @foreach ($forms as $form)
                                            <option value="{{$form->id}}">{{$form->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Link Title</label>
                                    <input type="text" class="form-control" placeholder="event Link" name="slug">
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="event title" name="title">
                                </div>

                                <div class="form-group">
                                    <label>Home Description</label>
                                    <textarea id="editor_event" name="description" rows="3" cols="160"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Modal Description</label>
                                    <textarea id="editor_event1" name="long_description" rows="3" cols="160"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Home Date Days</label>
                                    <input type="text" class="form-control" placeholder="event Home Date Days" name="home_date_days">
                                </div>

                                <div class="form-group">
                                    <label>Home Date Month</label>
                                    <input type="text" class="form-control" placeholder="event Home Date Month" name="home_date_month">
                                </div>

                                <div class="form-group">
                                    <label>Modal Date Text</label>
                                    <input type="text" class="form-control" placeholder="event date" name="date_text">
                                </div>

                                <div class="form-group">
                                    <label>Date To Compare</label>
                                    <input type="date" class="form-control" placeholder="event date compare" name="date_to_compare">
                                </div>

                                <div class="form-group">
                                    <label>Place</label>
                                    <input type="text" class="form-control" placeholder="event place" name="place">
                                </div>

                                <div class="form-group">
                                    <label>Map</label>
                                    <input type="text" class="form-control" placeholder="event map" name="map">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" placeholder="event price" name="price">
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
                                                <select class="media_event_select form-control col-md-12" name="image_id">
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
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- All events -->
                <div class="box box-warning box-solid">
                    <div class="overlay hidden">
                            <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">All events</h3>
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
                                        <th>date</th>
                                        <th>title</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody class="events_body">
                                    @foreach ($events as $event)
                                        <tr id="row{{$event->id}}">
                                            <td>{{$event->date_to_compare}}</td>
                                            <td>{{$event->title}}</td>
                                            <td>
                                                <a  href="{{route('admin.events.edit', [$event->id])}}" class="btn btn-primary" data-content="{{$event->id}}">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete" data-content="{{$event->id}}">
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

    $(".media_event_select").imagepicker(
        {
            show_label: true
        }
    )

    $(document).ready(function(){
        CKEDITOR.replace('editor_event');
        CKEDITOR.replace('editor_event1');

        var t = $('#example').DataTable({
            "order": [[ 0, "desc" ]]
        });

        $( ".media_event_select" ).change(function() {
            $('#modal-default').modal('hide');
            $(".image_chosen").html($(" .media_event_select option:selected").text());
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_event_form').on('submit', function(event){
            var description = CKEDITOR.instances.editor_event.getData();
            description = trimString(description);

            var long_description = CKEDITOR.instances.editor_event1.getData();
            long_description = trimString(long_description);

            event.preventDefault();
            $.ajax({
                url:"{{ route('admin.events.save') }}",
                method:"POST",
                data:$("#add_event_form").serialize() + "&description=" + description + "&long_description=" + long_description ,
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
                            data.event_date_to_compare,
                            data.event_title,
                            '<a  href="' + data.event_link_edit +'" class="btn btn-primary" data-content="data.event_id"><i class="glyphicon glyphicon-edit"></i><span> Edit</span></a>',
                            '<button type="button" class="btn btn-danger delete" data-content="' + data.event_id + '"><i class="glyphicon glyphicon-trash"></i><span> Delete</span></button>'
                        ] ).draw().node();

                        $( rowNode )
                            .css( 'color', 'red' )
                            .attr('id', 'row' + data.event_id );
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
                    url: '{{route("admin.events.delete")}}',
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
