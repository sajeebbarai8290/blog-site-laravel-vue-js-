@extends('admin.master')
@section('title')
Add Blog
@endsection
@section('body')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Blog</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        
        <div class="well">
            {!!Form::open(['route'=>'new-blog','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Blog Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="blog_title">
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Blog Short Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="blog_short_description" rows="6"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Blog Long Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="editor" name="blog_long_description" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Blog Image</label>
                <div class="col-sm-10">
                    <input type="file"  name="blog_image" accept="image/*">
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
                    <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Blog Info">
                </div>
            </div>
            {!!Form::close()!!}
        </div>
        
    </div>
    
</div>
@endsection

