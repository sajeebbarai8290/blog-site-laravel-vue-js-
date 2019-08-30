<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[
    'uses' => 'laravelBlogSiteController@index',
    'as'   => '/'
]);

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

/*category info*/
Route::get('/category/add-category',[
    'uses' => 'CategoryController@index',
    'as'   => 'add-category'
]);

Route::post('/category/save-category',[
    'uses' => 'CategoryController@newCategoryInfo',
    'as'   => 'new-category'
]);
Route::get('/category/manage-category',[
    'uses' => 'CategoryController@manageCategoryInfo',
    'as'   => 'manage-category'
]);
Route::get('/category/unpublished-category/{id}',[
    'uses' => 'CategoryController@unpublishedCategoryInfo',
    'as'   => 'unpublished-category'
]);
Route::get('/category/published-category/{id}',[
    'uses' => 'CategoryController@publishedCategoryInfo',
    'as'   => 'published-category'
]);
Route::get('/category/edit-category/{id}',[
    'uses' => 'CategoryController@editCategoryInfo',
    'as'   => 'edit-category'
]);
Route::post('/category/update-category',[
    'uses' => 'CategoryController@updateCategoryInfo',
    'as'   => 'update-category'
]);
Route::post('/category/delete-category',[
    'uses' => 'CategoryController@deleteCategoryInfo',
    'as'   => 'delete-category'
]);
Route::get('/category/category-blog/{id}/{name}',[
    'uses' => 'CategoryController@CategoryBlogInfo',
    'as'   => 'category-blog'
]);
/*category info*/
/*blog info*/
Route::get('/blog/add-blog',[
    'uses'  => 'BlogController@index',
    'as'    => 'add-blog'
]);
Route::post('/blog/new-blog',[
    'uses'  => 'BlogController@newBlogInfo',
    'as'    => 'new-blog'
]);
Route::get('/blog/manage-blog',[
    'uses'  => 'BlogController@manageBlogInfo',
    'as'    => 'manage-blog'
]);
Route::get('/blog/unpublished-blog/{id}',[
    'uses'  => 'BlogController@unpublishedBlogInfo',
    'as'    => 'unpublished-blog'
]);
Route::get('/blog/published-blog/{id}',[
    'uses'  => 'BlogController@publishedBlogInfo',
    'as'    => 'published-blog'
]);
Route::get('/blog/edit-blog/{id}',[
    'uses'  => 'BlogController@editBlogInfo',
    'as'    => 'edit-blog'
]);
Route::post('/blog/update-blog',[
    'uses'  => 'BlogController@updateBlogInfo',
    'as'    => 'update-blog'
]);
Route::post('/blog/delete-blog',[
    'uses'  => 'BlogController@deleteBlogInfo',
    'as'    => 'delete-blog'
]);
Route::get('/blog/blog-details/{id}',[
    'uses'  => 'laravelBlogSiteController@blogDetails',
    'as'    => 'blog-details'
]);
/*blog info*/
Route::get('/new-signUp',[
    'uses'  => 'SignUpController@index',
    'as'    => 'new-signUp'
]);
Route::post('/save-sign-up',[
    'uses'  => 'SignUpController@saveSignUp',
    'as'    => 'save-sign-up'
]);
Route::get('/visitor-login',[
    'uses'  => 'SignUpController@visitorLogin',
    'as'    => 'visitor-login'
]);
Route::post('/visitor-sign-in',[
    'uses'  => 'SignUpController@visitorSignIn',
    'as'    => 'visitor-sign-in'
]);
Route::post('/visitor-logout',[
    'uses'  => 'SignUpController@visitorLogout',
    'as'    => 'visitor-logout'
]);
Route::post('/new-comment',[
    'uses'  => 'CommentController@newComment',
    'as'    => 'new-comment'
]);
Route::get('/manage-comment',[
    'uses'  => 'CommentController@manageComment',
    'as'    => 'manage-comment'
]);
Route::get('/unpublished-comment/{id}',[
    'uses'  => 'CommentController@unpublishedComment',
    'as'    => 'unpublished-comment'
]);
Route::get('/published-comment/{id}',[
    'uses'  => 'CommentController@publishedComment',
    'as'    => 'published-comment'
]);
Route::get('/404','ErrorHandleController@error404');
Route::get('/405','ErrorHandleController@error405');