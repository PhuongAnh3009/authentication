@extends('admin.layout.app')
@section('title')
    List category
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category &raquo; List</h4>
            <table class="table table-bordered">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th style="width: 130px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $key => $category)
                    <tr id="category_{{$category->id}}">
                        <td>{{$key+1}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                            @if($category->category_status == 1)
                                Display
                            @else
                                Not display
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success btn-icon"><a href="admin/category/edit/{{$category->id}}">Edit</a></button>
                            <button class="btn btn-danger btn-icon delete-button"  data-id="{{$category->id}}"><a href="admin/category/delete/{{$category->id}}">Delete</a></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <script>
            $('.delete-button').click(function (e) {
                e.preventDefault();
                let id = $(this).attr("data-id")
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': '/admin/category/delete/'+id,
                    'data': {
                        // 'email': $('#email').val(),
                        // 'password': $('#password').val()
                    },
                    'type': 'GET',
                    success: function (data) {
                        $('#category_' + id).remove();
                    }
                });
            })

    </script>
@endsection
{{--<script>--}}
{{--$('.edit').click(function () {--}}
{{--let id = $(this).data('id');--}}
{{--//Edit--}}
{{--$.ajax({--}}
{{--url: 'admin/category/edit' + id,--}}
{{--dataType: {--}}
{{--    'category_name': $('#name').val(),--}}
{{--    'category_status': $('#status').val()--}}
{{--},--}}
{{--type: 'get',--}}
{{--success: function (data) {--}}
{{--$('.title').text($result.category_name);--}}
{{--$('#status').val($result.category_status);--}}

{{--$('#update-product').on('submit', function (event) {--}}
{{--event.preventDefault();--}}
{{--$.ajax({--}}
{{--url: 'admin/update-product/'+id,--}}
{{--dataType: 'JSON',--}}
{{--type: 'POST',--}}
{{--data: new FormData(this),--}}
{{--processData: false,--}}
{{--contentType: false,--}}
{{--cache: false,--}}
{{--success : function (result) {--}}
{{--$('#edit').modal('hide');--}}
{{--let html = '';--}}
{{--html += '<td>'+id+'</td>';--}}
{{--html += '<td>'+result.product.category_name+'</td>';--}}
{{--html += '<td>'+result.product.category_status+'</td>';--}}
{{--// if(result.product.new == 1) {--}}
{{--// html += '<td>'+"Moi"+'</td>';--}}
{{--// } else {--}}
{{--// html += '<td>'+"Cu"+'</td>';--}}
{{--// }--}}
{{--html += '<td>';--}}
{{--    html += '<button class="btn btn-primary edit" title="Edit '+result.product.name+'" data-toggle="modal" data-target="#edit" type="button" data-id="'+id+'" >';--}}
{{--        html += '<i class="fa fa-edit"></i></button>';--}}
{{--    html += '</td>';--}}
{{--html += '<td>';--}}
{{--    html += '<button class="btn btn-danger delete" title="Edit '+result.product.name+'" data-toggle="modal" data-target="#delete" type="button" data-id="'+id+'" >';--}}
{{--        html += '<i class="fa fa-trash"></i></button>';--}}
{{--    html += '</td>';--}}

{{--$('#product-'+id).html(html);--}}
{{--deleteProduct();--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--});--}}
{{--</script>--}}



{{--<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel"> Edit <span class="title"></span></h5>--}}
{{--                <button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true"> X </span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="row" style="margin: 5px">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <form role="form" id="update-product" method="POST" enctype="multipart/form-data">--}}
{{--                            <input type="hidden" name="id" id="id-product">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Name</label>--}}
{{--                                <select name="type" id="status" class="form-control">--}}
{{--                                    @foreach($category_name as $cn)--}}
{{--                                        <option value="{{$cate->id}}"->{{$type->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label> Status </label>--}}
{{--                                <select name="type" id="status" class="form-control">--}}
{{--                                    @foreach($category_status as $cs)--}}
{{--                                        <option value="{{$cate->id}}"->{{$type->status}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label> Status </label>--}}
{{--                                <label class="radio-inline">--}}
{{--                                    <input id="status_new" name="new" type="radio" value="1"> Display--}}
{{--                                </label>--}}
{{--                                <label class="radio-inline">--}}
{{--                                    <input id="status_old" name="new" type="radio" value="0"> Not display--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}
{{--                                --}}{{--                                    <input type="submit" class="btn btn-success" value="Save">--}}
{{--                                <input id="id_tesst" type="submit" class="btn btn-success update" value="Save"> Save </input>--}}
{{--                                <button class="btn btn-secondary" type="button" data-dismiss="modal"> Cancel</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
