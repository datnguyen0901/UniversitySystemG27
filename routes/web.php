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

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController');

Route::resource('/department', 'DepartmentController');

Route::resource('/category', 'CategoryController');

Route::resource('/submission', 'SubmissionController');

Route::resource('/idea', 'IdeaController');

Route::resource('/comment', 'CommentController');

Route::get('/view/{id}', 'ViewController@store');

Route::get('/comment/{id}', 'CommentController@show');

Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::resource('/reaction', 'ReactionController');

Route::get('/like/{id}', 'ReactionController@like');

Route::get('/dislike/{id}', 'ReactionController@dislike');

Route::get('/showmostviewed', 'IdeaController@showmostviewed');

Route::get('/lastcreated', 'IdeaController@lastcreated');

Route::get('/terms', 'IdeaController@terms');

Route::get('/ideachart', 'ChartController@ideachart');

Route::get('/viewchart', 'ChartController@viewchart');

Route::get('/reactionchart', 'ChartController@reactionchart');

 