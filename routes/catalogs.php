<?php

Route::resource('categories','Catalogs\CategoryController');
Route::resource('users','Catalogs\UserController');
Route::resource('articles','Catalogs\ArticleController');

//->except(['show','index']);
//->only(['index']);