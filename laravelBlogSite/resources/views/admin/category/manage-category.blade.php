@extends('admin.master')
@section('title')
Manage Category
@endsection
@section('body')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Tables</h1>
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
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php($i=1)
                    @foreach($categories as $category)
                    <tbody>
                        <tr class="odd gradeX">
                            <td>{{$i++}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_description}}</td>
                            <td>{{$category->publication_status == 1?'published':'unpublished'}}</td>
                            <td>
                                @if($category->publication_status == 1)
                                <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-info btn-xs" onclick="return confirm('Are you sure to Unpublished this');">
                                    <samp class="glyphicon glyphicon-arrow-up"></samp>
                                </a>
                                @else
                                    <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-warning btn-xs" onclick="return confirm('Are you sure to delete this');">
                                        <samp class="glyphicon glyphicon-arrow-down"></samp>
                                    </a>
                                @endif
                                <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success btn-xs">
                                    <samp class="glyphicon glyphicon-edit"></samp>
                                </a>
                                <a href="" id="{{$category->id}}" class="btn btn-danger btn-xs" onclick="
                                    event.preventDefault();
                                    var check = confirm('Are you sure to delete this!!!');
                                    if(check){
                                        document.getElementById('deleteCategoryForm'+'{{$category->id}}').submit();
                                    }
                                    ">
                                    <samp class="glyphicon glyphicon-trash"></samp>
                                </a>
                                <form id="deleteCategoryForm{{$category->id}}" action="{{route('delete-category')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$category->id}}" name="id"/>
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
