<?php

use App\Http\Controllers\ProgrammingLanguageController;
use App\Http\Controllers\RestController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/', [RestController::class, 'index']);

Route::get('/language', [RestController::class, 'language']);

Route::get('/palindrome/{text}', [RestController::class, 'palindrome']);

Route::post('/language', [ProgrammingLanguageController::class, 'store']);
Route::get('/language/{id}', [ProgrammingLanguageController::class, 'show']);
Route::get('/languages', [ProgrammingLanguageController::class, 'index']);
Route::patch('/language/{id}', [ProgrammingLanguageController::class, 'update']);
Route::delete('/language/{id}', [ProgrammingLanguageController::class, 'destroy']);

Route::any('/{any}', function () {
    return response("Method not allowed", Response::HTTP_METHOD_NOT_ALLOWED);
})->where('any', '.*');

