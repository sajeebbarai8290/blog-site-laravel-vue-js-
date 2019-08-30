<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('demo',function (){
    return 'Laravel api';
});

Route::get('/all-published-categories',[
    'uses'  =>  'ApiController@allPublishedCategories',
    'as'    =>  'all-published-categories'
]);
Route::get('/all-published-blog',[
    'uses'  =>  'ApiController@allPublishedBlog',
    'as'    =>  'all-published-blog'
]);
Route::get('/blog-by-category-id/{id}',[
    'uses'  =>  'ApiController@blogByCategoryId',
    'as'    =>  '/blog-by-category-id'
]);
Route::get('/blog-by-id/{id}',[
    'uses'  =>  'ApiController@blogById',
    'as'    =>  '/blog-by-id'
]);
