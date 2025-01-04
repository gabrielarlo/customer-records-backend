<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => response()->json([
    'message' => 'Welcome to the '.config('app.name').' API',
]));

Route::prefix('customers')->group(function (): void {
    Route::get('/', [CustomerController::class, 'list']);
    Route::post('/', [CustomerController::class, 'create']);
    Route::get('/counts', [CustomerController::class, 'getCounts']);
    Route::get('/{customer}', [CustomerController::class, 'show']);
    Route::put('/{customer}', [CustomerController::class, 'update']);
    Route::delete('/{customer}', [CustomerController::class, 'destroy']);
});
