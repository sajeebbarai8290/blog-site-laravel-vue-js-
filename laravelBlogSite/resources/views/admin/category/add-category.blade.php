@extends('admin.master')
@section('title')
Add Category
@endsection
@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Category</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
        <div class="well">
            {!!Form::open(['route'=>'new-category','method'=>'POST','class'=>'form-horizontal'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="category_name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Category Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="category_description" rows="4"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Publication Status</label>
                <div class="col-sm-10 radio">
                    <label><input type="radio" checked name="publication_status" value="1">Published</label>
                    <label><input type="radio"  name="publication_status" value="0">Unpublished</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Category Info">
                </div>
            </div>
            {!!Form::close()!!}
        </div>
        
    </div>
    
</div>
@endsection
