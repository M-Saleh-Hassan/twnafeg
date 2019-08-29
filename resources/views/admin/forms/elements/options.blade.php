<div class="box box-warning box-solid collapsed-box">
    <div class="overlay hidden">
            <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="box-header with-border">
        <h3 class="box-title">Add new option</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-12">
            <form method="post" id="add_option_option" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="option text" name="text">
                    </div>

                    <div class="form-group">
                        <label>value</label>
                        <input type="text" class="form-control" placeholder="option value" name="value">
                    </div>


                    <div class="form-group">
                            <label>active</label>
                            <label class="switch">
                                <input type="checkbox" name="active"  value="1" checked>
                                <span class="slider round"></span>
                            </label>
                    </div>

                    <div class="form-group">
                            <label>default</label>
                            <label class="switch">
                                <input type="checkbox" name="default"  value="1" checked>
                                <span class="slider round"></span>
                            </label>
                    </div>
                </div>
                <!-- /.box-body -->
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

<!-- All options -->
<div class="box box-warning box-solid">
    <div class="overlay hidden">
            <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="box-header with-border">
        <h3 class="box-title">All options</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-12">
            <table id="example1" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>text</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody class="options_body">
                    @foreach ($current->options as $option)
                        <tr id="row{{$option->id}}">
                            <td>{{$option->id}}</td>
                            <td>{{$option->text}}</td>
                            <td>
                                <a  href="{{route('admin.forms.elements.options.edit', [$form_id, $current->id, $option->id])}}" class="btn btn-primary" data-content="{{$option->id}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    <span>Edit</span>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger delete" data-content="{{$option->id}}">
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

@section('js_form_element_options')
<script>
$(document).ready(function(){

    var t1 = $('#example1').DataTable({
        "order": [[ 0, "desc" ]]
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#add_option_option').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"{{ route('admin.forms.elements.options.save', [$form_id, $current->id]) }}",
            method:"POST",
            data:$("#add_option_option").serialize(),
            dataType:'JSON',
            beforeSend: function(){
                $(".overlay").toggleClass('hidden');
            },
            success:function(data)
            {
                if(data.errors == '')
                {
                    alert(data.message);

                    var rowNode = t1.row.add( [
                        data.option_id,
                        data.option_value,
                        '<a  href="' + data.option_link_edit +'" class="btn btn-primary" data-content="data.option_id"><i class="glyphicon glyphicon-edit"></i><span> Edit</span></a>',
                        '<button type="button" class="btn btn-danger delete" data-content="' + data.option_id + '"><i class="glyphicon glyphicon-trash"></i><span> Delete</span></button>'
                    ] ).draw().node();

                    $( rowNode )
                        .css( 'color', 'red' )
                        .attr('id', 'row' + data.option_id );
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
    $('#example1').on('click', '.delete', function(){
        if(confirm('Are you sure you want to Delete ?'))
        {
            var content = $( this ).data( "content" );
            $.ajax({
                url: '{{route("admin.forms.elements.options.delete")}}',
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
