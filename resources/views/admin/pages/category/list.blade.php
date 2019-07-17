@extends('admin.layout.app')

@section('title')
    List category
@endsection

@section('content')
    <meta name="csrf-token" content="{{csrf_token()}}">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category &raquo; List</h4>
            <table class="table table-bordered">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th style="width: 130px;">Action</th>
                </tr>
                </thead>
                <tbody id="table-body">
                @foreach($category as $key => $category)
                    <tr id="category_{{$category->id}}">
                        <td>{{$key+1}}</td>
                        <td id="td_name">{{$category->category_name}}</td>
                        <td id="td_status">
                            @if($category->category_status == 1)
                                Display
                            @else
                                Not display
                            @endif
                        </td>
                        <td id="td_edit">
                            <button class="btn btn-success btn-icon" data-toggle="modal" data-target="#my-modal"
                                    data-name="{{$category->category_name}}"
                                    data-id="{{$category->id}}"
                                    data-status="{{$category->category_status}}">Edit
                            </button>
                            <button class="btn btn-danger btn-icon delete-button" data-id="{{$category->id}}"> Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="my-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label> Name </label>
                                <input class="form-control" id="cate_name" name="description" placeholder="Input name"/>
                            </div>
                            <div class="form-group">
                                <label> Status </label> <br>
                                <label class="radio-inline">
                                    <input id="status_new" name="status" type="radio" value="1"> Display
                                </label>
                                <label class="radio-inline">
                                    <input id="status_old" name="status" type="radio" value="0"> Not display
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                            <button type="button" class="btn btn-default update-button" data-dismiss="modal"> Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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
                'url': '/admin/category/delete/' + id,
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
