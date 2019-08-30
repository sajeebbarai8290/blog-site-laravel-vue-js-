<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use DB;

class BlogController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        return view('admin.blog.add-blog',[
            'categories'=>$categories
        ]);
    }
    public function newBlogInfo(Request $request){
        $image = $request->file('blog_image');
        $blog = new Blog();
        $blog->category_id = $request->category_id;
        $blog->blog_title = $request->blog_title;
        $blog->blog_short_description = $request->blog_short_description;
        $blog->blog_long_description = $request->blog_long_description;
        $blog->blog_image = $this->uploadImage($image);
        $blog->publication_status = $request->publication_status;
        $blog->save();
        return redirect('/blog/add-blog')->with('message','blog info save successfully');
    }
    private function uploadImage($image){
        $imageName = $image->getClientOriginalName();
        $directory = 'blog-images/';
        $image->move($directory,$imageName);
        return $directory.$imageName;
    }
    public function manageBlogInfo(){
        $blogs = DB::table('blogs')
                ->join('categories','blogs.category_id','=','categories.id')
                ->select('blogs.*','categories.category_name')
                ->orderBy('blogs.id','desc')
                ->get();
        return view('admin.blog.manage-blog',[
            'blogs'=>$blogs
        ]);
    }
    public function unpublishedBlogInfo($id){
        $blog = Blog::find($id);
        $blog->publication_status = 0;
        $blog->save();
        return redirect('/blog/manage-blog')->with('message','blog info unpublished successfully');
    }
    public function publishedBlogInfo($id){
        $blog = Blog::find($id);
        $blog->publication_status = 1;
        $blog->save();
        return redirect('/blog/manage-blog')->with('message','blog info unpublished successfully');
    }
    public function editBlogInfo($id){
        $categories = Category::where('publication_status',1)->get();
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog',[
            'categories'=>$categories,
            'blog'      =>$blog
        ]);
    }
    public function updateBlogInfo(Request $request){
        $blog = Blog::find($request->id);
        $image = $request->file('blog_image');
        if($image){
            unlink($blog->blog_image);
            $imagePath = $this->uploadImage($image);
        }
        $blog->category_id  = $request->category_id;
        $blog->blog_title   = $request->blog_title;
        $blog->blog_short_description  = $request->blog_short_description;
        $blog->blog_long_description  = $request->blog_long_description;
        if(isset($imagePath)){
            $blog->blog_image = $imagePath;
        }
        $blog->publication_status  = $request->publication_status;
        $blog->save();
        return redirect('/blog/manage-blog')->with('message','blog info update successfully');
    }
    public function deleteBlogInfo(Request $request){
        $blog = Blog::find($request->id);
        if(file_exists($blog->blog_image)){
            unlink($blog->blog_image);
        }
        $blog->delete();
        return redirect('/blog/manage-blog')->with('message','blog info delete successfully');
    }
}
