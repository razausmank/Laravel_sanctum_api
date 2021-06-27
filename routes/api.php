<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Models\Product;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/products', [ApiController::class, 'index']);
Route::get('/products/{id}', [ApiController::class, 'show']);

Route::get('/products/search/{name}', [ApiController::class, 'search']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ApiController::class, 'store']);
    Route::put('/products/{id}', [ApiController::class, 'update']);
    Route::delete('/products/{id}', [ApiController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
