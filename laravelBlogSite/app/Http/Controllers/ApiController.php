<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allPublishedCategories(){
        $categories = Category::where('publication_status', 1)->get();
        return $categories;
    }
    public function allPublishedBlog(){
        $blogs  =   Blog::where('publication_status', 1)->get();
        return $blogs;
    }
    public function blogByCategoryId($id){
        return Blog::where('category_id',$id)->where('publication_status', 1)->get();
    }
    public function blogById($id){
        return Blog::find($id);
    }
}
