<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    AuthController,
    CustomerController,
    OrderController
};
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

// api/v1
Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => 'auth:sanctum'
], function () {

    Route::withoutMiddleware('auth:sanctum')->group(function () {
        Route::post('login', [AuthController::class, 'signin']);
        Route::post('register', [AuthController::class, 'signup']);
    });

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('orders', OrderController::class);
});
