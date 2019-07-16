@extends('admin.layout.app')
@section('title')
    Add category
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category &raquo; Edit</h4>
            <form class="forms-sample" action="admin/category/update/{{$category->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name category</label>
                    <input type="text" class="form-control" id="name" name="category_name" placeholder="Name"
                           value="{{$category->category_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Status category</label>
                    <select class="form-control" id="status" name="category_status">
                        @if($category->category_status == 1)
                            <option selected value="1">Display</option>
                            <option value="0">Not display</option>
                        @else
                            <option value="1">Display</option>
                            <option selected value="0">Not display</option>
                        @endif
                    </select>
                </div>
                <input type="submit" class="btn btn-gradient-primary mr-2" value="Update"></input>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection
