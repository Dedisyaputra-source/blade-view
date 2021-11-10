<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/halo', function () {
//     return view('halo', ['name' => 'jong koding']);
// });

// pemanggilan view dengan with
Route::get('/halo', function () {
    return view('halo')->with('name', 'jong koding');
});
