<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;

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

//--------------Register-----------------

Route::get('/register', function () {
    return view('API.register');
})->name('register');
Route::post('/register', [AuthController::class, 'userRegister']);

Route::get('/useractivelink/{id}', [AuthController::class, 'userLinkActivation']);


// ------------Login-------------

Route::get('/login', function () {
    return view('API.login');
})->name('login');

Route::post('/login', [AuthController::class, 'userLogin']);


// -------------Authenticate with dashboard and Logout-------

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/getuser', [UserController::class, 'index'])->name('getdata');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edited');
    Route::post('/update', [UserController::class, 'update']);
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('deleted');
    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');

});

Route::get('/datalist', [UserController::class, 'create'])->name('datalist');
Route::get('/userdashboard', [UserController::class, 'Datashow'])->name('userdash');











