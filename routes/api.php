<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/public-complaint', [App\Http\Controllers\ApiController::class, 'publicComplaint']);
Route::post('/certificate', [App\Http\Controllers\ApiController::class, 'certificate']);
Route::post('/cover-letter', [App\Http\Controllers\ApiController::class, 'coverLetter']);
Route::post('/different-data', [App\Http\Controllers\ApiController::class, 'differentData']);
Route::post('/mail-poor', [App\Http\Controllers\ApiController::class, 'mailPoor']);
Route::post('/business-info', [App\Http\Controllers\ApiController::class, 'businessInfo']);
Route::post('/user-list', [App\Http\Controllers\ApiController::class, 'userList']);

Route::any('{any}', function(){
    $response['code'] = 404;
    $response['message'] = 'URL Not Found';
    return response()->json($response, $response['code']);
})->where('any', '.*');
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
