<?php

Route::get('/', ['as' => 'admin::index', 'uses' => 'AdminController@index']);

Route::get('users/store', ['as' => 'admin::users.store', 'uses' => 'UserController@store']);
