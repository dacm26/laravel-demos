<?php


Event::listen('illuminate.query',function($query)
{
  //var_dump($query);//muestra el query en string
});


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

Route::get('/',['as'=>'home', 'uses' =>'TasksController@index']);
Route::get('tasks/{id}','TasksController@show')->where('id','\d+');
Route::resource('tasks','TasksController');


Route::get('{username}/tasks',function($username ){
  $user= User::whereUsername($username)->first();
  return $user->tasks;
});

Route::get('{username}/tasks/{id}',function($username,$id ){
    $user = User::with('tasks')->whereUsername($username)->first();
    $task = $user->tasks;
    return View::make('tasks.show',compact('user','task'));
  
});
