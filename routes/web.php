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
    event(new App\Events\PushArticle('hola'));

    return view('welcome');
});

Auth::routes(['register'=>false]);
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/get-file/{file}',function($file){
    if(Storage::disk('public')->exists('photos-articles/'.$file)){
        return Response::make(Storage::disk('public')->get('photos-articles/'.$file, '200'));
    }
    return Response::make(Storage::disk('public')->get('photos-articles/default.png'), '200');

})->name('get-image');
