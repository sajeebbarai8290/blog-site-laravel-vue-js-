@extends('admin.master')
@section('title')
Manage Blog
@endsection
@section('body')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Blog Tables</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Category Name</th>
                            <th>Blog Title</th>
                            <th>Blog Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php($i=1)
                    @foreach($blogs as $blog)
                    <tbody>
                        <tr class="odd gradeX">
                            <td>{{$i++}}</td>
                            <td>{{$blog->category_name}}</td>
                            <td>{{$blog->blog_title}}</td>
                            <td><img src="{{asset($blog->blog_image)}}" alt="" height="100px" width="120"/></td>
                            <td>{{$blog->publication_status == 1?'published':'unpublished'}}</td>
                            <td>
                                @if($blog->publication_status == 1)
                                <a href="{{route('unpublished-blog',['id'=>$blog->id])}}" class="btn btn-info btn-xs" onclick="return confirm('Are you sure to Unpublished this');">
                                    <samp class="glyphicon glyphicon-arrow-up"></samp>
                                </a>
                                @else
                                    <a href="{{route('published-blog',['id'=>$blog->id])}}" class="btn btn-warning btn-xs" onclick="return confirm('Are you sure to delete this');">
                                        <samp class="glyphicon glyphicon-arrow-down"></samp>
                                    </a>
                                @endif
                                <br/><br/>
                                <a href="{{route('edit-blog',['id'=>$blog->id])}}" class="btn btn-success btn-xs">
                                    <samp class="glyphicon glyphicon-edit"></samp>
                                </a>
                                <br/><br/>
                                <a href="" id="{{$blog->id}}" class="btn btn-danger btn-xs" onclick="
                                    event.preventDefault();
                                    var check = confirm('Are you sure to delete this!!!');
                                    if(check){
                                        document.getElementById('deleteCategoryForm'+'{{$blog->id}}').submit();
                                    }
                                    ">
                                    <samp class="glyphicon glyphicon-trash"></samp>
                                </a>
                                <form id="deleteCategoryForm{{$blog->id}}" action="{{route('delete-blog')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$blog->id}}" name="id"/>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /#page-wrapper -->

@endsection

