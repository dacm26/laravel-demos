<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','TasksController@index');
Route::get('tasks/{id}','TasksController@show')->where('id','\d+');
Route::resource('tasks','TasksController');


Route::get('{username}/tasks',function($username ){
  $user= User::whereUsername($username)->first();
  return $user->tasks;
});

Route::get('{username}/tasks/{id}',function($username,$id ){
    $user = User::whereUsername($username)->first();
    $task = $user->tasks()->findOrFail($id);
    return View::make('tasks.show',compact('task'));
  
});
