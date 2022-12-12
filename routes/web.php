<?php

use Illuminate\Support\Facades\Route;
use App\Utilities\RtcTokenBuilder2;
use App\Utilities\RtmTokenBuilder2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/android", function () {
    $files = Storage::disk('public')->files('apk', true);
    return view("android", ["files"=>$files]);
});

