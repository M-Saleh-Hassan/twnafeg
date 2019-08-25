<div class="box box-warning box-solid collapsed-box">
    <div class="overlay hidden">
            <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="box-header with-border">
        <h3 class="box-title">Add new element</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-12">
            <form method="post" id="add_element_element" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label>label</label>
                        <input type="text" class="form-control" placeholder="element label" name="label">
                    </div>


                    <div class="form-group">
                        <label>type</label>
                        <select  class="form-control" name="type">
                            <option value="text">text</option>
                            <option value="password">password</option>
                            <option value="checkbox">checkbox</option>
                            <option value="textarea">textarea</option>
                            <option value="select">select</option>
                            <option value="radio">radio</option>
                            <option value="date">date</option>
                            <option value="hidden">hidden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>name attribute</label>
                        <input type="text" class="form-control" placeholder="element name" name="name">
                    </div>

                    <div class="form-group">
                        <label>id attribute</label>
                        <input type="text" class="form-control" placeholder="element id" name="id_attribute">
                    </div>

                    <div class="form-group">
                        <label>default value</label>
                        <input type="text" class="form-control" placeholder="element value" name="value">
                    </div>

                    <div class="form-group">
                            <label>active</label>
                            <label class="switch">
                                <input type="checkbox" name="active"  value="1" checked>
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

<!-- All elements -->
<div class="box box-warning box-solid">
    <div class="overlay hidden">
            <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="box-header with-border">
        <h3 class="box-title">All elements</h3>
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
                        <th>label</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody class="elements_body">
                    @foreach ($current->elements as $element)
                        <tr id="row{{$element->id}}">
                            <td>{{$element->id}}</td>
                            <td>{{$element->label}}</td>
                            <td>
                                <a  href="{{route('admin.forms.elements.edit', [$current->id, $element->id])}}" class="btn btn-primary" data-content="{{$element->id}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    <span>Edit</span>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger delete" data-content="{{$element->id}}">
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

@section('js')
<script>
$(document).ready(function(){

    var t1 = $('#example1').DataTable({
        "order": [[ 0, "desc" ]]
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#add_element_element').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"{{ route('admin.forms.elements.save', [$current->id]) }}",
            method:"POST",
            data:$("#add_element_element").serialize(),
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
                        data.element_id,
                        data.element_label,
                        '<a  href="' + data.element_link_edit +'" class="btn btn-primary" data-content="data.element_id"><i class="glyphicon glyphicon-edit"></i><span> Edit</span></a>',
                        '<button type="button" class="btn btn-danger delete" data-content="' + data.element_id + '"><i class="glyphicon glyphicon-trash"></i><span> Delete</span></button>'
                    ] ).draw().node();

                    $( rowNode )
                        .css( 'color', 'red' )
                        .attr('id', 'row' + data.element_id );
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
                url: '{{route("admin.forms.elements.delete")}}',
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
