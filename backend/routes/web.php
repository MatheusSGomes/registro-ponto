<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Laravel: v' . app()->version();
});
