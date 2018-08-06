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
/*
Route::get('/', function () {
    //way of passing value
    //1.
    //return view('welcome',['name' =>'imran'],['age'=>'20']);

    //2.
    $name = "Imran Khan";
    $age = 25;
    //return view('welcome',['name'=>$name],['age'=>$age]);

    //3.
    return view('welcome', compact('name', 'age'));
});*/
/*Route::get('/tasks', function () {
    //$tasks=DB::table('tasks')->get();
    $tasks = App\Task::all();
    return view('tasks.index', compact('tasks'));
    //return $task;
});/*
Route::get('/tasks/{task}', function ($id) {
    //$task=DB::table('tasks')->find($id);
    $task = App\Task::find($id);
    return view('tasks.show', compact('task'));
    //return $task;
});*/

Route::get('/about', function () {
    return view('about');

});
Route::get('/', 'PostController@index');
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{task}', 'TaskController@show');
Route::get('/post', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::post('/post', 'PostController@store');
Route::get('/post/{post}', 'PostController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/post/{post}/comments', 'CommentController@store');
