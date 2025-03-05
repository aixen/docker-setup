<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    // return view('welcome');
    return response()->json([
        'hello' => 'world'
    ]);
});
