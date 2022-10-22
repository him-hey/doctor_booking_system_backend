<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ClinicController;
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
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {

    // Clinic routes
    Route::post('/clinic/create', [ClinicController::class, 'createClinic']);
    Route::get('/clinices', [ClinicController::class, 'index']);
    Route::get('/clinic/{id}', [ClinicController::class, 'showDetail']);
    Route::put('/clinic/update/{id}', [ClinicController::class, 'update']);
    Route::delete('/clinic/delete/{id}', [ClinicController::class, 'delete']);
    
    //Appointment route
    Route::post('appointment/create', [AppointmentController::class, 'makeAppointment']);

    //Appointment routes for admin
    Route::get('admin/appointments', [AppointmentController::class, 'index']);
});


