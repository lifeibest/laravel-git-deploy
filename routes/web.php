<?php
use Illuminate\Support\Facades\Route;

Route::get('/hook', 'GitDeployController@hook');

Route::get('/{view?}', 'GitDeployController@index')->where('view', '(.*)');
