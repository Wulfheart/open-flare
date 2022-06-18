<?php

use App\Http\Controllers\ExceptionController;
use App\Http\Controllers\ReportController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Auth::login(User::factory()->create());
    Log::debug("Hello test");
    throw new Exception("HELP");
    return view('welcome');
});

Route::get('/data', ExceptionController::class);
