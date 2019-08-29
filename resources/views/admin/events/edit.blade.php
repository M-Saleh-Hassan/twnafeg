@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Event
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('admin.events.index')}}">events</a></li>
                <li class="active">{{$current->title}}</li>
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
                            <form method="post" id="add_event_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
                                        <div class="form-group">
                                            <label>Form</label>
                                            <select class="form-control col-md-12" name="form_id">
                                                @foreach ($forms as $form)
                                                    <option value="{{$form->id}}" @if($current->form_id == $form->id)selected @endif>{{$form->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" placeholder="event title" name="title" value="{{$current->title}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Home Description</label>
                                            <textarea id="editor_event" name="description" rows="3" cols="160">{{$current->description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Modal Description</label>
                                            <textarea id="editor_event1" name="description" rows="3" cols="160">{{$current->long_description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Home Date Days</label>
                                            <input type="text" class="form-control" placeholder="event Home Date Days" value="{{$current->home_date_days}}" name="home_date_days">
                                        </div>

                                        <div class="form-group">
                                            <label>Home Date Month</label>
                                            <input type="text" class="form-control" placeholder="event Home Date Month" value="{{$current->home_date_month}}" name="home_date_month">
                                        </div>

                                        <div class="form-group">
                                            <label>Modal Date Text</label>
                                            <input type="text" class="form-control" placeholder="event date" value="{{$current->date_text}}" name="date_text">
                                        </div>

                                        <div class="form-group">
                                            <label>Date To Compare</label>
                                            <input type="date" class="form-control" placeholder="event date compare" name="date_to_compare" value="{{$current->date_to_compare}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Place</label>
                                            <input type="text" class="form-control" placeholder="event place" name="place" value="{{$current->place}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Map</label>
                                            <input type="text" class="form-control" placeholder="event map" name="map" value="{{$current->map}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control" placeholder="event price" name="price" value="{{$current->price}}">
                                        </div>


                                    <div class="form-group">
                                        <label>Image</label>

                                                <button type="button" class="btn btn-info mg" data-toggle="modal" data-target="#modal-default">
                                                    Choose Image
                                                </button>

                                                <p class="image_chosen"><a target='_blank' href='{{asset('')}}{{$current->image->link}}'>{{$current->image->original_name}}</a></p>

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
                                                                <option @if($current->image->id == $one->id){{'selected'}} @endif data-img-label="<a class='link-image' target='_blank' href='{{asset('')}}{{$one->link}}'>{{$one->original_name}}</a>" data-img-src="{{asset('')}}{{$one->link}}" data-img-class="custom-image" value="{{$one->id}}">{{$one->original_name}}</option>
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

        $( ".media_event_select" ).change(function() {
            $('#modal-default').modal('hide');
            $(".image_chosen").html($(" .media_event_select option:selected").text());
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_event_form').on('submit', function(event){
            var description = CKEDITOR.instances.editor_event.getData();
            var long_description = CKEDITOR.instances.editor_event1.getData();
            description = trimString(description);
            long_description = trimString(long_description);

            event.preventDefault();
            $.ajax({
                url:"{{route('admin.events.update', [$current->id])}}",
                method:"POST",
                data:$("#add_event_form").serialize() + "&description=" + description + "&long_description=" + long_description,
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
