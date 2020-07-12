<?php

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login')->name('login-validation');
Route::get('/logout', 'logoutController@index')->name('logout');
Route::get('/register', 'registerController@index')->name('user-register');
Route::post('/register', 'registerController@adduser')->name('user-register-store');
     Route::get('/admin', 'userController@index')->name('admin-dash');
     Route::get('/admin/action', 'userController@action')->name('live_search.action');
     Route::get('/profile', 'userController@profile')->name('show-profile');
     Route::post('/profile', 'userController@userpost')->name('user-post');
     Route::get('/message', 'userController@message')->name('show-message');
     Route::post('/message', 'userController@messagepost')->name('show-message-store');
     Route::get('/friendlist', 'userController@friendlist')->name('show-friendlist');
     
     Route::get('/fileupload', 'userController@fileupload')->name('file-upload');
     Route::post('/fileupload', 'userController@fileupload')->name('file-upload');


