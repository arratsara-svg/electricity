<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\MeterInputController;
use App\Http\Controllers\SubscriptionController;

use App\Http\Controllers\ElectricityPriceController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\SubscriptionLoginController;
use App\Http\Controllers\MValueProcessorController;

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
Route::post('/users', [UserController::class, 'store']);

Route::post('/electricity-prices', [ElectricityPriceController::class, 'update']);

Route::post('/meter-inputs', [MeterInputController::class, 'store']);

Route::post('/subscriptions', [SubscriptionController::class, 'store']);



Route::get('/process-m/{subscription_id}', [MValueProcessorController::class, 'process']);

Route::post('/calculate-m', [MValueProcessorController::class, 'process']);


Route::post('/login', function (Request $request) {
    $request->validate([
        'subscription_number' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('job_identity_number', $request->subscription_number)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'بيانات غير صحيحة'], 401);
    }

    return response()->json([
        'message' => 'تم تسجيل الدخول بنجاح',
        'usertype' => $user->state == 0 ? 'admin' : 'user',
        'name' => $user->name,
    ]);
});


Route::post('/subscription-check', [SubscriptionLoginController::class, 'check']);






