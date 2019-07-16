@extends('admin.layout.app')
@section('title')
    Add category
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category &raquo; Add</h4>
           <form class="forms-sample" action="admin/category/add" method="post">

                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name category</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Name">
                    @if($errors->has('category_name'))
                        <div class="alert alert-danger">{{$errors->first('category_name')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Status category</label>
                    <select class="form-control" name="category_status">
                        <option value="1">Display</option>
                        <option value="0">Not display</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-gradient-primary mr-2" value="Add"></input>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection
