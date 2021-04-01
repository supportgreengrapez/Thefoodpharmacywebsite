<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

function () {
    // Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    
   
}; 

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('/auth/bank_slip/prac',  'AuthController@bankSlipSubmit_prac');
Route::get('/auth/diet/{id}',   [AuthController::class, 'assigned_diet'] );

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/user_profile', [AuthController::class, 'userProfile']);
    Route::post('/auth/bank_slip',   [AuthController::class, 'bankSlipSubmit'] );
    Route::post('/auth/history',   [AuthController::class, 'questionAnswerFormSubmit'] );
  
    Route::get('closed', 'DataController@closed');
});