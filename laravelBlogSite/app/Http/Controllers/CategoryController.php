<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }
    public function newCategoryInfo(Request $request){
        $category = new Category();
        $category->saveCategoryInfo($request);
        return redirect('/category/add-category')->with('message','Category Info Save Successfully.');
    }
    public function manageCategoryInfo(){
        $categories = Category::all();
        return view('admin.category.manage-category',[
            'categories'=>$categories
        ]);
    }
    public function unpublishedCategoryInfo($id){
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();
        return redirect('category/manage-category')->with('message','category info unpublished successfully');
    }
    public function publishedCategoryInfo($id){
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect('category/manage-category')->with('message','category info published successfully');
    }
    public function editCategoryInfo($id){
        $category = Category::find($id);
        return view('admin.category.edit-category',[
            'category'=>$category
        ]);
    }
    public function updateCategoryInfo(Request $request){
        $category = Category::find($request->category_id);
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();
        return redirect('category/manage-category')->with('message','category info update successfully');
    }
    public function deleteCategoryInfo(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return redirect('category/manage-category')->with('message','category info Delete successfully');
    }
    public function CategoryBlogInfo($id,$name){
        $blogs = Blog::where('category_id',$id)->where('publication_status',1)->get();
        $categories = Category::where('publication_status',1)->get();
        return view('front.category.category-blog',[
            'blogs'=>$blogs,
            'categories'=>$categories
        ]);
    }
}
