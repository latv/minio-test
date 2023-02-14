<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/upload-file', function (Request $request) {
    $file = $request->file('file');
    $name = $file->getClientOriginalName(); ;
    Storage::cloud()->put($name, file_get_contents($file));

    return response()->json(['message' => 'saved',], 200);
});
