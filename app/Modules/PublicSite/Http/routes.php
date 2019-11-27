<?php

Route::get('/', ['as' => 'public::index', 'uses' => 'PublicSiteController@index']);
