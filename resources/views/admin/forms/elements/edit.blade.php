@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            element
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('admin.forms.index')}}">forms</a></li>
                <li><a href="{{route('admin.forms.edit',[$form_id])}}">elements</a></li>
                <li class="active">{{$current->label}}</li>
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
                        <h3 class="box-title">{{$current->label}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form method="post" id="update_element_element" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>label</label>
                                        <input type="text" class="form-control" placeholder="element label" name="label" value="{{$current->label}}">
                                    </div>


                                    <div class="form-group">
                                        <label>type</label>
                                        <select  class="form-control" name="type">
                                            <option value="text"     @if($current->type == "text") selected @endif>text</option>
                                            <option value="password" @if($current->type == "password") selected @endif>password</option>
                                            <option value="checkbox" @if($current->type == "checkbox") selected @endif>checkbox</option>
                                            <option value="textarea" @if($current->type == "textarea") selected @endif>textarea</option>
                                            <option value="select"   @if($current->type == "select") selected @endif>select</option>
                                            <option value="radio"    @if($current->type == "radio") selected @endif>radio</option>
                                            <option value="date"     @if($current->type == "date") selected @endif>date</option>
                                            <option value="hidden"   @if($current->type == "hidden") selected @endif>hidden</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>name attribute</label>
                                        <input type="text" class="form-control" placeholder="element name" name="name" value="{{$current->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label>id attribute</label>
                                        <input type="text" class="form-control" placeholder="element id" name="id_attribute" value="{{$current->id_attribute}}">
                                    </div>

                                    <div class="form-group">
                                        <label>default value</label>
                                        <input type="text" class="form-control" placeholder="element value" name="value" value="{{$current->value}}">
                                    </div>

                                    <div class="form-group">
                                            <label>active</label>
                                            <label class="switch">
                                                <input type="checkbox" name="active"  value="1" @if($current->active) checked @endif>
                                                <span class="slider round"></span>
                                            </label>

                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>

                @includeWhen(in_array($current->type, ['checkbox', 'select', 'radio']) , 'admin.forms.elements.options')

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
        $('#update_element_element').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{route('admin.forms.elements.update', [$form_id, $current->id])}}",
                method:"POST",
                data:$("#update_element_element").serialize(),
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('hidden');
                },
                success:function(data)
                {
                    if(data.errors == '')
                    {
                        alert(data.message);
                        // window.location.replace(data.redirect);
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
