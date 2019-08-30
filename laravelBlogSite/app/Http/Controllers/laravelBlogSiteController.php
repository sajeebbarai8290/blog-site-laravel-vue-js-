<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use DB;

class laravelBlogSiteController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        $blogs = Blog::where('publication_status',1)->take(3)->get();
        $popularBlogs = Blog::orderBy('hit_count','desc')->get();
        return view('front.home.home',[
            'categories'=>$categories,
            'blogs'   => $blogs,
            'popularBlogs'=>$popularBlogs
        ]);
    }
    public function blogDetails($id){
        $blog = Blog::find($id);
        $blog->hit_count = $blog->hit_count +1;
        $blog->save();
        $categories = Category::where('publication_status',1)->get();
        $comments = DB::table('coments')
                ->join('visitors','coments.visitor_id','=','visitors.id')
                ->select('coments.*','visitors.first_name','visitors.last_name')
                ->where('coments.blog_id',$id)
                ->where('coments.publication_status',1)
                ->orderBy('coments.id','desc')
                ->get();
        return view('front.blog.blog-details',[
            'blog'=>$blog,
            'categories'=>$categories,
            'comments' => $comments
        ]);
    }
}
