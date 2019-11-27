<?php

Route::get('/', ['as' => 'user::index', 'uses' => 'UserController@index']);
