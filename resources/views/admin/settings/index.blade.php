@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Settings
            {{-- <small>tashtebk</small> --}}
            </h1>
            <ol class="breadcrumb">
            <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
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
                        <h3 class="box-title">{{$current->website_title}}</h3>
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
                                        <label for="exampleInputEmail1">Website Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Website Title" name="website_title" value="{{$current->website_title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{$current->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">FB Link</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="FB Link" name="fb" value="{{$current->facebook_link}}">
                                    </div>
                                    <div class="form-group">
                                            <label>FB Show</label>
                                            <label class="switch">
                                                <input type="checkbox" name="fb_show" value="1" @if($current->facebook_link_show == '1'){{'checked'}} @endif>
                                                <span class="slider round"></span>
                                            </label>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">WhatsApp Number</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="WhatsApp Number" name="whatsapp" value="{{$current->whatsapp_number}}">
                                    </div>
                                    <div class="form-group">
                                            <label>WhatsApp Show</label>
                                            <label class="switch">
                                                <input type="checkbox" name="whatsapp_show" value="1" @if($current->whatsapp_number_show == '1'){{'checked'}} @endif>
                                                <span class="slider round"></span>
                                            </label>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Logo</label><br>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                                    Choose Logo
                                                </button>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="image_chosen"><a target='_blank' href='{{asset('')}}{{$current->getLogo->link}}'>{{$current->getLogo->original_name}}</a></p>
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
                                                <h4 class="modal-title">Choose Logo</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <select class="media_category_select form-control col-md-12" name="logo">
                                                            <option value=""></option>
                                                            @foreach ($media as $one)
                                                                <option @if($current->logo == $one->id){{'selected'}} @endif data-img-label="<a target='_blank' href='{{asset('')}}{{$one->link}}'>{{$one->original_name}}</a>'" data-img-src="{{asset('')}}{{$one->link}}" data-img-class="custom-image" value="{{$one->id}}">{{$one->original_name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Fav Icon</label><br>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default1">
                                                    Choose Fav-Icon
                                                </button>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="fav_chosen"><a target='_blank' href='{{asset('')}}{{$current->getFav->link}}'>{{$current->getFav->original_name}}</a></p>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Add Image Modal -->
                                        <div class="modal fade" id="modal-default1">
                                            <div class="modal-dialog" style="width:80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Choose Fav Icon</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <select class="fav_setting_select form-control col-md-12" name="fav_icon">
                                                            <option value=""></option>
                                                            @foreach ($media as $one)
                                                                <option @if($current->fav == $one->id){{'selected'}} @endif data-img-label="<a target='_blank' href='{{asset('')}}{{$one->link}}'>{{$one->original_name}}</a>'" data-img-src="{{asset('')}}{{$one->link}}" data-img-class="custom-image" value="{{$one->id}}">{{$one->original_name}}</option>
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
    $(".media_category_select").imagepicker(
        {
            show_label: true
        }
    )
    $(".fav_setting_select").imagepicker(
        {
            show_label: true
        }
    )

    $(document).ready(function(){
        $( ".media_category_select" ).change(function() {
            $('#modal-default').modal('hide');
            $(".image_chosen").html($(" .media_category_select option:selected").text());
        });
        $( ".fav_setting_select" ).change(function() {
            $('#modal-default1').modal('hide');
            $(".fav_chosen").html($(" .fav_setting_select option:selected").text());
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#add_category_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{route('admin.settings.update', [$current->id])}}",
                method:"POST",
                data:$("#add_category_form").serialize(),
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
<style>
    li.custom-image
    {
        width:18.5%;
    }
    img.custom-image
    {
        height: 200px
    }
    span.select2
    {
        width: 100% !important;
    }
</style>
@endsection
