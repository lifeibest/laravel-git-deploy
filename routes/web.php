<?php
use Illuminate\Support\Facades\Route;

Route::get('/{view?}', 'GitDeployController@index')->where('view', '(.*)');
