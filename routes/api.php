<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
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
], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('orders', OrderController::class);
});
