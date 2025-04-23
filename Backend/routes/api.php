<?php

use App\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('horgaszvizsgaTananyag/', [ContentController::class, 'horgaszvizsgaTananyag']);
Route::get('halkartyak/', [ContentController::class, 'halkartyak']);
Route::get('halkartyaById/{id}', [ContentController::class, 'halkartyaById']);
Route::get('halkartyakGyakorlo/', [ContentController::class, 'halkartyakGyakorlo']);