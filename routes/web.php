<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false, 'reset' => false]);

Route::middleware(['auth'])->group(function() {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

  Route::post('mails', [MailController::class, 'create']);
  Route::get('mails/{file}', [MailController::class, 'show']);
  Route::delete('mails/{id}', [MailController::class, 'delete']);
});
