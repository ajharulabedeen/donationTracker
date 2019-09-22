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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/z', function () {
//     $this->data['name'] = 'Ibrahim Smair'; 
//     $this->data['age']= '30'; 
//     $this->data['dep']= 'cse'; 
//     error_log("done...!");
//     return $this->data;
// });

Route::get('/z_web', function () {  
    // error_log("done...!");
    // return var_dump(_POST);
    return "OK";
});
//just for testing purpose.
Route::post('getZ', 'TestController@t');
Route::post('post', 'Test@update');
// Route::post('all_posts', 'Test@getAll');

//post
Route::post('all_posts', 'PostController@getAll');
Route::post('save_post', 'PostController@savePost');//tested
Route::post('update_post', 'PostController@updatePost');
Route::post('delete_post/{id}', 'PostController@deletePost');//tested
Route::get('/single_post/{id}', 'PostController@findOne');//tested
