@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            WebSite Text
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active">WebSite Text</li>
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
                        <h3 class="box-title">WebSite Text</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="update_text_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>How it Started</label><br>
                                        <textarea id="how_it_started" name="how_it_started" rows="3" cols="160">{{$text->how_it_started}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Then in Egypt</label><br>
                                        <textarea id="then_in_egypt" name="then_in_egypt" rows="3" cols="160">{{$text->then_in_egypt}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Camps Description</label><br>
                                        <textarea id="camps_description" name="camps_description" rows="3" cols="160">{{$text->camps_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Internationally Today</label><br>
                                        <textarea id="internationally_today" name="internationally_today" rows="3" cols="160">{{$text->internationally_today}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Vision</label><br>
                                        <textarea id="vision" name="vision" rows="3" cols="160">{{$text->vision}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Mother Design</label><br>
                                        <textarea id="mother_design" name="mother_design" rows="3" cols="160">{{$text->mother_design}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Who We Are</label><br>
                                        <textarea id="who_we_are" name="who_we_are" rows="3" cols="160">{{$text->who_we_are}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Get In Touch</label><br>
                                        <textarea id="get_in_touch" name="get_in_touch" rows="3" cols="160">{{$text->get_in_touch}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>quote1</label><br>
                                        <textarea id="quote1" name="quote1" rows="3" cols="160">{{$text->quote1}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>quote2</label><br>
                                        <textarea id="quote2" name="quote2" rows="3" cols="160">{{$text->quote2}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>quote3</label><br>
                                        <textarea id="quote3" name="quote3" rows="3" cols="160">{{$text->quote3}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>quote4</label><br>
                                        <textarea id="quote4" name="quote4" rows="3" cols="160">{{$text->quote4}}</textarea>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary">save</button>
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
    $(function () {
       CKEDITOR.replace('how_it_started');
       CKEDITOR.replace('quote1');
       CKEDITOR.replace('then_in_egypt');
       CKEDITOR.replace('quote2');
       CKEDITOR.replace('camps_description');
       CKEDITOR.replace('internationally_today');
       CKEDITOR.replace('vision');
       CKEDITOR.replace('quote3');
       CKEDITOR.replace('mother_design');
       CKEDITOR.replace('quote4');
       CKEDITOR.replace('who_we_are');
       CKEDITOR.replace('get_in_touch');
    });

    $(document).ready(function(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#update_text_form').on('submit', function(event){
            var how_it_started = CKEDITOR.instances.how_it_started.getData();
            how_it_started = trimString(how_it_started);

            var quote1 = CKEDITOR.instances.quote1.getData();
            quote1 = trimString(quote1);

            var then_in_egypt = CKEDITOR.instances.then_in_egypt.getData();
            then_in_egypt = trimString(then_in_egypt);

            var quote2 = CKEDITOR.instances.quote2.getData();
            quote2 = trimString(quote2);

            var camps_description = CKEDITOR.instances.camps_description.getData();
            camps_description = trimString(camps_description);

            var internationally_today = CKEDITOR.instances.internationally_today.getData();
            internationally_today = trimString(internationally_today);

            var vision = CKEDITOR.instances.vision.getData();
            vision = trimString(vision);

            var quote3 = CKEDITOR.instances.quote3.getData();
            quote3 = trimString(quote3);

            var mother_design = CKEDITOR.instances.mother_design.getData();
            mother_design = trimString(mother_design);

            var quote4 = CKEDITOR.instances.quote4.getData();
            quote4 = trimString(quote4);

            var who_we_are = CKEDITOR.instances.who_we_are.getData();
            who_we_are = trimString(who_we_are);

            var get_in_touch = CKEDITOR.instances.get_in_touch.getData();
            get_in_touch = trimString(get_in_touch);

            event.preventDefault();
            $.ajax({
                url:"{{route('admin.text.update')}}",
                method:"POST",
                data:$("#update_text_form").serialize()
                    + "&how_it_started=" + how_it_started 
                    + "&quote1=" + quote1 
                    + "&then_in_egypt=" + then_in_egypt 
                    + "&quote2=" + quote2 
                    + "&camps_description=" + camps_description 
                    + "&internationally_today=" + internationally_today 
                    + "&vision=" + vision 
                    + "&quote3=" + quote3 
                    + "&mother_design=" + mother_design 
                    + "&quote4=" + quote4 
                    + "&who_we_are=" + who_we_are 
                    + "&get_in_touch=" + get_in_touch,
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
